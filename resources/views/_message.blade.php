@if (!empty(session('success')))
    <div class="aler alert-success" role="alert">
        {{session('success')}}
    </div>
@endif

@if (!empty(session('error')))
    <div class="alert alert-danger" role="alert">
        {{session('error')}}
    </div>
@endif
