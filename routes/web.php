<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\EpisodeController;

Route::get('/', [SeriesController::class, 'index'])->name('home');

Route::get('series/{series}', [SeriesController::class, 'show'])->name('series.show');
Route::post('series/{series}/follow', [SeriesController::class, 'follow'])->name('series.follow');
Route::post('series/{series}/unfollow', [SeriesController::class, 'unfollow'])->name('series.unfollow');

Route::get('episodes/{episode}', [EpisodeController::class, 'show'])->name('episodes.show');
Route::post('episodes/{episode}/like', [EpisodeController::class, 'like'])->name('episodes.like');
Route::post('episodes/{episode}/dislike', [EpisodeController::class, 'dislike'])->name('episodes.dislike');

Auth::routes();
