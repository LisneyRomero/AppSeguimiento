<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Bootstrap--}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
     {{----}}
    <title>Inicio - Gestor de Archivos</title>
    
    <style>
        body {
            background-color: #e5e8f3;
        }
        .card-img-top {
            height: 150px;
            object-fit: cover;
        }
    </style>
</head>
<body>

    <div class="text-center mt-5">
    <h1 style="font-size: 40px; font-weight: 700; letter-spacing: 2px;">
        SISTEMA DE SEGUIMIENTO
    </h1>
</div>

<div class="container mt-5">

    <div class="row g-4">

        {{-- Card Programas --}}
        <div class="col-md-3">
            <div class="card shadow-lg rounded-4">
                <img src="{{ asset('images/programas.jpg') }}" alt="Programas" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Programas de Formación</h5>
                    <p class="card-text">Consulta, agrega o edita los programas de formación.</p>
                    <a href="{{ route('programas.index') }}" class="btn btn-primary">Ir a Programas</a>
                </div>
            </div>
        </div>

        {{-- Card Regionales --}}
        <div class="col-md-3">
            <div class="card shadow-lg rounded-4">
                <img src="{{ asset('images/regiones.jpg') }}" alt="Regionales" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Regionales</h5>
                    <p class="card-text">Consulta, agrega o edita la información.</p>
                  
                    <a href="{{ route('regionales.index') }}" class="btn btn-primary">Ir a Regionales</a>
                </div>
            </div>
        </div>

        {{-- Card eps --}}
        <div class="col-md-3">
            <div class="card shadow-lg rounded-4">
                <img src="{{ asset('images/eps.jpg') }}" alt="EPS" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">EPS</h5>
                    <p class="card-text">Consulta, agrega o edita la informacion sobre eps</p>
                  
                    <a href="{{ route('eps.index') }}" class="btn btn-primary">Ir a Eps</a>
                </div>
            </div>
        </div>

        {{-- Card roles --}}
        <div class="col-md-3">
            <div class="card shadow-lg rounded-4">
                <img src="{{ asset('images/roles.jpg') }}" alt="RolesAdministrativos" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Roles</h5>
                    <p class="card-text">Consulta, agrega o edita la informacion sobre roles</p>
                   
                    <a href="{{ route('rolesadministrativos.index') }}" class="btn btn-primary">Ir a Roles</a>
                </div>
            </div>
        </div>

{{-- Card Tipos de Documentos--}}
        <div class="col-md-3">
            <div class="card shadow-lg rounded-4">
                <img src="{{ asset('images/doc.jpg') }}" alt="TipoDocumentos" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Tipos de Documento</h5>
                    <p class="card-text">Consulta, agrega o edita la informacion</p>
    
                    <a href="{{ route('tiposdocumentos.index') }}" class="btn btn-primary">Ir a documentos</a>
                </div>
            </div>
        </div>

    </div>
</div>
</body>
</html>