@if (isset($ancho))
    <div class="card my-2" style="width:{{ $ancho }};">
@else
    <div class="card my-2 w-100">
@endif


    <div class="card-body">

        @isset ($img)
            <img src="{{ $img }}" class="card-img-top" style="height: 250px" alt="...">
        @endisset
            <h5 class="card-title">{{ $titulo }}</h5>
        @isset ($score)
        @for ($i = 0; $i < $score; $i++)
            <img src="{{ asset ('/img/score.png') }}" class="score">
        @endfor
        </p>
        @endisset
        @isset($contenido)
        <p class="card-text">{{ $contenido }}</p>
        @endisset
        @isset($link)
        <a href="{{ $link }}" class="btn btn-warning">Ver</a>
        @endisset
    </div>
</div>