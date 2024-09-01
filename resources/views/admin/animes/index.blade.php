@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center">ADMIN ANIME Index</h1>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Episodes</th>
                            <th>Status</th>
                            <th>Season</th>
                            <th>Thumbnail</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($animes as $anime)
                        <tr>
                            <td>
                                <strong>{{ $anime->title }}</strong>
                                <small class="d-block text-muted">Synonyms: {{is_array($anime->synonyms) ?  implode(', ', $anime->synonyms) : $anime->synonyms}}</small>
                            </td>
                            <td>{{ $anime->type }}</td>
                            <td>{{ $anime->episodes }}</td>
                            <td><span class="badge{{ $anime->status == 'ONGOING' ? 'success' : ($anime->status == 'UPCOMING' ? 'info' : 'secondary') }}"style="color: green">{{ $anime->status }}</span></td>
                            <td>{{is_array($anime->season) ?  implode(', ', $anime->anime_season) : $anime->season }} </td>
                            <td><img src="{{ $anime->thumbnail }}" alt="{{ $anime->title }}" class="img-thumbnail" style="max-width: 100px;"></td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a  href="{{ route('admin.animes.show' ,  $anime)}}" class="btn btn-xs btn-info"  title="View">View</a>
                                    <a href="{{ route('admin.animes.edit' ,  $anime)}}" class="btn btn-xs btn-primary"  title="Edit">Edit</a>
                                    <form action="{{ route('admin.animes.destroy', $anime) }}" method="POST" class="delete-form">
                                        @method("DELETE")
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>



            {{ $animes->links() }}
        </div>
    </div>
@endsection
