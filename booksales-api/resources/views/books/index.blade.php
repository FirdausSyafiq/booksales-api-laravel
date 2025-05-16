@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    <h1>Daftar Buku</h1>
    
    <div class="row mt-4">
        @foreach($books as $book)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $book->author->name }}</h6>
                        <p class="card-text">
                            <strong>ISBN:</strong> {{ $book->isbn }}<br>
                            <strong>Tahun Terbit:</strong> {{ $book->published_year }}<br>
                            <strong>Harga:</strong> Rp {{ number_format($book->price, 0, ',', '.') }}
                        </p>
                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection