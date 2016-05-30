@if( Session::has('mensaje'))
    <div class="alert alert-{!! Session::get('class')!!}" role="alert">
          <div class="">{!! Session::get('mensaje')!!}</div>
    </div>
@endif