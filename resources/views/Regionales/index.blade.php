@extends('app')

@section('title', 'Regionales')

@section('content')

    <div class="container mt-4">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h2 class="fw-bold mb-0">Regionales</h2>
                <small class="text-muted">Gestión de Regiones</small>
            </div>

            <a href="{{ route('regionales.create') }}" class="btn btn-primary">
                + Nueva Región
            </a>

        </div>


        {{-- BUSCADOR --}}
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body">

                <form method="GET" action="{{ route('regionales.index') }}" class="row g-2">

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

                        <a href="{{ route('regionales.index') }}" class="btn btn-outline-secondary">
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
                                <th>Código</th>
                                <th>Denominación</th>
                                <th>Observaciones</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($regionales as $regional)
                                <tr>
                                    <td>{{ $regional->NIS }}</td>
                                    <td>{{ $regional->codigo }}</td>
                                    <td>{{ $regional->denominacion }}</td>
                                    <td>{{ $regional->observaciones }}</td>
                                    <td>
                                        <a href="{{ route('regionales.show', $regional->NIS) }}"
                                            class="btn btn-sm btn-outline-info">Ver</a>
                                        <a href="{{ route('regionales.edit', $regional->NIS) }}"
                                            class="btn btn-sm btn-outline-warning">Editar</a>

                                        <form action="{{ route('regionales.destroy', $regional->NIS) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger btn-eliminar"
                                                onclick="return confirm('¿Estás seguro de eliminar esta región?')">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted py-4">
                                        No hay regiones registradas
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>

            </div>
        </div>



    </div>

    {{-- PAGINACION 
    <div class="mt-4">
        {{ $regionales->links() }}
    </div> 
    --}}



@endsection
