@extends('app')

@section('title', 'Detalle Instructor')

@section('content')

    <div class="container mt-4">

        <div class="row justify-content-center">

            <div class="col-md-7">

                <div class="card shadow-sm border-0 rounded-3">

                    {{-- HEADER --}}
                    <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">

                        <div>
                            <h5 class="mb-0 fw-bold">
                                {{ $instructores->nombres }} {{ $instructores->apellidos }}
                            </h5>

                            <small class="text-muted">
                                {{ $instructores->tiposdocumentos->denominacion }} - {{ $instructores->numDocumento }}
                            </small>
                        </div>

                        <a href="{{ route('instructores.index') }}" class="btn btn-sm btn-outline-secondary">
                            Volver
                        </a>

                    </div>


                    {{-- BODY --}}
                    <div class="card-body">

                        <div class="row g-3">

                            <div class="col-md-6">
                                <span class="label">Rol Administrativo</span>
                                <div class="value">
                                    {{ $instructores->roladministrativo->descripcion ?? 'Sin rol' }}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <span class="label">Dirección</span>
                                <div class="value">{{ $instructores->direccion }}</div>
                            </div>

                            <div class="col-md-6">
                                <span class="label">Sexo</span>
                                <div class="value">{{ $instructores->sexo_texto }}</div>
                            </div>

                            <div class="col-md-6">
                                <span class="label">Correo Institucional</span>
                                <div class="value">{{ $instructores->correoInstitucional }}</div>
                            </div>

                            <div class="col-md-6">
                                <span class="label">Correo Personal</span>
                                <div class="value">{{ $instructores->correoPersonal }}</div>
                            </div>

                            <div class="col-md-6">
                                <span class="label">Fecha de Nacimiento</span>
                                <div class="value">{{ $instructores->fechaNacimiento }}</div>
                            </div>

                            <div class="col-md-6">
                                <span class="label">EPS</span>
                                <div class="value">
                                    {{ $instructores->eps->denominacion ?? 'Sin EPS' }}
                                </div>
                            </div>

                        </div>

                    </div>


                    {{-- FOOTER --}}
                    <div class="card-footer bg-white border-0 text-end">

                        <a href="{{ route('instructores.edit', $instructores->NIS) }}" class="btn btn-warning btn-sm">
                            Editar
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>


@endsection
