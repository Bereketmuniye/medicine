<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialMediaAccount;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the social media accounts.
     */
    public function index(Request $request)
    {
        $query = SocialMediaAccount::query();

        // Filter by platform if specified
        if ($request->has('platform') && $request->platform) {
            $query->byPlatform($request->platform);
        }

        $socialAccounts = $query->ordered()->paginate(10);

        $platforms = [
            'facebook' => 'Facebook',
            'instagram' => 'Instagram',
            'twitter' => 'Twitter',
            'linkedin' => 'LinkedIn',
            'youtube' => 'YouTube',
            'tiktok' => 'TikTok'
        ];

        return view('admin.social-media.index', compact('socialAccounts', 'platforms'));
    }

    /**
     * Show the form for creating a new social media account.
     */
    public function create()
    {
        $platforms = [
            'facebook' => 'Facebook',
            'instagram' => 'Instagram',
            'twitter' => 'Twitter',
            'linkedin' => 'LinkedIn',
            'youtube' => 'YouTube',
            'tiktok' => 'TikTok'
        ];

        return view('admin.social-media.create', compact('platforms'));
    }

    /**
     * Store a newly created social media account.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'platform' => 'required|string|max:50|in:facebook,instagram,twitter,linkedin,youtube,tiktok',
            'handle' => 'required|string|max:100',
            'url' => 'required|url',
            'description' => 'nullable|string|max:500',
            'followers' => 'nullable|integer|min:0',
            'posts' => 'nullable|integer|min:0',
            'engagement_rate' => 'nullable|numeric|min:0|max:100',
            'last_post_date' => 'nullable|date',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['followers'] = $validated['followers'] ?? 0;
        $validated['posts'] = $validated['posts'] ?? 0;
        $validated['engagement_rate'] = $validated['engagement_rate'] ?? 0.00;
        $validated['is_active'] = $request->has('is_active');

        SocialMediaAccount::create($validated);

        return redirect()
            ->route('admin.social-media.index')
            ->with('success', 'Social media account added successfully!');
    }

    /**
     * Display the specified social media account.
     */
    public function show(SocialMediaAccount $socialMedia)
    {
        return view('admin.social-media.show', compact('socialMedia'));
    }

    /**
     * Show the form for editing the specified social media account.
     */
    public function edit(SocialMediaAccount $socialMedia)
    {
        $platforms = [
            'facebook' => 'Facebook',
            'instagram' => 'Instagram',
            'twitter' => 'Twitter',
            'linkedin' => 'LinkedIn',
            'youtube' => 'YouTube',
            'tiktok' => 'TikTok'
        ];

        return view('admin.social-media.edit', compact('socialMedia', 'platforms'));
    }

    /**
     * Update the specified social media account.
     */
    public function update(Request $request, SocialMediaAccount $socialMedia)
    {
        $validated = $request->validate([
            'platform' => 'required|string|max:50|in:facebook,instagram,twitter,linkedin,youtube,tiktok',
            'handle' => 'required|string|max:100',
            'url' => 'required|url',
            'description' => 'nullable|string|max:500',
            'followers' => 'nullable|integer|min:0',
            'posts' => 'nullable|integer|min:0',
            'engagement_rate' => 'nullable|numeric|min:0|max:100',
            'last_post_date' => 'nullable|date',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $validated['sort_order'] = $validated['sort_order'] ?? $socialMedia->sort_order;
        $validated['followers'] = $validated['followers'] ?? $socialMedia->followers;
        $validated['posts'] = $validated['posts'] ?? $socialMedia->posts;
        $validated['engagement_rate'] = $validated['engagement_rate'] ?? $socialMedia->engagement_rate;
        $validated['is_active'] = $request->has('is_active');

        $socialMedia->update($validated);

        return redirect()
            ->route('admin.social-media.index')
            ->with('success', 'Social media account updated successfully!');
    }

    /**
     * Remove the specified social media account.
     */
    public function destroy(SocialMediaAccount $socialMedia)
    {
        $socialMedia->delete();

        return redirect()
            ->route('admin.social-media.index')
            ->with('success', 'Social media account deleted successfully!');
    }

    /**
     * Toggle the status of a social media account.
     */
    public function toggleStatus(SocialMediaAccount $socialMedia)
    {
        $socialMedia->update(['is_active' => !$socialMedia->is_active]);

        return redirect()
            ->route('admin.social-media.index')
            ->with('success', 'Social media account status updated successfully!');
    }
}
