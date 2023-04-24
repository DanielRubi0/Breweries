@extends('layouts.app')

@section('title', 'Nueva cerveza')

@section ('content')


<form method="POST" action="{{ route ('beers.store') }}" enctype="multipart/form-data">

    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Nombre de la cerveza:</label>
        <input type="text" class="form-control" name="name" placeholder="Nombre" value="{{ old ('name')}}">
    </div>
    <div class="mb-3">
        <label for="type" class="form-label">Tipo de la cerveza:</label>
        <select name="beertype_id" class="form-control">
            @foreach ($beertypes as $beertype)
            <option value="{{ $beertype->id }}">{{ $beertype->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Imagen:</label>
        <input type="file" class="form-control" name="image" id="image" placeholder="Selecciona una foto">
    </div>
    <div class="mb-3">
        <label for="vol">Porcentaje de alcohol:</label>
        <div class="col-1">
            <input type="number" class="form-control" name="vol" id="vol" placeholder="4.5" value="{{ old ('vol') }}">
        </div>
    </div>
    <div class="mb-3">
        <p class="form-label">Cervecerías que la sirven:</p>
        <div class="row">
            @foreach ($breweries as $brewery)
            <div class="col-4 form-check form-switch mx-3">
                <input type="checkbox" class="form-check-input" name="breweries[]" id="breweries_{{ $brewery->id}}"
                    value="{{ $brewery->id }}">
                <label class="form-check-label" for="flexCheckDefault">
                    {{ $brewery->name }}
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
<x-flash code="{{ Session::get ('code') }}" message="{{ Session::get ('message') }}" />
@endif



@endsection
