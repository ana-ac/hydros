@if( Session::has('mensaje'))
    <div class="alert alert-{!! Session::get('class')!!}" role="alert">
        <div class="{!! Session::get('class')!!}">
             {!! Session::get('mensaje')!!}
        </div>
    </div>
    
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    {{ $error }}<br/>
                @endforeach
            </ul>
        </div>
    @endif
@endif