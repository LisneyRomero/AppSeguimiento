<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    
@section('content')
<div class="container mt-5">
    <h1>Editar Region</h1>

    {{-- Mostrar errores de validación --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulario de edición --}}
    <form method="POST" action="{{ route('regionales.update', $regionales->NIS) }}">
        @csrf
        @method('PUT') 

        <div class="mb-3">
            <label for="codigo" class="form-label">Código</label>
            <input name="codigo" type="number" class="form-control" id="codigo" placeholder="Código de la region" value="{{ old('codigo', $regionales->codigo) }}">
        </div>

        <div class="mb-3">
            <label for="denominacion" class="form-label">Departamento</label>
            <input name="denominacion" type="text" class="form-control" id="denominacion" placeholder="Denominación del programa" value="{{ old('denominacion', $regionales->denominacion) }}">
        </div>

        <div class="mb-3">
            <label for="observaciones" class="form-label">Observaciones</label>
            <input name="observaciones" type="text" class="form-control" id="observaciones" placeholder="Observaciones" value="{{ old('observaciones', $regionales->observaciones) }}">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('regionales.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>