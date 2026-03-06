<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscribers = \App\Models\Subscriber::latest()->paginate(25);
        return view('admin.subscribers.index', compact('subscribers'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($email)
    {
        \App\Models\Subscriber::where('email', $email)->delete();
        return redirect()->route('admin.subscribers.index')
            ->with('success', 'Subscriber removed.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    
}
