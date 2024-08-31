@extends('admin.animes.layouts.create-edit')

@section("page-title")
Create new Anime
@endsection

@section('form-action')
    {{  route('admin.animes.store') }}
@endsection

@section('form-method')
    @method("POST")
@endsection
