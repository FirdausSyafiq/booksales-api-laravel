@extends('layouts.app')

@section('title', $author->name)

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>{{ $author->name }}</h1>
        </div>
        <div class="card-body">
            <p><strong>Email:</strong> {{ $author->email }}</p>
            <div class="mt-3">
                <h5>Biografi:</h5>
                <p>{{ $author->bio }}</p>
            </div>
            
            <h4 class="mt-4">Buku yang Ditulis:</h4>
            @if($author->books->count() > 0)
                <div class="row">
                    @foreach($author->books as $book)
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $book->title }}</h5>
                                    <p class="card-text">
                                        <strong>Tahun:</strong> {{ $book->published_year }}<br>
                                        <strong>ISBN:</strong> {{ $book->isbn }}
                                    </p>
                                    <a href="{{ route('books.show', $book->id) }}" class="btn btn-sm btn-primary">Detail Buku</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p>Belum ada buku yang ditulis.</p>
            @endif
        </div>
        <div class="card-footer">
            <a href="{{ route('authors.index') }}" class="btn btn-secondary">Kembali ke Daftar Penulis</a>
        </div>
    </div>
@endsection