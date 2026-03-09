<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PromotionController extends Controller
{
    public function index(Request $request)
    {
        $promotions = Promotion::query()
            ->when($request->type, function ($query, $type) {
                $query->where('type', $type);
            })
            ->when($request->status, function ($query, $status) {
                if ($status === 'active') {
                    $query->where('is_active', true)
                        ->where(function ($q) {
                            $q->whereNull('starts_at')
                              ->orWhere('starts_at', '<=', now());
                        })
                        ->where(function ($q) {
                            $q->whereNull('ends_at')
                              ->orWhere('ends_at', '>=', now());
                        });
                } elseif ($status === 'inactive') {
                    $query->where('is_active', false);
                } elseif ($status === 'scheduled') {
                    $query->where('is_active', true)
                        ->where('starts_at', '>', now());
                } elseif ($status === 'expired') {
                    $query->where('is_active', true)
                        ->where('ends_at', '<', now());
                }
            })
            ->orderBy('sort_order', 'asc')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $types = ['discount', 'offer', 'announcement'];
        $statuses = ['active', 'inactive', 'scheduled', 'expired'];

        return view('admin.promotions.index', compact('promotions', 'types', 'statuses'));
    }

    public function create()
    {
        $types = ['discount' => 'Discount', 'offer' => 'Special Offer', 'announcement' => 'Announcement'];
        return view('admin.promotions.create', compact('types'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'type' => ['required', Rule::in(['discount', 'offer', 'announcement'])],
            'discount_percentage' => 'nullable|required_if:type,discount|numeric|min:0|max:100',
            'discount_amount' => 'nullable|required_if:type,discount|numeric|min:0',
            'promo_code' => 'nullable|string|max:50|unique:promotions,promo_code',
            'starts_at' => 'required|date',
            'ends_at' => 'nullable|date|after:starts_at',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $validated['slug'] = Str::slug($validated['title']) . '-' . time();
        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/promotions'), $imageName);
            $validated['image'] = $imageName;
        }

        Promotion::create($validated);

        return redirect()->route('admin.promotions.index')
            ->with('success', 'Promotion created successfully!');
    }

    public function show(Promotion $promotion)
    {
        return view('admin.promotions.show', compact('promotion'));
    }

    public function edit(Promotion $promotion)
    {
        $types = ['discount' => 'Discount', 'offer' => 'Special Offer', 'announcement' => 'Announcement'];
        return view('admin.promotions.edit', compact('promotion', 'types'));
    }

    public function update(Request $request, Promotion $promotion)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'type' => ['required', Rule::in(['discount', 'offer', 'announcement'])],
            'discount_percentage' => 'nullable|required_if:type,discount|numeric|min:0|max:100',
            'discount_amount' => 'nullable|required_if:type,discount|numeric|min:0',
            'promo_code' => 'nullable|string|max:50|unique:promotions,promo_code,' . $promotion->id,
            'starts_at' => 'required|date',
            'ends_at' => 'nullable|date|after:starts_at',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        if ($request->hasFile('image')) {
            // Delete old image
            if ($promotion->image && file_exists(public_path('images/promotions/' . $promotion->image))) {
                unlink(public_path('images/promotions/' . $promotion->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/promotions'), $imageName);
            $validated['image'] = $imageName;
        }

        $promotion->update($validated);

        return redirect()->route('admin.promotions.index')
            ->with('success', 'Promotion updated successfully!');
    }

    public function destroy(Promotion $promotion)
    {
        // Delete image
        if ($promotion->image && file_exists(public_path('images/promotions/' . $promotion->image))) {
            unlink(public_path('images/promotions/' . $promotion->image));
        }

        $promotion->delete();

        return redirect()->route('admin.promotions.index')
            ->with('success', 'Promotion deleted successfully!');
    }

    public function toggleStatus(Promotion $promotion)
    {
        $promotion->update(['is_active' => !$promotion->is_active]);

        return back()->with('success', 'Promotion status updated successfully!');
    }
}
