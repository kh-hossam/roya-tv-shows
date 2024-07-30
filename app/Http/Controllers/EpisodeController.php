<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use Illuminate\Support\Facades\Auth;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($seriesId)
    {
        $episodes = Episode::where('series_id', $seriesId)->get();

        return view('episodes.index', compact('episodes'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Episode $episode)
    {
        $isLiked = $episode->likes()->where('user_id', Auth::id())->exists();

        return view('episodes.show', compact('episode', 'isLiked'));
    }

    public function like(Episode $episode)
    {
        if (!Auth::check()) {
            return back()->withErrors(['message' => 'You must be logged in to like an episode.']);
        }

        Auth::user()->likes()->attach($episode->id);

        return back()->with('success', 'You liked the episode.');;
    }

    public function dislike(Episode $episode)
    {
        Auth::user()->likes()->detach($episode->id);

        return back()->with('success', 'You disliked the episode.');
    }
}
