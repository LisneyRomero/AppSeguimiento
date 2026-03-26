<!doctype html>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">


    <style>
        /* SIDEBAR */

        .sidebar {
            width: 220px;
            min-height: 100vh;
            background: #f8fafc;
            border-right: 1px solid #e5e7eb;
        }

        /* TITULO */

        .sidebar-title {
            font-size: 18px;
            font-weight: 600;
            color: #111827;
        }

        /* BOTONES PRINCIPALES */

        .btn-toggle {
            width: 100%;
            display: flex;
            align-items: center;
            font-weight: 500;
            padding: 8px 10px;
            color: #374151;
            transition: all .2s;
        }

        /* FLECHA */

        .btn-toggle::after {
            content: '\f282';
            font-family: "bootstrap-icons";
            margin-left: auto;
            transition: transform .3s ease;
        }

        .btn-toggle[aria-expanded="true"]::after {
            transform: rotate(90deg);
        }

        /* HOVER BOTON */

        .btn-toggle:hover {
            background: #f1f5f9;
            color: #111827;
        }

        /* SUBMENU */

        .btn-toggle-nav a {
            padding: 6px 12px;
            display: block;
            margin: 3px 0;
            color: #6b7280;
            transition: all .2s;
        }

        /* HOVER SUBMENU */

        .btn-toggle-nav a:hover {
            background: #e2e8f0;
            color: #111827;
            padding-left: 16px;
            border-radius: 6px;
        }

        /* DETALLES CARD SHOW */
        .label {
            font-size: 12px;
            color: #6c757d;
            display: block;
            margin-bottom: 2px;
        }

        .value {
            font-weight: 500;
            font-size: 15px;
        }
    </style>

    <title>@yield('title')</title>

</head>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {

        document.querySelectorAll('.btn-eliminar').forEach(btn => {

            btn.addEventListener('click', function(e) {

                e.preventDefault();

                let form = this.closest('form');

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "Este registro será eliminado",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {

                    if (result.isConfirmed) {
                        form.submit();
                    }

                });

            });

        });

        @if (session('success'))
            Swal.fire({
                title: 'Operación exitosa',
                text: "{{ session('success') }}",
                icon: 'success'
            });
        @endif

    });
</script>



<body class="d-flex flex-column min-vh-100">

    <div class="d-flex flex-grow-1">

        {{-- SIDEBAR --}}
        <div class="flex-shrink-0 p-3 sidebar">

            <a href="{{ route('inicio') }}"
                class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
                <span class="sidebar-title">Gestor</span>
            </a>

            <ul class="list-unstyled ps-0">

                {{-- Regionales --}}
                <li class="mb-1">
                    <button onclick="window.location='{{ route('regionales.index') }}'"
                        class="btn btn-toggle d-inline-flex align-items-center rounded border-0">
                        Regionales
                    </button>

                    {{-- <div class="collapse" id="regionales-collapse">
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
                    </div> --}}
                </li>

                {{-- Programas --}}
                <li class="mb-1">
                    <button onclick="window.location='{{ route('programas.index') }}'"
                        class="btn btn-toggle d-inline-flex align-items-center rounded border-0">
                        Programas
                    </button>

                </li>

                {{-- EPS --}}
                <li class="mb-1">

                    <button onclick="window.location='{{ route('eps.index') }}'"
                        class="btn btn-toggle d-inline-flex align-items-center rounded border-0">
                        EPS
                    </button>

                </li>

                {{-- ROLES --}}
                <li class="mb-1">

                    <button onclick="window.location='{{ route('rolesadministrativos.index') }}'"
                        class="btn btn-toggle d-inline-flex align-items-center rounded border-0">
                        Roles
                    </button>

                </li>

                {{-- TIPOS DOCUMENTOS --}}
                <li class="mb-1">

                    <button onclick="window.location='{{ route('tiposdocumentos.index') }}'"
                        class="btn btn-toggle d-inline-flex align-items-center rounded border-0">
                        Tipos de Documentos
                    </button>
                </li>

                {{-- APRENDIZ --}}
                <li class="mb-1">

                    <button onclick="window.location='{{ route('aprendices.index') }}'"
                        class="btn btn-toggle d-inline-flex align-items-center rounded border-0">
                        Aprendices
                    </button>

                </li>

                {{-- CENTROS DE FORMACION --}}
                <li class="mb-1">

                    <button onclick="window.location='{{ route('centrosdeformacion.index') }}'"
                        class="btn btn-toggle d-inline-flex align-items-center rounded border-0">
                        Centros de Formación
                    </button>

                </li>

                {{-- EMPRESAS --}}
                <li class="mb-1">

                    <button onclick="window.location='{{ route('enteconformadores.index') }}'"
                        class="btn btn-toggle d-inline-flex align-items-center rounded border-0">
                        Empresas
                    </button>

                    {{-- <div class="collapse" id=enteconformadores-collapse">

                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">

                            <li>
                                <a href="{{ route('enteconformadores.index') }}"
                                   class="link-dark d-inline-flex text-decoration-none rounded">
                                    Ver Empresas
                                </a>
                            </li>

                        </ul>

                    </div>--}}
                </li> 

                {{-- FICHAS --}}
                <li class="mb-1">

                    <button onclick="window.location='{{ route('fichacaracterizacion.index') }}'"
                        class="btn btn-toggle d-inline-flex align-items-center rounded border-0">
                        Fichas
                    </button>
                    </li>

                    {{-- INSTRUCTORES --}}
                <li class="mb-1">

                    <button onclick="window.location='{{ route('instructores.index') }}'"
                        class="btn btn-toggle d-inline-flex align-items-center rounded border-0">
                        Instructores
                    </button>
                </li>

                 {{-- BITACORAS --}}
                <li class="mb-1">

                    <button onclick="window.location='{{ route('bitacoras.index') }}'"
                        class="btn btn-toggle d-inline-flex align-items-center rounded border-0">
                        Bitacoras
                    </button>
                </li>

            
                    </button>
                </li>
                    

            </ul>

            <div class="mt-auto p-3">

                <form action="{{ route('logout') }}" method="POST">
                     @csrf
                        <button type="submit" class="btn btn-outline-danger w-100">
                         <i class="bi bi-box-arrow-right"></i> Cerrar sesión
                      </button>
                </form>

        </div>

        </div>

        {{-- CONTENIDO --}}
        <div class="flex-grow-1 p-4">
            @yield('content')
        </div>


    </div>

    {{-- FOOTER --}}

    <footer class="bg-dark text-white text-center py-3">
        <small>
            Sistema de Gestión de Seguimiento © {{ date('Y') }}
        </small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
