@extends('layouts.app')

@section('title', 'Cervecerías y cafeterías')

@section ('content')

    @auth
    <p><a href="{{ route ('brewery.create') }}" class="btn btn-warning">Nueva cervecería</a></p>
    @endauth

        @foreach ($breweries as $brewery)
            <x-card 
                img="{{ $brewery->img }}"
                titulo="{{ $brewery->name }}"
                score="{{ $brewery->score }}"  
                ancho="18rem"
                link="{{ route ('brewery.show', $brewery) }}">
            

            <x-slot:contenido>
                <p>{{ $brewery->user->name }}</p>
            </x-slot:contenido>
        </x-card>
        @endforeach

@endsection