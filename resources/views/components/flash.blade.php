@props([
'texto',
'otrotexto'
])

@if ($code >=0)

    <div id="flash" class="bg-{{ $color }} text-white">
        @if ($code > 0)
        {{ $code }} -
        @endif

        @isset($message)
        {{ $message }}
        @endisset

        @isset($texto)
        {{ $texto }}
        @endisset
    </div>

    @if ($code == 0)
    <script type="text/javascript">
        setTimeout( () => {
            let divFlash = document.getElementById('flash');
            divFlash.classList.add ('d-none');
        }, 3000)
    </script>
    @endif 
@endif