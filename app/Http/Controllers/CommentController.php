<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'commentable_id' => 'required|integer',
            'commentable_type' => 'required|string',
            'comment' => 'required|string|max:1000',
            'guest_name' => Auth::check() ? 'nullable|string|max:255' : 'required|string|max:255',
        ]);

        // Validate that the commentable_type is allowed
        $allowedTypes = ['App\Models\Article', 'App\Models\Book'];
        if (!in_array($request->commentable_type, $allowedTypes)) {
            return back()->with('error', 'Invalid comment type.');
        }

        Comment::create([
            'user_id' => Auth::id(),
            'guest_name' => Auth::check() ? Auth::user()->name : $request->guest_name,
            'commentable_id' => $request->commentable_id,
            'commentable_type' => $request->commentable_type,
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Comment posted successfully!');
    }

    public function destroy(Comment $comment)
    {
        if (Auth::id() !== $comment->user_id && !Auth::user()->is_admin) {
            return back()->with('error', 'Unauthorized action.');
        }

        $comment->delete();

        return back()->with('success', 'Comment deleted successfully!');
    }
}
