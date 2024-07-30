<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Support\Facades\Auth;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $series = Series::all();

        return view('series.index', compact('series'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Series $series)
    {
        $episodes = $series->episodes;

        $isFollowing = $series->followers()->where('user_id', Auth::id())->exists();

        return view('series.show', compact('series', 'episodes', 'isFollowing'));
    }

    public function follow(Series $series)
    {
        if (!Auth::check()) {
            return back()->withErrors(['message' => 'You must be logged in to follow a series.']);
        }

        Auth::user()->follows()->attach($series->id);

        return back()->with('success', 'You are now following the series.');;
    }

    public function unfollow(Series $series)
    {
        Auth::user()->follows()->detach($series->id);

        return back()->with('success', 'You are no longer following the series.');;
    }
}
