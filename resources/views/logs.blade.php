@if( Session::has('mensaje'))
    <div class="alert alert-{{ $clase }}" role="alert">
        <div class="{!! Session::get('class')!!}">
             {!! Session::get('mensaje')!!}
        </div>
    </div>
@endif

@if( Session::has('mensajes'))
    <div class="alert alert-{!! Session::get('class')!!}" role="alert">
             {!! Session::get('mensajes')!!}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            {{ $error }}<br/>
        @endforeach
    </div>
@endif

