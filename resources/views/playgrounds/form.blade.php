@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-body">
        <h5>Lisää uusi leikkikenttä</h5>
        <form method="POST" action="/playgrounds" class="row gy-2 gx-3 align-items-center">
            @csrf
            <div class="col-auto">    
                <label for="name">Nimi:</label>
                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}">
                <div class="invalid-feedback">
                    {{ $errors->first('name')}}
                </div>  
            </div>   

            <div class="col-auto">
                <label for="location">Sijainti:</label>
                <input type="text" name="location" value="{{ old('location') }}">
            </div>

            <div class="col-auto">
                <label for="location">SRC:</label>
                <input type="text" name="src" value="{{ old('src') }}">
            </div>

            <label for="selected_equipments">Valitse laitteet:</label>
            {{-- järjestetään laitteet aakkosjärjestykseen niin on helpompi löytää, tosin niitä ei tuu niin paljon etteikö pärjää ilman --}}
            @foreach ($equipments->sortBy('name') as $idx => $equipment)

            <div class="col-auto">
                <div class="input-group mb-3">
                    <input type="hidden" value="{{ $equipment->id }}" name="selected_equipments[{{ $idx }}][equipment_id]">
                    <input name="selected_equipments[{{ $idx }}][checked]" type="checkbox" value="true" class="btn-check rounded" id="{{ $idx }}">
                    <label class="btn btn-outline-primary rounded" for="{{ $idx }}">{{ $equipment->name }}</label>
                    <div class="col-3"> {{-- lyhentää kentän pituutta, oikea termi olisi varmaankin leveyttä --}}
                        <input type="number" name="selected_equipments[{{ $idx }}][amount]" value="0" class="form-control">
                    </div>    
                    <span class="input-group-text">kpl</span>
                </div>
            </div>            
            @endforeach

            <button type="submit" class="btn btn-success">Tallenna</button>

            {{-- validointi error messagen näyttö --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </form>
        </div>
        </div>

        <div class="card">
        <div class="card-body">

        <h5>Lisää uusi laite listaan</h5>
        <div class="mb-3">    
            <form method="POST" action="/equipments"> 
                @csrf
                <label for="name" class="form-label">Nimi:</label>
                <input type="text" class="form-control" name="name" required>
        </div>        
        <div class="mb-3">
                <button type="submit" class="btn btn-success">Tallenna</button>
            </form>
        </div>
    </div>
</div>
@endsection
