@extends('admin.animes.layouts.create-edit')

@section("page-title")
Edit  Anime
@endsection

@section('form-action')
    {{  route('admin.animes.update' , $anime) }}
@endsection

@section('form-method')
    @method("PUT")
@endsection
