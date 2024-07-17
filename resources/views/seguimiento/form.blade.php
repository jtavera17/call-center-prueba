@extends('theme.base')

@section('content')
    <div class="container pt-5 text-center">
        @if (isset($seguimientos))
            <h1>Editar Seguimiento</h1>
        @else
            <h1 class="">Crear Seguimiento</h1>
        @endif

        @if (isset($nombres))
             <form action="{{ route('seguimiento.update', $nombres) }}" method="post">
                @method('PUT')
            @else
            <form action="{{ route('seguimiento.store') }}" method="post">
        @endif

            @csrf

            <div class="mb-3">
                <label for="ombres" class="form-label">Nombres</label>
                <input type="text" name="nombres" class="form-control" placeholder="Escriba nombres completos" value="{{old('nombres') ?? @$seguimiento->nombres }}">  
                @error('nombres')
                <p class="form-text text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" name="apellidos" class="form-control" placeholder="Escriba apellidos completos" value="{{old('apellidos') ?? @$seguimiento->apellidos }}">
                @error('apellidos')
                <p class="form-text text-danger">{{$message}}</p>
                @enderror  
            </div>

            <div class="mb-3">
                <label for="asunto" class="form-label">Asunto</label>
                <input type="text" name="asunto" class="form-control" placeholder="Escriba el asunto" value="{{old('asunto') ?? @$seguimiento->asunto }}">
                @error('asunto')
                <p class="form-text text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="mail" name="correo" class="form-control" placeholder="Escriba el correo" value="{{old('correo') ?? @$seguimiento->correo }}">
                @error('correo')
                <p class="form-text text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Telefono</label>
                <input type="text" name="telefono" class="form-control" placeholder="Escriba el telefono" value="{{old('telefono') ?? @$seguimiento->telefono }}">
                @error('telefono')
                <p class="form-text text-danger">{{$message}}</p>
                @enderror 
            </div>

            <div class="mb-3">
                <label for="fecha_seguim_actual" class="form-label">Fecha Seguimiento Actual</label>
                <input type="date" name="fecha_seguim_actual" class="form-control" placeholder="Escriba el nombre" value="{{old('fecha_seguim_actual') ?? @$seguimiento->fecha_seguim_actual }}">
                @error('fecha_seguim_actual')
                <p class="form-text text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="num_dias" class="form-label">Numero de Dias</label>
                <input type="number" name="num_dias" class="form-control" placeholder="Escriba el numero de dias" value="{{old('num_dias') ?? @$seguimiento->num_dias }}">
                @error('num_dias')
                <p class="form-text text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="fecha_prox_seguim" class="form-label">Proxima Fecha de Seguimiento</label>
                <input type="date" name="fecha_prox_seguim" class="form-control" placeholder="Escriba el nombre" value="{{old('fecha_prox_seguim') ?? @$seguimiento->fecha_prox_seguim }}"> 
                @error('fecha_prox_seguim')
                <p class="form-text text-danger">{{$message}}</p>
                @enderror 
            </div>

            @if (isset($nombres))
            <button type="submit" class="btn btn-primary">Editar</button>
        @else
        <button type="submit" class="btn btn-primary">Crear</button>
        @endif


        </form>
    </div>
@endsection