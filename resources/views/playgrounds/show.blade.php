@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="d-flex">
                <h3 class="card-title">{{$item->name}}</h3>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Sijainti: {{$item->location}}</li>
                <li class="list-group-item">Laitteet:@foreach ($item['equipments'] as $equipment)
                <li> {{ $equipment['name'] }}
                {{ $equipment->pivot->amount }} kpl </li>
                @endforeach</li>
                <li class="list-group-item">
                @if($averageRating > 0) {{-- tarkistetaan onko arvosteluja annettu --}}
                    <li>Käyttäjien arvosana: {{$averageRating}}</li> {{-- näytetään arvostelujen keskiarvo --}}
                
                    @if($latestRatings->count() > 0) {{-- tarkistetaan onko yhtään kommenttia annettu --}}
                        {{-- näytetään käyttäjälle 3 uusinta kommenttia --}}
                        <li class="list-group-item">Viimeisimmät kommentit:@foreach ($latestRatings as $rating)
                            <li>{{ $rating['comment'] }}</li>
                            @endforeach</li>
                            {{-- tähän vois tehä modaalin kaikille kommenteille --}}
                            {{-- https://getbootstrap.com/docs/5.3/components/modal/#how-it-works --}}
                        
                            {{-- kommentti modaali button --}}
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#commentModal">
                            Näytä kaikki kommentit
                            </button>

                            {{-- kommentti modaali --}}
                            <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="commentModalLabel">Käyttäjien kommentit</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <ul>
                                        @foreach ($allLatestRatings as $rating)
                                            <li>{{ $rating['comment'] }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                                </div>
                            </div>
                            </div>
                            {{-- kommentti modaali loppuu --}}          
                    @else
                        <li>Ei vielä yhtään kommenttia.</li>
                    @endif
                </li>
                @else {{-- jos ei ole arvosteluja niin ilmoitetaan se käyttäjälle --}}
                        <li>Ei vielä yhtään arviota.</li>
                @endif
                </li>
            </ul>

            @if (session('rated'))
                <div class="alert alert-success">
                    {{ session('rated') }}
                </div>
            @else
                <div class="card-body">
                    <form method="POST" action="/rating">
                    @csrf
                    <input type="hidden" name="playgroundId" value="{{$item->id}}">
                    Montako tähteä annat 1-5:
                    {{--<input type="number" name="rating" min="1" max="5" required> {{-- tää vois olla lopullisessa versiossa sitte jotain muuta kuin numeroita esim käyttäjä antaisi 5 lapiota tai jotain vastaavaa lelua arvosanaksi --}}
                    <div class="col-1">
                        <input class="form-control @error('rating') is-invalid @enderror "type="number" name="rating" min="1" max="5" value="{{ old('rating') }}"> {{-- tää vois olla lopullisessa versiossa sitte jotain muuta kuin numeroita esim käyttäjä antaisi 5 lapiota tai jotain vastaavaa lelua arvosanaksi --}}  
                        <div class="invalid-feedback">
                            {{ $errors->first('rating')}}
                        </div>
                    </div>
                    Voit halutessasi jättää kommentin:
                    {{--<input type="text" name="comment" maxlength="800"> {{-- vois miettiä pitäskö olla textarea --}}
                    <input class="form-control @error('comment') is-invalid @enderror" type="text" name="comment" value="{{ old('comment') }}"> {{-- vois miettiä pitäskö olla textarea --}}
                    <div class="invalid-feedback">
                        {{ $errors->first('comment')}}
                    </div>
                    <button type="submit" class="btn btn-success">Anna arvio</button>
                </div>
            @endif
        </form>

        <iframe 
            src="{{$item->src}}"
            width="90%" 
            height="300" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
        </div>
    </div>
</div>
@endsection