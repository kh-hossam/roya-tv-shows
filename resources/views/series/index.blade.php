@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="my-4">Latest Series</h1>
            @foreach($series as $show)
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title"><a href="{{ route('series.show', $show) }}">{{ $show->title }}</a></h2>
                        <p class="card-text">{{ $show->description }}</p>
                        <p class="card-text"><small class="text-muted">Airing Time: {{ $show->show_time }}</small></p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
