@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <h1>CREATE PROJECT </h1>
            <form action="{{route('admin.animes.store')}}" method="POST" id="add-form" enctype="multipart/form-data">
                @method('POST')
                @csrf
                <div class="mb-3">
                    <label for="title">Anime title</label>
                    <input class="form-control form-control-sm" type="text" placeholder="Anime title" aria-label="Anime title" name="title" id="title" required>
                </div>
                <div class="mb-3">
                    <label for="sources">Anime source</label>
                    <input class="form-control form-control-sm" type="text" placeholder="Anime source" aria-label="Anime source" name="sources" id="sources" required>
                </div>
                <div>
                    <label for="type">AnimeType</label>
                    <select name="type" id="type" class="form-control">
                        <option value="TV">TV</option>
                        <option value="MOVIE">Movie</option>
                        <option value="OVA">OVA</option>
                        <option value="ONA">ONA</option>
                        <option value="SPECIAL">Special</option>
                        <option value="UNKNOWN">Unknown</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="episodes">Anime Episode</label>
                    <input class="form-control form-control-sm" type="number" placeholder="AnimeEpisode" aria-label="AnimeEpisode" name="episodes" id="episodes" required>
                </div>
                <div class="mb-3">
                    <label for="status">AnimeStatus</label>
                    <select name="status" id="status" class="form-control">
                        <option value="FINISHED">FINISHED</option>
                        <option value="ONGOING">ONGOING</option>
                        <option value="UPCOMING">UPCOMING</option>
                        <option value="UNKNOWN">UNKNOWN</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="anime_season[]">Anime Season</label>
                    <input class="form-control form-control-sm" type="text" placeholder="Anime Season" aria-label="Anime Season" name="anime_season[]" id="anime_season[]" >
                </div>
                <div class="mb-3">
                    <label for="thumbnail">Anime Season</label>
                    <input class="form-control form-control-sm" type="text" placeholder="Anime thumbnail" aria-label="Anime thumbnail" name="thumbnail" id="thumbnail" >
                </div>
                <div class="mb-3">
                    <label for="picture">Anime picture</label>
                    <input class="form-control form-control-sm" type="text" placeholder="Anime picture" aria-label="Anime picture" name="picture" id="picture" >
                </div>
                <div class="mb-3">
                    <label for="synonyms[]">Anime synonyms</label>
                    <input class="form-control form-control-sm" type="text" placeholder="Anime picture" aria-label="Anime picture" name="synonyms[]" id="synonyms[]" >
                </div>
                <div class="mb-3">
                    <label for="related_anime">Related-Anime</label>
                    <input class="form-control form-control-sm" type="text" placeholder="Anime picture" aria-label="Anime picture" name="related_anime" id="related_anime" >
                </div>

                <div class="mb-3">
                    <label for="tags">Anime tags</label>
                    <input class="form-control form-control-sm" type="text" placeholder="Anime tags" aria-label="Anime tags" name="tags" id="tags" >
                </div>


                <div class="mb-3 d-flex justify-content-between p-2">
                    <input type="submit" value="Create new Project" class="btn btn-primary" >
                    <input type="reset" value="Reset" class="btn btn-danger">
                </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
