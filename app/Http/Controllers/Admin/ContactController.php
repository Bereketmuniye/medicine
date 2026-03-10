<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::latest()->paginate(20);
        return view('admin.contacts.index', compact('contacts'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();
        return redirect()->route('admin.contacts.index')
            ->with('success', 'Contact message deleted successfully.');
    }

    /**
     * Mark message as read.
     */
    public function markAsRead(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->status = 'read';
        $contact->save();
        
        return response()->json([
            'success' => true,
            'message' => 'Message marked as read.'
        ]);
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return response()->json($contact);
    }
}
