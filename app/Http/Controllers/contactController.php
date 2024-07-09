<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('welcome', compact('contacts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|string|email|max:255',
        ]);

        Contact::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);

        return redirect('/')->with('success', 'Contact created successfully.');
    }

    public function getContacts()
    {
        $contacts = Contact::all();
        return view('updateContact', compact('contacts'));
    }



    public function getContact($id)
    {
        $contact = Contact::find($id);
        return response()->json($contact);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|string|email|max:255',
        ]);

        $contact = Contact::find($id);
        $contact->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);

        return redirect('/')->with('success', 'Contact updated successfully.');
    }

    public function destroy($id)
    {
        $contact = Contact::find($id);
        if ($contact) {
            $contact->delete();
            return redirect('/')->with('success', 'Contact deleted successfully');
        }
        return redirect('/delete')->with('error', 'Contact not found');
    }

    public function destroyAll(Request $request)
    {
        Contact::truncate();
        return response()->json(['message' => 'All contacts deleted successfully']);
    }

    public function getContactsForDelete()
    {
        $contacts = Contact::all();
        return view('DeleteContact', ['contacts' => $contacts]);
    }
}
