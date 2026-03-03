<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
     <style>
    .btn-toggle::after {
        content: '\f282'; /* icono flecha bootstrap */
        font-family: "bootstrap-icons";
        margin-left: auto;
        transition: transform .3s ease;
    }

    .btn-toggle[aria-expanded="true"]::after {
        transform: rotate(90deg);
    }

    .btn-toggle {
        width: 100%;
        display: flex;
        align-items: center;
    }
</style>
    <title>@yield('title')</title>
</head>
<body>

<div class="d-flex">

    {{-- SIDEBAR --}}
    <div class="flex-shrink-0 p-3 bg-light" style="width: 280px; min-height:100vh;">
        
        <a href="{{ route('inicio') }}" 
           class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
            <span class="fs-5 fw-semibold">Gestor</span>
        </a>

        <ul class="list-unstyled ps-0">

            {{-- Regionales --}}
            <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                        data-bs-toggle="collapse"
                        data-bs-target="#regionales-collapse">
                    Regionales
                </button>
                <div class="collapse" id="regionales-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li>
                            <a href="{{ route('regionales.index') }}"
                               class="link-dark d-inline-flex text-decoration-none rounded">
                                Ver Regionales
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('regionales.create') }}"
                               class="link-dark d-inline-flex text-decoration-none rounded">
                                Crear Regional
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- Programas --}}
            <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                        data-bs-toggle="collapse"
                        data-bs-target="#programas-collapse">
                    Programas
                </button>
                <div class="collapse" id="programas-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li>
                            <a href="{{ route('programas.index') }}"
                               class="link-dark d-inline-flex text-decoration-none rounded">
                                Ver Programas
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- EPS --}}
            <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                        data-bs-toggle="collapse"
                        data-bs-target="#eps-collapse">
                    EPS
                </button>
                <div class="collapse" id="eps-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li>
                            <a href="{{ route('eps.index') }}"
                               class="link-dark d-inline-flex text-decoration-none rounded">
                                Ver eps
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- ROLES --}}
            <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                        data-bs-toggle="collapse"
                        data-bs-target="#roles-collapse">
                    Roles
                </button>
                <div class="collapse" id="roles-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li>
                            <a href="{{ route('rolesadministrativos.index') }}"
                               class="link-dark d-inline-flex text-decoration-none rounded">
                                Ver roles
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


        </ul>
    </div>

    {{-- CONTENIDO --}}
    <div class="flex-grow-1 p-4">
        @yield('content')
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>