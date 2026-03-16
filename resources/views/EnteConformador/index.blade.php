@extends('app')

@section('title', 'Empresas')

@section('content')

    <div class="container mt-4">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h2 class="fw-bold mb-0">Empresas</h2>
                <small class="text-muted">Gestión de Empresas</small>
            </div>

            <a href="{{ route('enteconformadores.create') }}" class="btn btn-primary">
                + Nueva Empresa
            </a>

        </div>


        {{-- BUSCADOR --}}
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body">

                <form method="GET" action="{{ route('enteconformadores.index') }}" class="row g-2">

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

                        <a href="{{ route('enteconformadores.index') }}" class="btn btn-outline-secondary">
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
                            <th>Tipo Documento</th>
                            <th>Num.Documento</th>
                            <th>Razón Social</th>
                            <th>Dirección</th>
                            <th>Telefono</th>
                            <th>Correo Institucional</th>
                            <th class="text-center">Acciones</th>
                        </tr>

                        </thead>


                        <tbody>

                        @forelse ($enteconformador as $entec)
                            <tr>

                                <td>{{ $entec->NIS }}</td>
                                <td>{{ $entec->tiposdocumentos->denominacion ?? 'Sin empresa' }} </td>
                                <td>{{ $entec->numDocumento }}</td>
                                <td>{{ $entec->razonSocial }}</td>
                                <td>{{ $entec->direccion }}</td>
                                <td>{{ $entec->telefono }}</td>
                                <td>{{ $entec->correoInstitucional }}</td>


                                <td class="text-center">

                                    <a href="{{ route('enteconformadores.show', $entec->NIS) }}"
                                       class="btn btn-sm btn-outline-info">
                                        Ver
                                    </a>

                                    <a href="{{ route('enteconformadores.edit', $entec->NIS) }}"
                                       class="btn btn-sm btn-outline-warning">
                                        Editar
                                    </a>

                                    <form action="{{ route('enteconformadores.destroy', $entec->NIS) }}" method="POST"
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
                                    No hay empresas registrados
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
            {{ $enteconformador->links() }}
        </div>


    </div>

@endsection
