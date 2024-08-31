@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <h1>CREATE PROJECT </h1>
            <form action="{{route('admin.animes.update' , $anime)}}" method="POST" id="add-form" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="title">Anime title</label>
                    <input class="form-control form-control-sm" type="text" placeholder="Anime title" aria-label="Anime title" name="title" id="title" required>
                </div>
                <div class="mb-3">
                    <label for="sources">Anime source</label>
                    <input class="form-control form-control-sm" type="text" placeholder="Anime source" aria-label="Anime source" name="sources" id="sources" required>
                </div>
                <div class="mb-3">
                    <label for="type">Anime Type</label>
                    <input class="form-control form-control-sm" type="text" placeholder="Anime type" aria-label="Anime type" name="type" id="type" required>
                </div>
                <div class="mb-3">
                    <label for="episodes">Anime Episode</label>
                    <input class="form-control form-control-sm" type="number" placeholder="AnimeEpisode" aria-label="AnimeEpisode" name="episodes" id="episodes" required>
                </div>
                <div class="mb-3">
                    <label for="status">Anime Status</label>
                    <input class="form-control form-control-sm" type="select" placeholder="Anime Status" aria-label="Anime Status" name="status" id="status" required>
                </div>
                <div class="mb-3">
                    <label for="anime_season">Anime Season</label>
                    <input class="form-control form-control-sm" type="text" placeholder="Anime Season" aria-label="Anime Season" name="anime_season" id="anime_season" required>
                </div>
                <div class="mb-3">
                    <label for="thumbnail">Anime Season</label>
                    <input class="form-control form-control-sm" type="url" placeholder="Anime thumbnail" aria-label="Anime thumbnail" name="thumbnail" id="thumbnail" >
                </div>
                <div class="mb-3">
                    <label for="tags">Anime tags</label>
                    <input class="form-control form-control-sm" type="url" placeholder="Anime tags" aria-label="Anime tags" name="tags" id="tags" >
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
