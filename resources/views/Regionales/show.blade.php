<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Detalles</title>
</head>
<body>
  <div class="container mt-5">
    <h1>Detalles de la region</h1>

    <div class="card mt-3">
        <div class="card-header">
            Regiones: {{ $regionales->denominacion }}
        </div>
        <div class="card-body">
            <p><strong>Código:</strong> {{ $regionales->codigo }}</p>
            <p><strong>Departamento:</strong> {{ $regionales->denominacion }}</p>
            <p><strong>Observaciones:</strong> {{ $regionales->observaciones }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('regionales.index') }}" class="btn btn-secondary">Volver a la lista</a>
            <a href="{{ route('regionales.edit', $regionales->NIS) }}" class="btn btn-primary">Editar</a>

            {{-- Botón eliminar --}}
            <form action="{{ route('regionales.destroy', $regionales->NIS) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta region?')">
                    Eliminar
                </button>
            </form>
        </div>
    </div>
</div>
</body>
</html>