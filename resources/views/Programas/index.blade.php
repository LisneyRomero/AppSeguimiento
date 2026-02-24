<?php
?>

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>programas</title>

</head>

<body>
<div class="container mt-5">
    <h1>Lista de Programas de Formación</h1>

    {{-- Mensaje de éxito --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('programas.create') }}" class="btn btn-primary mb-3">Añadir Programa de Formación</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>NIS</th>
                <th>Código</th>
                <th>Denominación</th>
                <th>Observaciones</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($programasdeformacion as $programa)
                <tr>
                    <td>{{ $programa->NIS }}</td>
                    <td>{{ $programa->codigo }}</td>
                    <td>{{ $programa->denominacion }}</td>
                    <td>{{ $programa->observaciones }}</td>
                    <td>
                        <a href="{{ route('programas.show', $programa->NIS) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('programas.edit', $programa->NIS) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('programas.destroy', $programa->NIS) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este programa?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No hay programas registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    </div>
</body>

</html>
