<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $trackId)
    {
        $track = Track::findOrFail($trackId);

        $comment = new Comment();
        $comment->content = $request->content;
        $comment->user_id = Auth::id(); // Get the current logged-in user's ID
        $comment->track_id = $track->id;
        $comment->save();

        return redirect()->route('tracks.show', $track->id)->with('success', 'Comment added successfully!');
    }
}
