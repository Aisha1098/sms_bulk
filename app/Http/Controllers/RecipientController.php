<?php

namespace App\Http\Controllers;

use App\Http\Resources\RecipientResource;
use App\Models\Recipient;
use Illuminate\Http\Request;

class RecipientController extends Controller
{
    public function index()
    {
        $recipient = Recipient::get();

        return RecipientResource::collection($recipient);
    }

    public function show($recipient)
    {
        $recipients = Recipient::findOrFail($recipient);

        return new RecipientResource($recipients);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'group_id' => 'required_without:contact_id',
            'contact_id' => 'required_without:group_id',
        ]);
        $recipient = Recipient::create($validated);

        return new RecipientResource($recipient);
    }


    public function update(Request $request, Recipient $recipient)
    {
        $validated = $request->validate([
            'group_id' => 'required_without:contact_id',
            'contact_id' => 'required_without:group_id',
        ]);
        $recipient->update($validated);

        return new RecipientResource($recipient);
    }

    public function destroy(Recipient $recipient)
    {
        $recipient->delete();

        return RecipientResource::collection(Recipient::all());
    }
}
