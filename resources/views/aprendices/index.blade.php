@extends('app')

@section('title', 'Aprendices')

@section('content')

    <div class="container mt-4">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h2 class="fw-bold mb-0">Aprendices</h2>
                <small class="text-muted">Gestión de aprendices del sistema</small>
            </div>

            <a href="{{ route('aprendices.create') }}" class="btn btn-primary">
                + Nuevo Aprendiz
            </a>

        </div>


        {{-- BUSCADOR --}}
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body">

                <form method="GET" action="{{ route('aprendices.index') }}" class="row g-2">

                    <div class="col-md-4">

                        <input type="text" name="buscar" value="{{ request('buscar') }}" class="form-control"
                            placeholder="Buscar por nombre o documento">

                    </div>

                    <div class="col-md-auto">

                        <button type="submit" class="btn btn-primary">
                            Buscar
                        </button>

                    </div>

                    <div class="col-md-auto">

                        <a href="{{ route('aprendices.index') }}" class="btn btn-outline-secondary">
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
                                <th>Sexo</th>
                                <th>EPS</th>
                                <th class="text-center">Acciones</th>
                            </tr>

                        </thead>


                        <tbody>

                            @forelse ($aprendices as $aprendiz)
                                <tr>

                                    <td>{{ $aprendiz->NIS }}</td>

                                    <td>
                                        {{ $aprendiz->tiposdocumentos->denominacion ?? 'Sin tipo' }}
                                        <br>
                                        <small class="text-muted">{{ $aprendiz->numDocumento }}</small>
                                    </td>

                                    <td>{{ $aprendiz->nombres }}</td>

                                    <td>{{ $aprendiz->apellidos }}</td>

                                    <td>{{ $aprendiz->correoInstitucional }}</td>

                                    <td>{{ $aprendiz->sexo_texto }}</td>

                                    <td>{{ $aprendiz->eps->denominacion ?? 'Sin EPS' }}</td>


                                    <td class="text-center">

                                        <a href="{{ route('aprendices.show', $aprendiz->NIS) }}"
                                            class="btn btn-sm btn-outline-info">
                                            Ver
                                        </a>

                                        <a href="{{ route('aprendices.edit', $aprendiz->NIS) }}"
                                            class="btn btn-sm btn-outline-warning">
                                            Editar
                                        </a>

                                        <form action="{{ route('aprendices.destroy', $aprendiz->NIS) }}" method="POST"
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
                                        No hay aprendices registrados
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
            {{ $aprendices->links() }}
        </div>


    </div>

@endsection
