<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:contacts|max:255',
            'email' => 'required|string|email|unique:contacts|max:255',
            'phone' => 'required|string|max:15',
            'company' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        Contacts::create($request->all());
        return redirect()->back()->with('success', 'Contact added successfully!');
    }


    public function update(Request $request, Contacts $contact)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:contacts,name,' . $contact->id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:contacts,email,' . $contact->id],
            'phone' => ['required', 'string', 'max:15'],
            'company' => ['required', 'string', 'max:255'],
        ]);

        $contact->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company' => $request->company,
        ]);

        return redirect()->back()->with('success', 'Contact updated successfully!');
    }


    public function destroy(Contacts $contact)
    {
        $contact->delete();
        return redirect()->route('dashboard')->with('success', 'Contact deleted successfully.');
    }

}
