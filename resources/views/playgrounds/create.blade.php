@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-body">
        @if(isset($playground))
        {{-- @if (route()->is('playground.editForm')) --}}
            <h3>Tee tarvittavat muutokset</h3>
            <form action="{{ route('playground.update', $playground->id) }}" method="POST" class="row gy-2 gx-3 align-items-center">
            @method('PUT')
        @else
            <h5>Lisää uusi leikkikenttä</h5>
            <form method="POST" action="{{ route('playground.store') }}" class="row gy-2 gx-3 align-items-center">
        @endif      
            @csrf
            <div class="col-auto">    
                <label for="name">Nimi:</label>
                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" 

                value="{{ old('name', $playground->name ?? '') }}">

                <div class="invalid-feedback">
                    {{ $errors->first('name')}}
                </div>  
            </div>   

            <div class="col-auto">
                <label for="location">Sijainti:</label>
                {{-- tää pitäs testata vielä --}}
                <input class="form-control @error('location') is-invalid @enderror" type="text" name="location" value="{{ old('location', $playground->location ?? '') }}">
                {{-- <input class="form-control @error('location') is-invalid @enderror" type="text" name="location" value="{{ old('location') }}"> --}}
                <div class="invalid-feedback">
                    {{ $errors->first('location')}}
                </div>
            </div>

            <div class="col-auto">
                <label for="location">SRC:</label>
                <input class="form-control @error('src') is-invalid @enderror" type="text" name="src" value="{{ old('src', $playground->src ?? '') }}">
                <div class="invalid-feedback">
                    {{ $errors->first('src')}}
                </div>
            </div>
            
            <label for="selected_equipments">Valitse laitteet:</label>
            {{-- järjestetään laitteet aakkosjärjestykseen niin on helpompi löytää, tosin niitä ei tuu niin paljon etteikö pärjää ilman --}}
            @foreach ($equipments->sortBy('name') as $idx => $equipment)

            <div class="col-auto">
                <div class="input-group mb-3">
                    <input type="hidden" value="{{ $equipment->id }}" name="selected_equipments[{{ $idx }}][equipment_id]">
                    <input name="selected_equipments[{{ $idx }}][checked]" 
                    type="checkbox" 
                    value="true" 
                    {{-- class="btn-check rounded" --}}
                   class="btn-check rounded @error('selected_equipments.' . $idx . '.checked') is-invalid @enderror"
                    {{-- @if ($equipment->selected) checked @endif  --}}
                  {{ old('selected_equipments.' . $idx . '.checked', $equipment->selected) ? 'checked' : '' }}
                    id="{{ $idx }}">
                    
                    <label class="btn btn-outline-primary rounded" for="{{ $idx }}">{{ $equipment->name }}</label>
                    <div class="col-3"> {{-- lyhentää kentän pituutta, oikea termi olisi varmaankin leveyttä --}}
                       <input type="number" 
                        name="selected_equipments[{{ $idx }}][amount]" 
                        {{-- value="{{ old('amount', $equipment->amount ?? '0') }}" --}}
                        value="{{ old('selected_equipments.' . $idx . '.amount', $equipment->amount) }}"
                        class="form-control @error('selected_equipments.'.$idx.'.amount') is-invalid @enderror">
                        <div class="invalid-feedback">
                        {{ $errors->first('selected_equipments.' . $idx . '.amount')}}
                        </div>
                    </div>    
                    <span class="input-group-text">kpl</span>
                </div>  
            </div>            
            @endforeach

            <button type="submit" class="btn btn-success">Tallenna</button>
            {{-- @dump($errors->all()) --}}
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
                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name">
                <div class="invalid-feedback">
                    {{ $errors->first('name')}}
                </div> 
        </div>        
        <div class="mb-3">
                <button type="submit" class="btn btn-success">Tallenna</button>
            </form>
        </div>
    </div>
</div>
@endsection