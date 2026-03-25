<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Sistema de Seguimiento</title>

    <style>
        body {
            background: #f8fafc;
            font-family: Inter, system-ui, -apple-system, sans-serif;
        }

        /* header */

        .header {
            margin-top: 70px;
            text-align: center;
        }

        .titulo {
            font-size: 44px;
            font-weight: 700;
            color: #0f172a;
        }

        .subtitulo {
            color: #64748b;
            margin-top: 10px;
        }

        /* grid */

        .dashboard {

            margin-top: 70px;

            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));

            gap: 30px;

            max-width: 1100px;

            margin-left: auto;
            margin-right: auto;

        }

        /* cards UX */

        .card-ui {

            background: white;

            border-radius: 16px;

            border: 1px solid #e2e8f0;

            overflow: hidden;

            transition: all .25s ease;

            height: 300px;

            display: flex;

            flex-direction: column;

        }

        .card-ui:hover {

            transform: translateY(-5px);

            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);

        }

        /* imagen */

        .card-ui img {

            height: 150px;

            object-fit: cover;

        }

        /* body */

        .card-body {

            padding: 22px;

            display: flex;

            flex-direction: column;

            flex-grow: 1;

        }

        .card-body h5 {

            font-size: 18px;

            font-weight: 600;

            color: #0f172a;

        }

        .card-text {

            color: #64748b;

            font-size: 14px;

            flex-grow: 1;

        }

        /* botón UX */

        .btn-ui {

            border-radius: 8px;

            padding: 10px;

            font-size: 14px;

            font-weight: 500;

            background: #0f172a;

            color: white;

            border: none;

        }

        .btn-ui:hover {

            background: #1e293b;

        }
    </style>

</head>

<body>

    <div class="container header">

        <h1 class="titulo">
            Sistema de Seguimiento
        </h1>

        <p class="subtitulo">
            Panel principal del sistema
        </p>

    </div>


    <div class="dashboard">

        <!-- PROGRAMAS -->

        <div class="card-ui">
            <img src="{{ asset('images/programas.jpg') }}">

            <div class="card-body">

                <h5>Programas</h5>

                <p class="card-text">
                    Administración de programas de formación.
                </p>

                <a href="{{ route('programas.index') }}" class="btn btn-ui">
                    Abrir módulo
                </a>

            </div>
        </div>


        <!-- REGIONALES -->

        <div class="card-ui">
            <img src="{{ asset('images/regiones.jpg') }}">

            <div class="card-body">

                <h5>Regionales</h5>

                <p class="card-text">
                    Gestión y control de regionales.
                </p>

                <a href="{{ route('regionales.index') }}" class="btn btn-ui">
                    Abrir módulo
                </a>

            </div>
        </div>


        <!-- EPS -->

        <div class="card-ui">
            <img src="{{ asset('images/eps.jpg') }}">

            <div class="card-body">

                <h5>EPS</h5>

                <p class="card-text">
                    Administración de entidades de salud.
                </p>

                <a href="{{ route('eps.index') }}" class="btn btn-ui">
                    Abrir módulo
                </a>

            </div>
        </div>


        <!-- ROLES -->

        <div class="card-ui">
            <img src="{{ asset('images/roles.jpg') }}">

            <div class="card-body">

                <h5>Roles</h5>

                <p class="card-text">
                    Gestión de roles administrativos.
                </p>

                <a href="{{ route('rolesadministrativos.index') }}" class="btn btn-ui">
                    Abrir módulo
                </a>

            </div>
        </div>


        <!-- DOCUMENTOS -->

        <div class="card-ui">
            <img src="{{ asset('images/doc.jpg') }}">

            <div class="card-body">

                <h5>Documentos</h5>

                <p class="card-text">
                    Administración de tipos de documento.
                </p>

                <a href="{{ route('tiposdocumentos.index') }}" class="btn btn-ui">
                    Abrir módulo
                </a>

            </div>
        </div>


        <!-- APRENDICES -->

        <div class="card-ui">
            <img src="{{ asset('images/aprendices.jpeg') }}">

            <div class="card-body">

                <h5>Aprendices</h5>

                <p class="card-text">
                    Gestión de información de aprendices.
                </p>

                <a href="{{ route('aprendices.index') }}" class="btn btn-ui">
                    Abrir módulo
                </a>

            </div>
        </div>


        <!-- CENTROS -->

        <div class="card-ui">
            <img src="{{ asset('images/centros.jpg') }}">

            <div class="card-body">

                <h5>Centros de Formación</h5>

                <p class="card-text">
                    Información de centros de formación.
                </p>

                <a href="{{ route('centrosdeformacion.index') }}" class="btn btn-ui">
                    Abrir módulo
                </a>

            </div>
        </div>

        <!-- EMPRESAS -->

        <div class="card-ui">
            <img src="{{ asset('images/empresa.jpg') }}">

            <div class="card-body">

                <h5>Empresas</h5>

                <p class="card-text">
                    Información de entes conformadores.
                </p>

                <a href="{{ route('enteconformadores.index') }}" class="btn btn-ui">
                    Abrir módulo
                </a>

            </div>
        </div>

         <!-- FICHAS DE CARACTERIZACIÓN -->

        <div class="card-ui">
            <img src="{{ asset('images/ficha.jpg') }}">

            <div class="card-body">

                <h5>Fichas de Caracterización</h5>

                <p class="card-text">
                    Información de fichas de caracterización.
                </p>

                <a href="{{ route('fichacaracterizacion.index') }}" class="btn btn-ui">
                    Abrir módulo
                </a>

            </div>
        </div>


    </div>

</body>

</html>
