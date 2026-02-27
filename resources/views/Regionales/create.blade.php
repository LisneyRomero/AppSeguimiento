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
    <title>create region</title>
</head>
<body>
  
@section('content')
<div class="container mt-5">
    <h1>Crear Regional</h1>

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

    <form method="POST" action="{{ route('programas.store') }}">
        @csrf

        <div class="mb-3">
            <label for="codigo" class="form-label">Código</label>
            <input name="codigo" type="number" class="form-control" id="codigo" placeholder="Código de la region" value="{{ old('codigo') }}">
        </div>

        <div class="mb-3">
            <label for="denominacion" class="form-label">Departamento</label>
            <input name="denominacion" type="text" class="form-control" id="denominacion" placeholder="Departamento" value="{{ old('denominacion') }}">
        </div>

        <div class="mb-3">
            <label for="observaciones" class="form-label">Observaciones</label>
            <input name="observaciones" type="text" class="form-control" id="observaciones" placeholder="Observaciones" value="{{ old('observaciones') }}">
        </div>

        <button type="submit" class="btn btn-primary">Agregar Region</button>
        <a href="{{ route('regionales.index') }}" class="btn btn-secondary">Volver a la lista</a>
    </form>
</div>

</body>
</html>
