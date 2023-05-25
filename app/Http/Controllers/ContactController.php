<?php

namespace App\Http\Controllers;

use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::get();

        return ContactResource::collection($contact);
    }

    public function show($contact)
    {
        $contacts = Contact::findOrFail($contact);

        return new ContactResource($contacts);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'name' => 'required',
            'number' => 'required|integer',
        ]);
        $contact = Contact::create($validated);
        
        return new ContactResource($contact); 
    }

    public function update(Request $request, Contact $contact)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'name' => 'required',
            'number' => 'required|integer',
        ]);
        $contact->update($validated);
        
        return new ContactResource($contact);
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return ContactResource::collection(Contact::all());
    }

}
