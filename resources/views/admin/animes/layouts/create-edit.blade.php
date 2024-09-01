@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8 p-3">
            <form action="@yield('form-action')" method="POST" enctype="multipart/form-data">
                @yield('form-method')
                @csrf

                <div class="mb-3">
                    <h2>
                        @yield('page-title')
                    </h2>
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $anime->title ?? '') }}" required>
                </div>

                <div class="mb-3">
                    <label for="sources" class="form-label">Sources (one per line)</label>
                    <textarea class="form-control" id="sources" name="sources[]" rows="3">{{ old('sources', $anime->sources ? implode("\n", $anime->sources) : '') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <select class="form-select" id="type" name="type" required>
                        @foreach(['TV', 'MOVIE', 'OVA', 'ONA', 'SPECIAL', 'UNKNOWN'] as $type)
                            <option value="{{ $type }}" {{ (old('type', $anime->type ?? '') == $type) ? 'selected' : '' }}>{{ $type }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="episodes" class="form-label">Episodes</label>
                    <input type="number" class="form-control" id="episodes" name="episodes" value="{{ old('episodes', $anime->episodes ?? '') }}" required>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status" required>
                        @foreach(['FINISHED', 'ONGOING', 'UPCOMING', 'UNKNOWN'] as $status)
                            <option value="{{ $status }}" {{ (old('status', $anime->status ?? '') == $status) ? 'selected' : '' }}>{{ $status }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="anime_season" class="form-label">Anime Season</label>
                    <div class="row">
                        <div class="col">
                            <select class="form-select" id="season" name="anime_season[season]" required>
                                @foreach(['SPRING', 'SUMMER', 'FALL', 'WINTER'] as $season)
                                    <option value="{{ $season }}" {{ (old('anime_season.season', $anime->anime_season->season ?? '') == $season) ? 'selected' : '' }}>{{ $season }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <input type="number" class="form-control" id="year" name="anime_season[year]" value="{{ old('anime_season.year', $anime->anime_season->year ?? '') }}" placeholder="Year" required>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="picture" class="form-label">Picture</label>
                    <input type="file" class="form-control" id="picture" name="picture" accept="image/*">
                    @if($anime->picture ?? false)
                        <img src="{{ $anime->picture }}" alt="Current Picture" class="mt-2" style="max-width: 200px;">
                    @endif
                </div>

                <div class="mb-3">
                    <label for="thumbnail" class="form-label">Thumbnail</label>
                    <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept="image/*">
                    @if($anime->thumbnail ?? false)
                        <img src="{{ $anime->thumbnail }}" alt="Current Thumbnail" class="mt-2" style="max-width: 100px;">
                    @endif
                </div>

                <div class="mb-3">
                    <label for="synonyms" class="form-label">Synonyms (one per line)</label>
                    <textarea class="form-control" id="synonyms" name="synonyms[]" rows="3">{{ old('synonyms', $anime->synonyms ? implode("\n", $anime->synonyms) : '') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="related_anime" class="form-label">Related Anime (Title:Relation, one per line)</label>
                    <textarea class="form-control" id="related_anime" name="related_anime[]" rows="3">{{ old('related_anime', $anime->related_anime ? implode("\n", array_map(function($item) { return $item['title'] . ':' . $item['relation']; }, $anime->related_anime)) : '') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="tags" class="form-label">Tags (comma-separated)</label>
                    <input type="text" class="form-control" id="tags" name="tags" value="{{ old('tags', $anime->tags ? implode(', ', $anime->tags) : '') }}">
                </div>

                <input type="submit" value="@yield('page-title')" class="btn btn-primary btn-lg me-3">
                <input type="reset" value="Reset fields" class="btn btn-warning btn-lg">

            </form>
        </div>
        </div>
    </div>
</div>
@endsection
