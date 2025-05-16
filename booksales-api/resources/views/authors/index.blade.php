@extends('layouts.app')

@section('title', 'Daftar Author')

@section('content')
    <div class="card">
        <div class="card-header bg-success text-white">
            <h2>Daftar Author</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Negara</th>
                        <th>Tahun Lahir</th>
                        <th>Karya Terkenal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($authors as $author)
                        <tr>
                            <td>{{ $author['id'] }}</td>
                            <td>{{ $author['name'] }}</td>
                            <td>{{ $author['country'] }}</td>
                            <td>{{ $author['birth_year'] }}</td>
                            <td>{{ $author['famous_work'] }}</td>
                            <td>
                                <a href="{{ route('authors.show', $author['id']) }}" class="btn btn-info btn-sm">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection