<?php

namespace App\Http\Controllers;

use App\Http\Resources\MessageResource;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::get();

        return MessageResource::collection($messages);
    }

    public function show($message)
    {
        $messages = Message::findOrFail($message);

        return new MessageResource($messages);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'accoount_id' => 'required',
            'template_id' => 'required',
            'message' => 'required',
            'send_at' => 'required',
        ]);
        $message = Message::create($validated);

        return new MessageResource($message);
    }


    public function update(Request $request, Message $message)
    {
        $validated = $request->validate([
            'accoount_id' => 'required',
            'template_id' => 'required',
            'message' => 'required',
            'send_at' => 'required',
        ]);
        $message->update($validated);

        return new MessageResource($message);
    }

    public function destroy(Message $message)
    {
        $message->delete();

        return MessageResource::collection(Message::all());
    }
}
