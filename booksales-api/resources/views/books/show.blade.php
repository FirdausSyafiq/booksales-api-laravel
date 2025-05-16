@extends('layouts.app')

@section('title', $book->title)

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>{{ $book->title }}</h1>
        </div>
        <div class="card-body">
            <h5>Penulis: <a href="{{ route('authors.show', $book->author->id) }}">{{ $book->author->name }}</a></h5>
            <p><strong>ISBN:</strong> {{ $book->isbn }}</p>
            <p><strong>Tahun Terbit:</strong> {{ $book->published_year }}</p>
            <p><strong>Harga:</strong> Rp {{ number_format($book->price, 0, ',', '.') }}</p>
            <div class="mt-3">
                <h5>Deskripsi:</h5>
                <p>{{ $book->description }}</p>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali ke Daftar Buku</a>
        </div>
    </div>
@endsection