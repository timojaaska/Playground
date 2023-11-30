@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h3>Tee tarvittavat muutokset</h3>
            <form action="/playgrounds/{{$playground->id}}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nimi:</label>
                    <input type="text" class="form-control" name="name" value="{{$playground->name}}">
                </div>

                <div class="mb-3">
                    <label for="location" class="form-label">Sijainti:</label>
                    <input type="text" class="form-control" name="location" value="{{$playground->location}}">
                </div>

                <div class="mb-3">
                    <label for="src" class="form-label">SRC:</label>
                    <input type="text" class="form-control" name="src" value="{{$playground->src}}">
                </div>

                <div class="mb-3">
                    <label for="selected_equipments">Valitse laitteet:</label>
                 </div>   
                {{-- järjestetään laitteet aakkosjärjestykseen niin on helpompi löytää, tosin niitä ei tuu niin paljon etteikö pärjää ilman --}}
                @foreach ($equipments as $equipment)
                {{-- @foreach ($playground->equipments as $equipment) --}}
                <div class="mb-3">      
                    {{-- käytetään input id ja label for molemmissa laitteen id:tä saadaan näin napit toimimaan yksitellen --}}
                    <input 
                        name="selected_equipments[]" 
                        type="checkbox" 
                        value="{{ $equipment->id }}" 
                        class="btn-check" 
                        id="{{ $equipment->id }}"
                        {{-- tähän tarkistus onko laitetta leikkikentässä jos on laitetaan nappi valituksi checked --}}
                        {{-- https://laravel.com/docs/10.x/collections#method-contains --}}
                        {{-- https://laravel.com/docs/10.x/collections#method-pluck --}}
                        @if ($equipment->selected) checked @endif
                        {{-- controllerissa on laitettu selected arvo valmiiksi, nyt tarvii enää kattoo se --}}
                        {{-- {{ $selectedEquipments->contains($equipment->id) ? 'checked' : '' }} --}}
                        {{-- nyt tarkistaa väärin --}}
                    > {{-- HOXS input kenttä päättyy tässä --}}
                    <label class="btn btn-outline-primary" for="{{ $equipment->id }}">{{ $equipment->name }}</label>
                    {{-- https://getbootstrap.com/docs/5.3/forms/input-group/#button-addons  --}}
                    {{-- Tää vois olla hyvä tähän pitää harkita tätä --}}
                    <input 
                        type="number" 
                        name="amount_{{ $equipment->id }}" 
                        value="{{$equipment->amount}}" {{-- controllerissa on laitettu amount arvo, nyt vain laitetaan se tähän --}}
                        class="form-control"
                    >
                    <label for="amount_{{ $equipment->id }}">kpl</label>
                </div>            
                @endforeach
                <button type="submit" class="btn btn-success">Tallenna</button>
            </form>
        </div>
    </div>
</div>
@endsection