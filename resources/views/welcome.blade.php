@extends('theme.base')

@section('content')
    <div class="container pt-5 text-center">
        <h1 class="">
            Bienvenido!
        </h1>
        <a href="#" class="btn btn-primary">
            Home
        </a> 
        <a href="{{ route('seguimiento.index', ['id'=>1]) }}" class="btn btn-primary">
            Seguimiento
        </a> 
    </div>
@endsection