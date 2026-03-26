@extends('app')

@section('title', 'Instructores')

@section('content')

    <div class="container mt-4">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h2 class="fw-bold mb-0">Instructores</h2>
                <small class="text-muted">Gestión de Instructores</small>
            </div>

            <a href="{{ route('instructores.create') }}" class="btn btn-primary">
                + Nuevo Instructor
            </a>

        </div>


        {{-- BUSCADOR --}}
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body">

                <form method="GET" action="{{ route('instructores.index') }}" class="row g-2">

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

                        <a href="{{ route('instructores.index') }}" class="btn btn-outline-secondary">
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
                                <th>Documento</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Correo institucional</th>
                                <th>Rol</th>                                
                                <th class="text-center">Acciones</th>
                            </tr>

                        </thead>


                        <tbody>

                            @forelse ($instructores as $instructor)
                                <tr>

                                    <td>{{ $instructor->NIS }}</td>

                                    <td>
                                        {{ $instructor->tiposdocumentos->denominacion ?? 'Sin tipo' }}
                                        <br>
                                        <small class="text-muted">{{ $instructor->numDocumento }}</small>
                                    </td>

                                    <td>{{ $instructor->nombres }}</td>

                                    <td>{{ $instructor->apellidos }}</td>

                                    <td>{{ $instructor->correoInstitucional }}</td>

                                    <td>{{ $instructor->roladministrativo->descripcion ?? 'Sin rol' }}</td>

                                
                                    <td class="text-center">

                                        <a href="{{ route('instructores.show', $instructor->NIS) }}"
                                            class="btn btn-sm btn-outline-info">
                                            Ver
                                        </a>

                                        <a href="{{ route('instructores.edit', $instructor->NIS) }}"
                                            class="btn btn-sm btn-outline-warning">
                                            Editar
                                        </a>

                                        <form action="{{ route('instructores.destroy', $instructor->NIS) }}" method="POST"
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
                                        No hay instructores registrados
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
            {{ $instructores->links() }}
        </div>


    </div>

@endsection
