@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>ANIME INDEX BRUTTO PER ORA fsdgsdfgdfgds</h1>
            </div>
            <ul>
                @foreach ($animes as $anime)
                <li>
                    {{ $anime->title}}
                </li>
                @endforeach

            </ul>

            {{ $animes->links() }}
        </div>
    </div>
@endsection
