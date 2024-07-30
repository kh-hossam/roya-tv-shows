@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="my-4">{{ $episode->title }}</h1>
            <p>{{ $episode->description }}</p>
            <p><small class="text-muted">Duration: {{ $episode->duration }} mins</small></p>
            <p><small class="text-muted">Airing Time: {{ $episode->airing_time }}</small></p>
            <img src="{{ Str::isUrl($episode->thumbnail) ? $episode->thumbnail : asset('storage/' . $episode->thumbnail) }}"
                class="img-fluid mb-4" alt="Thumbnail">
            <video controls class="w-100">
                <source src="{{ Str::isUrl($episode->video_content) ? $episode->video_content :
                    asset('storage/' . $episode->video_content) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>

            @if($isLiked)
                <form action="{{ route('episodes.dislike', $episode) }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit" class="btn btn-danger">Dislike</button>
                </form>
            @else
                <form action="{{ route('episodes.like', $episode) }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit" class="btn btn-primary">Like</button>
                </form>
            @endif
        </div>
    </div>
@endsection
