@extends('app')

@section('title', 'Centros de Formacion')

@section('content')

    <div class="container mt-4">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h2 class="fw-bold mb-0">Centros de formacion</h2>
                <small class="text-muted">Gestión de centros de formación</small>
            </div>

            <a href="{{ route('centrosdeformacion.create') }}" class="btn btn-primary">
                + Nuevo Centro de Formación
            </a>

        </div>


        {{-- BUSCADOR --}}
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body">

                <form method="GET" action="{{ route('centrosdeformacion.index') }}" class="row g-2">

                    <div class="col-md-4">

                        <input type="text" name="buscar" value="{{ request('buscar') }}" class="form-control"
                            placeholder="Buscar...">

                    </div>

                    <div class="col-md-auto">

                        <button type="submit" class="btn btn-primary">
                            Buscar
                        </button>

                    </div>

                    <div class="col-md-auto">

                        <a href="{{ route('centrosdeformacion.index') }}" class="btn btn-outline-secondary">
                            Limpiar
                        </a>

                    </div>

                </form>

            </div>
        </div>


        {{-- TABLA --}}
        <div class="card shadow-sm border-0">

            <div class="card-body p-0">

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-light">

                            <tr>
                                <th>NIS</th>
                                <th>Regional</th>
                                <th>Código</th>
                                <th>Denominación</th>
                                <th>Dirección</th>
                                <th>Observaciones</th>
                                <th class="text-center">Acciones</th>
                                </tr>

                        </thead>


                        <tbody>

                            @forelse ($centrodeformacion as $centro)
                                <tr>

                                    <td>{{ $centro->NIS }}</td>

                                    <td>
                                        {{ $centro->regionales->denominacion ?? 'Sin regional' }}
                                    
                                    </td>

                                    <td>{{ $centro->codigo }}</td>

                                    <td>{{ $centro->denominacion }}</td>

                                    <td>{{ $centro->direccion }}</td>

                                    <td>{{ $centro->observaciones }}</td>                


                                    <td class="text-center">

                                        <a href="{{ route('centrosdeformacion.show', $centro->NIS) }}"
                                            class="btn btn-sm btn-outline-info">
                                            Ver
                                        </a>

                                        <a href="{{ route('centrosdeformacion.edit', $centro->NIS) }}"
                                            class="btn btn-sm btn-outline-warning">
                                            Editar
                                        </a>

                                        <form action="{{ route('centrosdeformacion.destroy', $centro->NIS) }}" method="POST"
                                            class="d-inline">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-outline-danger btn-eliminar">
                                                Eliminar
                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="8" class="text-center text-muted py-4">
                                        No hay centros de formación registrados
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>
        </div>


        {{-- PAGINACION --}}
        <div class="mt-4">
            {{ $centrodeformacion->links() }}
        </div>


    </div>

@endsection
