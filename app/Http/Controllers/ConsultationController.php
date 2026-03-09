<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    /**
     * Display the consultation page.
     */
    public function index()
    {
        return view('consultation.index');
    }

    /**
     * Store consultation request.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'age' => 'required|integer|min:1|max:120',
            'gender' => 'required|in:male,female,other',
            'symptoms' => 'required|string|min:10',
            'duration' => 'required|string|max:255',
            'previous_treatment' => 'nullable|string',
            'medical_history' => 'nullable|string',
            'preferred_contact' => 'required|in:email,phone,whatsapp',
            'message' => 'nullable|string|max:1000',
        ]);

        // Here you would typically:
        // 1. Save to database
        // 2. Send email notification
        // 3. Send SMS/WhatsApp notification
        // 4. Maybe integrate with calendar system

        return redirect()->route('consultation.index')
            ->with('success', 'Your consultation request has been submitted successfully. We will contact you within 24 hours.');
    }
}
