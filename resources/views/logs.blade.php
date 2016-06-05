@if( Session::has('mensaje'))
    <div class="alert alert-{!! Session::get('class')!!}" role="alert">
        <div class="{!! Session::get('class')!!}">
             {!! Session::get('mensaje')!!}
        </div>
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            {{ $error }}<br/>
        @endforeach
    </div>
@endif
