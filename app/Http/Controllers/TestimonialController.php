<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display testimonials on the welcome page
     */
    public function index()
    {
        $featuredTestimonials = Testimonial::published()
            ->featured()
            ->limit(3)
            ->get();
            
        $recentTestimonials = Testimonial::published()
            ->where('is_featured', false)
            ->limit(6)
            ->get();

        return response()->json([
            'featured' => $featuredTestimonials,
            'recent' => $recentTestimonials
        ]);
    }

    /**
     * Display all testimonials page
     */
    public function all()
    {
        $testimonials = Testimonial::published()
            ->orderBy('is_featured', 'desc')
            ->orderBy('order')
            ->orderBy('published_at', 'desc')
            ->paginate(12);

        return view('testimonials.index', compact('testimonials'));
    }

    /**
     * Show testimonial submission form
     */
    public function create()
    {
        return view('testimonials.create');
    }

    /**
     * Store a new testimonial submission
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_name' => 'required|string|max:255',
            'client_email' => 'nullable|email|max:255',
            'client_position' => 'nullable|string|max:255',
            'client_company' => 'nullable|string|max:255',
            'content' => 'required|string|min:10',
            'rating' => 'nullable|numeric|min:1|max:5',
        ]);

        $data = $request->only(['client_name', 'client_email', 'client_position', 'client_company', 'content', 'rating']);
        $data['status'] = 'draft'; // All public submissions start as draft
        $data['order'] = 0;

        Testimonial::create($data);

        return redirect()
            ->route('testimonials.create')
            ->with('success', 'Thank you for your testimonial! It has been submitted for review.');
    }
}
