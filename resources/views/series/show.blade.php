@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="my-4">{{ $series->title }}</h1>
            <p>{{ $series->description }}</p>
            <p><small class="text-muted">Airing Time: {{ $series->show_time }}</small></p>

            @if($isFollowing)
                <form action="{{ route('series.unfollow', $series) }}" method="POST" class="mb-4">
                    @csrf
                    <button type="submit" class="btn btn-danger">Unfollow</button>
                </form>
            @else
                <form action="{{ route('series.follow', $series) }}" method="POST" class="mb-4">
                    @csrf
                    <button type="submit" class="btn btn-primary">Follow</button>
                </form>
            @endif

            <h2>Episodes</h2>
            @foreach($episodes as $episode)
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="card-title"><a href="{{ route('episodes.show', $episode) }}">{{ $episode->title }}</a></h3>
                        <p class="card-text">{{ $episode->description }}</p>
                        <p class="card-text"><small class="text-muted">Duration: {{ $episode->duration }} mins</small></p>
                        <p class="card-text"><small class="text-muted">Airing Time: {{ $episode->airing_time }}</small></p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
