
    @if(Session::has('mensaje'))
        <div class="alert alert-{{ Session::get('class') }} pagination-centered ">{{ Session::get('mensaje') }}</div>
    @endif