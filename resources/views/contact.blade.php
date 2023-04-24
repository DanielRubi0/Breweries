@extends('layouts.app')

@section('title', 'Contacto')

@section ('content')



<form action="{{ route ('contact') }}" method="POST">

    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Nombre:</label>
        <input type="text" class="form-control" name="name" placeholder="Nombre">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Correo electrónico:</label>
        <input type="email" class="form-control" name="email" placeholder="correo@tucorreo.com">
    </div>
    <div class="mb-3">
        <label for="message" class="form-label">Mensaje:</label>
        <textarea class="form-control" name="message" id="message" rows="3"></textarea>
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
