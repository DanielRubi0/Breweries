@extends('layouts.app')

@section('title', 'Detalle de la cerveza')

@section ('content')

    <x-card 
        titulo="{{ $beer->name }}" 
        score="{{ ($beer->vol / 2) }}">
        <x-slot:contenido>
            <p>{{ $beer -> beertype -> name}}</p>
            <p>
                @foreach ($beer->breweries as $brewery)
                    <a href="{{ route('brewery.show', $brewery->id) }}" class="btn btn-success">{{ $brewery->name }}</a>
                @endforeach
            </p>
        </x-slot:contenido>
    </x-card>

    <div class="d-flex justify-content-around">
    
        <a href="{{ route ('beers.index') }}" class="btn btn-primary">Volver</a>
        
        @auth
            <a href="{{ route ('beers.edit', $beer) }}" class="btn btn-warning">Modificar</a>
            <form method="POST" action="{{ route ('beers.destroy', $beer) }}">
                @method('DELETE')
                @csrf  
    
                <button type="submit" class="btn btn-danger">Borrar</button>  
            </form>
        @endauth
    
    </div>



@endsection