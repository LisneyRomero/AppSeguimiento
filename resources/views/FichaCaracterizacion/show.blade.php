@extends('app')

@section('title', 'Detalle Fichas')

@section('content')

    <div class="container mt-4">

        <div class="row justify-content-center">

            <div class="col-md-7">

                <div class="card shadow-sm border-0 rounded-3">

                    {{-- HEADER --}}
                    <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">

                        <div>
                            <h5 class="mb-0 fw-bold">
                                {{ $ficha->denominacion }} 
                            </h5>

                            <small class="text-muted">
                                {{ $ficha->codigo }} - {{ $ficha->programasdeformacion->denominacion }}
                            </small>
                        </div>

                        <a href="{{ route('fichacaracterizacion.index') }}" class="btn btn-sm btn-outline-secondary">
                            Volver
                        </a>

                    </div>


                    {{-- BODY --}}
                    <div class="card-body">

                        <div class="row g-3">

                            <div class="col-md-6">
                                <span class="label">Centro de Formación</span>
                                <div class="value">{{ $ficha->centrosdeformacion->denominacion }}</div>
                            </div>

                            <div class="col-md-6">
                                <span class="label">Cupo</span>
                                <div class="value">{{ $ficha->cupo }}</div>
                            </div>

                            <div class="col-md-6">
                                <span class="label">Fecha de Inicio</span>
                                <div class="value">{{ $ficha->fechaInicio }}</div>
                            </div>

                            <div class="col-md-6">
                                <span class="label">Fecha de Finalizacion</span>
                                <div class="value">{{ $ficha->fechaFin }}</div>
                            </div>

                            <div class="col-md-6">
                                <span class="label">Observaciones</span>
                                <div class="value">{{ $ficha->observaciones }}</div>
                            </div>

                        
                        </div>

                    </div>


                    {{-- FOOTER --}}
                    <div class="card-footer bg-white border-0 text-end">

                        <a href="{{ route('fichacaracterizacion.edit', $ficha->NIS) }}" class="btn btn-warning btn-sm">
                            Editar
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>


@endsection
