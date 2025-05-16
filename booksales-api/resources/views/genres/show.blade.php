@extends('layouts.app')

@section('title', 'Detail Genre')

@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h2>Detail Genre</h2>
        </div>
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">ID</dt>
                <dd class="col-sm-9">{{ $genre['id'] }}</dd>
                
                <dt class="col-sm-3">Nama</dt>
                <dd class="col-sm-9">{{ $genre['name'] }}</dd>
                
                <dt class="col-sm-3">Deskripsi</dt>
                <dd class="col-sm-9">{{ $genre['description'] }}</dd>
            </dl>
            <a href="{{ route('genres.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
@endsection