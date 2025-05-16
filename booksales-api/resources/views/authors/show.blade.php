@extends('layouts.app')

@section('title', 'Detail Author')

@section('content')
    <div class="card">
        <div class="card-header bg-success text-white">
            <h2>Detail Author</h2>
        </div>
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">ID</dt>
                <dd class="col-sm-9">{{ $author['id'] }}</dd>
                
                <dt class="col-sm-3">Nama</dt>
                <dd class="col-sm-9">{{ $author['name'] }}</dd>
                
                <dt class="col-sm-3">Negara</dt>
                <dd class="col-sm-9">{{ $author['country'] }}</dd>
                
                <dt class="col-sm-3">Tahun Lahir</dt>
                <dd class="col-sm-9">{{ $author['birth_year'] }}</dd>
                
                <dt class="col-sm-3">Karya Terkenal</dt>
                <dd class="col-sm-9">{{ $author['famous_work'] }}</dd>
            </dl>
            <a href="{{ route('authors.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
@endsection