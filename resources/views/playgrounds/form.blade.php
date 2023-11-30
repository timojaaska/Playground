@extends('layouts.app')
@section('content')

<div class="card">
<div class="card-body">
<h5>Lisää uusi leikkikenttä</h5>
<form method="POST" action="/playgrounds" class="row gy-2 gx-3 align-items-center">
    @csrf
    <div class="col-auto">    
        <label for="name">Nimi:</label>
        <input type="text" name="name" required>  
    </div>   

    <div class="col-auto">
        <label for="location">Sijainti:</label>
        <input type="text" name="location" required>
    </div>

    <div class="col-auto">
        <label for="location">SRC:</label>
        <input type="text" name="src">
    </div>

    <label for="selected_equipments">Valitse laitteet:</label>
    {{-- järjestetään laitteet aakkosjärjestykseen niin on helpompi löytää, tosin niitä ei tuu niin paljon etteikö pärjää ilman --}}
     @foreach ($equipments->sortBy('name') as $equipment)

    <div class="col-auto">         
        {{-- käytetään input id ja label for molemmissa laitteen id:tä saadaan näin napit toimimaan yksitellen --}}
        <input name="selected_equipments[]" type="checkbox" value="{{ $equipment->id }}" class="btn-check" id="{{ $equipment->id }}">
        <label class="btn btn-outline-primary" for="{{ $equipment->id }}">{{ $equipment->name }}</label>
        {{-- https://getbootstrap.com/docs/5.3/forms/input-group/#button-addons  --}}
        {{-- Tää vois olla hyvä tähän pitää harkita tätä --}}
        <input type="number" name="amount_{{ $equipment->id }}" value="0" class="form-control">
        <label for="amount_{{ $equipment->id }}">kpl</label>
    </div>            
    @endforeach

    <button type="submit" class="btn btn-success">Tallenna</button>
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
