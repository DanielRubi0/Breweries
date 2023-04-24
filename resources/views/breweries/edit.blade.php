@extends('layouts.app')

@section('title', 'Modificar cervecería')

@section ('content')


<form method="POST" action="{{ route ('brewery.update', $brewery) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <input type="hidden" name="id" id="id" value="{{ $brewery->id }}">
    <div class="mb-3">
        <label for="name" class="form-label">Nombre de la cervecería:</label>
        <input type="text" class="form-control" name="name" placeholder="Nombre" value="{{ $brewery->name }}">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Descripción:</label>
        <textarea class="form-control" name="description" id="description" rows="3">{{ $brewery->description }}</textarea>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Imagen:</label>
        <input type="file" class="form-control" name="image" id="image" placeholder="Selecciona una foto"></input>
        <img src="{{ $brewery->img }}" alt="" style="max-width: 25%">
    </div>
    <div class="mb-3">
        <label for="score">Puntuación:</label>
        <output class="score-output" for="score">

        </output><br>
        <input type="range" min="1" max="5" step="1" value="{{ $brewery->score }}" name="score" id="score"></textarea>
        
        <script>
            const score = document.querySelector('#score')
            const output = document.querySelector('.score-output')

            output.textContent = score.value

            score.addEventListener('input', function() {
                output.textContent = score.value
        });
        </script>
    </div>
    <div class="mb-3">
        <p class="form-label">Cervezas disponibles:</p>
        <div class="row">
            @foreach ($beers as $beer)
            <div class="col-4 form-check form-switch mx-3">
                @if ($brewery->beers->find ($beer->id))
                <input type="checkbox" class="form-check-input" name="beers[]" id="beers_{{ $beer->id}}"
                value="{{ $beer->id }}" checked>
                @else
                <input type="checkbox" class="form-check-input" name="beers[]" id="beers_{{ $beer->id}}"
                value="{{ $beer->id }}">                   
                @endif
                <label class="form-check-label" for="flexCheckDefault">
                    {{ $beer->name }}
                </label>
            </div>

            @endforeach

        </div>
    </div>

    <div class="d-flex justify-content-center">
        <button type="submit" id="enviar" class="btn btn-warning mt-4 w-25">Enviar</button>
    </div>
</form>
<br>
<br>
@if (Session::get ('code') !== null)
<x-flash code="{{ Session::get ('code') }}" message="{{ Session::get ('message') }}"/>
@endif



@endsection
