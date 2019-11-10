@if(Session::has( 'warning' ))
        <div class="alert alert-success" role="alert">
        {{ Session::get( 'warning' ) }}
        </div>
@endif
@if(session('warning'))
    <div class="alert alert-warning" role="alert">
    {{session('warning')}}
    </div>

@endif