@extends('theme.base')

@section('content')
    <div class="container pt-5 text-center">
        <h1 class="">
            Seguimiento de Clientes
        </h1>
        <a href="{{ route('seguimiento.create', ['id'=>1]) }}" class="btn btn-primary">
            Crear
        </a>

        @if (Session::has('mensaje'))
            <div class="alert alert-info my-5">
                {{Session::get('mensaje')}}
            </div>
        @endif

        <table class="table">
            <thead>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Asunto</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Seguimiento Actual</th>
                <th>Dias</th>
                <th>Proximo Seguimiento</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                @forelse ($nombres as $detail)
                <tr>
                    <td>{{$detail->nombres}}</td>
                    <td>{{$detail->apellidos}}</td>
                    <td>{{$detail->asunto}}</td>
                    <td>{{$detail->correo}}</td>
                    <td>{{$detail->telefono}}</td>
                    <td>{{$detail->fecha_seguim_actual}}</td>
                    <td>{{$detail->num_dias}}</td>
                    <td>{{$detail->fecha_prox_seguim}}</td>
                    <td>
                        <a href="{{ route('seguimiento.edit', $detail) }}" class="btn btn-warning">Editar</a>

                        <form action="{{ route('seguimiento.destroy', $detail) }}" method="post" class="d-inline"></form>
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </td>

                </tr>
                @empty
                    
                @endforelse

            </tbody>
        </table>

        {{$nombres->links()}}

    </div>
@endsection