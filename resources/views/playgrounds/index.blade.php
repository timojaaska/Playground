@extends('layouts.app')
@section('content')
{{-- admin näkymä alkaa --}}
@auth
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="d-flex">
                <h3>Leikkikentät</h3>
                <div class="ms-auto"><a class="btn btn-primary btn-sm" href="/playgrounds/create">Luo uusi</a></div>                
            </div>
            @if (session('added'))
                <div class="alert alert-success">
                    {{ session('added') }}
                </div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nimi</th>
                        <th  style="width: 100px;"></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td scope="row"><a href="/playgrounds/{{$item->id}}">{{ $item->name }}</a></td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group">
                            
                                <form action="/playgrounds/{{$item->id}}/edit" method="GET">
                                    {{-- @method('EDIT') --}}
                                    <button type="submit" class="btn btn-primary">Muokkaa</button>
                                </form>

                                {{-- poisto alkaa --}}
                                <form action="/playgrounds/{{$item->id}}" method="POST" id="deleteForm">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal_{{ $item->id }}">Poista</button>
                                
                                    <div class="modal fade" id="confirmDeleteModal_{{ $item->id }}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel__{{ $item->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="confirmDeleteModalLabel__{{ $item->id }}">Vahvista poisto</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Oletko varma, että haluat poistaa {{$item->name}} leikkikentän?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Peruuta</button>
                                                    <button type="submit" class="btn btn-danger">Poista</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                {{-- poisto loppuu --}}

                            </div>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endauth
{{-- admin näkymä loppuu --}}

{{-- VIERAS NÄKYMÄ ALKAA --}}
@guest
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="d-flex">
                <h3>Leikkikentät</h3>              
            </div>
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nimi</th>
                        <th>Arvosana</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td scope="row"><a href="/playgrounds/{{$item->id}}">{{ $item->name }}</a></td>
                        {{-- tulostetaan leikkikenttien arvosanat keltaisina tähtinä --}}
                        <td>
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($item->averageRating >= $i)
                                    <i class="bi bi-star-fill text-warning"></i>
                                @elseif ($item->averageRating > ($i - 0.51))
                                    <i class="bi bi-star-half text-warning"></i>
                                @else
                                    <i class="bi bi-star text-warning"></i>
                                @endif
                            @endfor
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{-- pagination linkit --}}
            {{-- {{ $users->onEachSide(5)->links() }} --}}
        </div>
    </div>
</div>
@endguest
{{-- VIERAS NÄKYMÄ LOPPUU --}}
@endsection