@extends('app')

@section('title', 'Detalle Aprendiz')

@section('content')

    <div class="container mt-4">

        <div class="row justify-content-center">

            <div class="col-md-7">

                <div class="card shadow-sm border-0 rounded-3">

                    {{-- HEADER --}}
                    <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">

                        <div>
                            <h5 class="mb-0 fw-bold">
                                {{ $enteconformador->razonSocial }}
                            </h5>

                            <small class="text-muted">
                                {{ $enteconformador->tiposdocumentos->denominacion }} - {{ $enteconformador->numDocumento }}
                            </small>
                        </div>

                        <a href="{{ route('enteconformadores.index') }}" class="btn btn-sm btn-outline-secondary">
                            Volver
                        </a>

                    </div>


                    {{-- BODY --}}
                    <div class="card-body">

                        <div class="row g-3">

                            <div class="col-md-6">
                                <span class="label">Dirección</span>
                                <div class="value">{{ $enteconformador->direccion }}</div>
                            </div>

                            <div class="col-md-6">
                                <span class="label">Telefono</span>
                                <div class="value">{{ $enteconformador->telefono }}</div>
                            </div>

                            <div class="col-md-6">
                                <span class="label">Correo Institucional</span>
                                <div class="value">{{ $enteconformador->correoInstitucional }}</div>
                            </div>


                        </div>
                    </div>

                    {{-- FOOTER --}}
                    <div class="card-footer bg-white border-0 text-end">

                        <a href="{{ route('enteconformadores.edit', $enteconformador->NIS) }}"
                            class="btn btn-warning btn-sm">
                            Editar
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>


@endsection
