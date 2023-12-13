@extends('layouts.app')
@section('content')
<div>
    {{-- https://laravel.com/docs/10.x/mail#main-content --}}
    {{-- https://laravel.com/docs/10.x/mail#queueing-mail --}}
    {{-- https://laravel.com/docs/10.x/validation#rule-email --}}
    <div class="card">
        <div class="card-body">
            <h3>Anna palautteesi täällä</h3>
            <form method="POST" action="/mail">
            @csrf
            <div class="mt-3">
                <label for="name">Nimi:</label>
                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}">
                <div class="invalid-feedback">
                    {{ $errors->first('name')}}
                </div>
            </div>
            <div class="mt-3">
                <label for="title">Palautteesi aihe:</label>
                <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" value="{{ old('title') }}">
                <div class="invalid-feedback">
                    {{ $errors->first('title')}}
                </div>
            </div>    
            <div class="mt-3">
                <label for="email">Sähköposti:</label>
                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}">
                <div class="invalid-feedback">
                    {{ $errors->first('email')}}
                </div>
            </div>
            <div class="mt-3">
                <label for="feedback">Palaute:</label>   
                <textarea rows="4" class="form-control @error('feedback') is-invalid @enderror" name="feedback">{{ old('feedback') }}</textarea>
                <div class="invalid-feedback">
                    {{ $errors->first('feedback')}}
                </div>
            </div>
            <button type="submit" class="btn btn-success mt-3">Anna palaute</button>
        </div>
    </div>
</div>
@endsection