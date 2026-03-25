@extends('app')

@section('title', 'Fichas')

@section('content')

    <div class="container mt-4">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h2 class="fw-bold mb-0">Fichas de Caracterizacion</h2>
                <small class="text-muted">Gestión de Fichas de Caracterizacion</small>
            </div>

            <a href="{{ route('fichacaracterizacion.create') }}" class="btn btn-primary">
                + Nueva Ficha
            </a>

        </div>


        {{-- BUSCADOR --}}
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body">

                <form method="GET" action="{{ route('fichacaracterizacion.index') }}" class="row g-2">

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

                        <a href="{{ route('fichacaracterizacion.index') }}" class="btn btn-outline-secondary">
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
                                <th>Codigo</th>
                                <th>Programa</th>
                                <th>Denominacion</th>
                                <th>Centro de Formacion</th>                                
                                <th class="text-center">Acciones</th>
                            </tr>

                        </thead>


                        <tbody>

                            @forelse ($ficha as $fichas)
                                <tr>

                                    <td>{{ $fichas->NIS }}</td>

                                    
                                    <td>{{ $fichas->codigo }}</td>

                                    <td>
                                        {{ $fichas->programasdeformacion->denominacion ?? 'Sin programa' }}
                                       
                                    </td>

                                    <td>{{ $fichas->denominacion }}</td>

                                    <td>{{ $fichas->centrosdeformacion->denominacion ?? 'Sin centro' }}</td>

                                  
                                    <td class="text-center">

                                        <a href="{{ route('fichacaracterizacion.show', $fichas->NIS) }}"
                                            class="btn btn-sm btn-outline-info">
                                            Ver
                                        </a>

                                        <a href="{{ route('fichacaracterizacion.edit', $fichas->NIS) }}"
                                            class="btn btn-sm btn-outline-warning">
                                            Editar
                                        </a>

                                        <form action="{{ route('fichacaracterizacion.destroy', $fichas->NIS) }}" method="POST"
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
                                        No hay fichas registradas
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
            {{ $ficha->links() }}
        </div>


    </div>

@endsection