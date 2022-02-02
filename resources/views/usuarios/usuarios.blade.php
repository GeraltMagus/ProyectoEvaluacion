@extends('layouts.plantillaBase')

@section('contenido')
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    <h1>Vista Usuarios</h1>
    <a href="usuarios/create" class="btn btn-primary">Crear Usuario</a>
    <style>
        /* Tooltip text */
        .tooltiptext {
            visibility: hidden;
            width: 120px;
            background-color: black;
            color: #fff;
            text-align: center;
            padding: 5px 0;
            border-radius: 6px;

            /* Position the tooltip text - see examples below! */
            position: absolute;
            z-index: 1;
        }

        /* Show the tooltip text when you mouse over the tooltip container */
        .tooltip:hover .tooltiptext {
            visibility: visible;
        }

    </style>
    <table class="table table-dark table-striped mt-4">
        <thead>
            <th scope="col">Nombre</th>
            <th scope="col">Edad</th>
            <th scope="col">Sexo</th>
            <th scope="col">Dirección</th>
            <th scope="col">Habilidades</th>
            <th scope="col">Estatus</th>
            <th scope="col">Acciones</th>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->nombre . ' ' . $usuario->apellido_paterno . ' ' . $usuario->apellido_materno }}</td>
                    <td>{{ \Carbon\Carbon::parse($usuario->fecha_nacimiento)->diff(\Carbon\Carbon::now())->format('%y años') }}
                    </td>
                    <td>
                        @if ($usuario->sexo === 'Masculino')
                            <i class="fas fa-male"></i>
                        @elseif ($usuario->sexo === 'Femenino')
                            <i class="fas fa-female"></i>
                        @else
                        @endif
                    </td>
                    <td data-toggle="tooltip" data-placement="top" title="{{ $usuario->ciudad . ', ' . $usuario->estado }}">
                        @if (is_null($usuario->numero_interior))
                            {{$usuario->calle . ' ' . $usuario->numero_exterior . ', ' . $usuario->colonia . ', CP ' . $usuario->codigo_postal }}
                        @else
                            {{$usuario->calle . ' ' . $usuario->numero_exterior . ' ' . $usuario->numero_interior . ', ' . $usuario->colonia . ', CP ' . $usuario->codigo_postal }}
                        @endif
                    </td>
                    <td>{{$habilidades->where('id_usuario',$usuario->id)->count()}}</td>
                    <td>{{$usuario->estatus}}</td>
                    <td>
                        <a href="/usuarios/{{$usuario->id}}/edit" class="btn btn-info">Editar</a>
                        <button class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
