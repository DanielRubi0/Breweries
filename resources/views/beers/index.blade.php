@extends('layouts.app')

@section('title', 'Listado de cervezas')

@section ('content')

    @auth
    <p><a href="{{ route ('beers.create') }}" class="btn btn-warning">Nueva cerveza</a></p>
    @endauth

    <div class="d-flex flex-wrap justify-content-between">

        @foreach ($beers as $beer)
            <x-card 
                titulo="{{ $beer->name }}" 
                score="{{ ($beer->vol / 2) }}"
                contenido="{{ $beer -> beertype -> name}}"
                ancho="18rem"
                link="{{ route ('beers.show', $beer) }}">
            </x-card>
        @endforeach
    </div>

@endsection