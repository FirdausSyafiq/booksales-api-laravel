@extends('layouts.app')

@section('title', 'Daftar Penulis')

@section('content')
    <h1>Daftar Penulis</h1>
    
    <div class="row mt-4">
        @foreach($authors as $author)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $author->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $author->email }}</h6>
                        <p class="card-text">{{ Str::limit($author->bio, 100) }}</p>
                        <a href="{{ route('authors.show', $author->id) }}" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection