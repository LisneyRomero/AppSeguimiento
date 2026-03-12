@extends('app')

@section('title', 'Detalle Centro de Formación')

@section('content')

    <div class="container mt-4">

        <div class="row justify-content-center">

            <div class="col-md-7">

                <div class="card shadow-sm border-0 rounded-3">

                    {{-- HEADER --}}
                    <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">

                        <div>
                            <h5 class="mb-0 fw-bold">
                                {{ $centrodeformacion->denominacion }}
                            </h5>

                            <small class="text-muted">
                                {{ $centrodeformacion->regionales->denominacion }} - {{ $centrodeformacion->codigo }}
                            </small>
                        </div>

                        <a href="{{ route('centrosdeformacion.index') }}" class="btn btn-sm btn-outline-secondary">
                            Volver
                        </a>

                    </div>


                    {{-- BODY --}}
                    <div class="card-body">

                        <div class="row g-3">

                            <div class="col-md-6">
                                <span class="label">Dirección</span>
                                <div class="value">{{ $centrodeformacion->direccion }}</div>
                            </div>

                            <div class="col-md-6">
                                <span class="label">Observaciones</span>
                                <div class="value">{{ $centrodeformacion->observaciones }}</div>
                            </div>

                        </div>
                    </div>

                    {{-- FOOTER --}}
                    <div class="card-footer bg-white border-0 text-end">

                        <a href="{{ route('centrosdeformacion.edit', $centrodeformacion->NIS) }}"
                            class="btn btn-warning btn-sm">
                            Editar
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>




@endsection
