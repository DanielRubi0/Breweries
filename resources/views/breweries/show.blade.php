@extends('layouts.app')

@section('title', 'Detalle de cervecerías')

@section ('content')

    <x-flash code="{{ $code }}" message="{{ $message }}"/>

    <x-card 
        img="{{ $brewery->img }}" 
        titulo="{{ $brewery->name }}" 
        contenido="{{ $brewery->description }}"
        score="{{ $brewery->score }}">
    </x-card>

    <div class="d-flex justify-content-around">
        
        <a href="{{ route ('breweries.index') }}" class="btn btn-primary">Volver</a>
        
        @if (( null !== (Auth::user())) && ($brewery->user_id == Auth::user()->id ))

            <a href="{{ route ('brewery.edit', $brewery) }}" class="btn btn-warning">Modificar</a>
            <form method="POST" action="{{ route ('brewery.destroy', $brewery) }}">
                @method('DELETE')
                @csrf  

                <button type="submit" class="btn btn-danger">Borrar</button>  
            </form>

        @else
            <p>Cervecería propuesta por: {{ $brewery->user->name }} ({{ $brewery->user->email }})</p>
        @endif
    </div>

@endsection
