@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="{{ $anime->picture }}" class="card-img" alt="{{ $anime->title }}">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h2 class="card-title">{{ $anime->title }}</h2>
                    <p class="card-text"><strong>Type:</strong> {{ $anime->type }}</p>
                    <p class="card-text"><strong>Episodes:</strong> {{ $anime->episodes }}</p>
                    <p class="card-text"><strong>Status:</strong> {{ $anime->status }}</p>
                    <p class="card-text"><strong>Season:</strong> {{ $anime->season}} </p>

                    <h5 class="mt-3">Synonyms</h5>
                    <ul class="list-inline">
                        @foreach ($anime->synonyms as $animeSynonyme)
                            <li class="list-inline-item">-{{$animeSynonyme}}-</li>
                        @endforeach
                    </ul>

                    <h5 class="mt-3">Tags</h5>
                    <ul class="list-inline">
                        @if (is_array($anime->tags))
                            @foreach ($anime->tags as $animeTag)
                                <li class="list-inline-item"><span class="badge bg-dark ">{{$animeTag}}</span></li>
                            @endforeach
                        @else
                            <li class="list-inline-item"><span class="badge bg-dark ">{{$anime->tags}}</span></li>
                        @endif
                    </ul>

                    <h5 class="mt-3">Related Anime</h5>
                    <ul>
                        @foreach ($anime->related_anime as $relatedAnime)
                            <li><a href="{{$relatedAnime}}">{{$relatedAnime}}</a></li>
                        @endforeach
                    </ul>

                    <h5 class="mt-3">Sources</h5>
                    <ul>
                        @foreach ($anime->sources as $animeSource)
                            <li><a href="{{$animeSource}}" target="_blank">{{$animeSource}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="text-center">
    <a href="{{route('admin.animes.index')}}" class="badge text-bg-success">Return to the Index</a>
</div>
@endsection
