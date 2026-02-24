<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Gestor de Archivos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card-img-top {
            height: 150px;
            object-fit: cover;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4 text-center">INICIO</h1>

    <div class="row g-4">
        {{-- Card Programas --}}
        <div class="col-md-4">
            <div class="card h-100">
                <img src="{{ asset('images/programas.jpg') }}" alt="Programas" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Programas de Formación</h5>
                    <p class="card-text">Consulta, agrega o edita los programas de formación.</p>
                    <a href="{{ route('programas.index') }}" class="btn btn-primary">Ir a Programas</a>
                </div>
            </div>
        </div>

        {{-- Card Regionales --}}
        <div class="col-md-4">
            <div class="card h-100">
                <img src="{{ asset('images/regiones.jpg') }}" alt="Regionales" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Regionales</h5>
                    <p class="card-text">Consulta, agrega o edita la información.</p>
                    <br>
                    <a href="{{ route('regionales.index') }}" class="btn btn-success">Ir a Regionales</a>
                </div>
            </div>
        </div>


    </div>
</div>
</body>
</html>