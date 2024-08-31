@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="row g-0">
            <div class="col-md-2">
                <img src="{{ $anime->thumbnail }}" class="img-fluid rounded-start h-100 object-fit-cover" alt="{{ $anime->title }}">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h2 class="card-title">{{ $anime->title }}</h2>
                    <p class="card-text text-muted mb-3">
                        <small>Synonyms: {{ implode(', ', $anime->synonyms) }}</small>
                    </p>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <p class="mb-1"><strong>Type:</strong> {{ $anime->type }}</p>
                            <p class="mb-1"><strong>Episodes:</strong> {{ $anime->episodes }}</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-1"><strong>Status:</strong>
                                <span class="badge bg-{{ $anime->status == 'ONGOING' ? 'success' : ($anime->status == 'UPCOMING' ? 'info' : 'secondary') }}">
                                    {{ $anime->status }}
                                </span>
                            </p>
                            <p class="mb-1"><strong>Season:</strong> {{ implode(', ', $anime->anime_season) }}</p>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="text-center">
    <a href="{{route('admin.animes.index')}}" class="badge text-bg-success">Return to the Index</a>
</div>
@endsection
