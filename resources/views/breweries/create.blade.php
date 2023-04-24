@extends('layouts.app')

@section('title', 'Nueva cervecería')

@section ('content')


<form method="POST" action="{{ route ('brewery.store') }}" enctype="multipart/form-data">

    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Nombre de la cervecería:</label>
        <input type="text" class="form-control" name="name" placeholder="Nombre" value="{{ old ('name')}}">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Descripción:</label>
        <textarea class="form-control" name="description" id="description" rows="3">{{ old ('description')}}</textarea>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Imagen:</label>
        <input type="file" class="form-control" name="image" id="image" placeholder="Selecciona una foto"></input>
    </div>
    <div class="mb-3">
        <label for="score">Puntuación:</label>
        <output class="score-output" for="score">

        </output><br>
        <input type="range" min="1" max="5" step="1" value="3" name="score" id="score"></textarea>
        
        <script>
            const score = document.querySelector('#score')
            const output = document.querySelector('.score-output')

            output.textContent = score.value

            score.addEventListener('input', function() {
                output.textContent = score.value
        });
        </script>
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
