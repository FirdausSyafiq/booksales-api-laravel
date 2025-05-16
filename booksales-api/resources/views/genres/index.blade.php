@extends('layouts.app')

@section('title', 'Daftar Genre')

@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h2>Daftar Genre</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($genres as $genre)
                        <tr>
                            <td>{{ $genre['id'] }}</td>
                            <td>{{ $genre['name'] }}</td>
                            <td>{{ $genre['description'] }}</td>
                            <td>
                                <a href="{{ route('genres.show', $genre['id']) }}" class="btn btn-info btn-sm">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection