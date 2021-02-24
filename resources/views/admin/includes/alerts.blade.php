@if ($errors->any())
<div class="alert alert-warning">
    @foreach ($errors->all() as $error)
    <p class="align-middle">{{$error}}</p>
    @endforeach
</div>
@endif

@if (session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif