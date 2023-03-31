@if (Session::has('success'))
<div class="alert alert-primary mt-2 text-center" role="alert">
    {{ Session::get('success') }}
</div>
@endif

@if (Session::has('fail'))
<div class="alert alert-danger mt-2 text-center" role="alert">
    {{ Session::get('fail') }}
</div>
@endif
