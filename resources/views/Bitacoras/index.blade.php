@extends('app')

@section('title', 'Bitácoras')

@section('content')

<div class="container mt-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-0">Bitácoras</h2>
            <small class="text-muted">Gestión de bitácoras del sistema</small>
        </div>

        <a href="{{ route('bitacoras.create') }}" class="btn btn-primary">
            + Subir Bitácora
        </a>

    </div>

    {{-- TABLA --}}
    <div class="card shadow-sm border-0">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">
                        <tr>
                            <th>NIS</th>
                            <th>Nombre del Archivo</th>
                            <th>Ubicación</th>
                            <th>Estado</th>
                            <th>Subido por</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($bitacoras as $bitacora)

                            <tr>

                                <td>{{ $bitacora->NIS }}</td>

                                <td>{{ $bitacora->archivo }}</td>

                                <td>
                                    <small class="text-muted">{{ $bitacora->ruta }}</small>
                                </td>

                                <td>
                                    @if($bitacora->estado == 'Creada')
                                        <span class="badge bg-primary">Creada</span>
                                    @elseif($bitacora->estado == 'Aprobada')
                                        <span class="badge bg-success">Aprobada</span>
                                    @elseif($bitacora->estado == 'Rechazada')
                                        <span class="badge bg-danger">Rechazada</span>
                                    @endif
                                </td>

                                <td>{{ $bitacora->usuarios->correo ?? 'Sin usuario' }}</td>

                                <td class="text-center">

                                    {{-- Ver --}}
                                    <a href="{{ Storage::url($bitacora->ruta) }}"
                                       target="_blank"
                                       class="btn btn-sm btn-outline-info">
                                        Ver
                                    </a>

                                    {{-- Descargar --}}
                                    <a href="{{ asset('storage/'.$bitacora->ruta) }}"
                                       download
                                       class="btn btn-sm btn-outline-success">
                                        Descargar
                                    </a>

                                    {{-- Eliminar --}}
<form action="{{ route('bitacoras.destroy', $bitacora->NIS) }}" 
      method="POST" 
      class="d-inline form-eliminar"
      data-archivo="{{ $bitacora->archivo }}">

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
                                <td colspan="6" class="text-center text-muted py-4">
                                    No hay bitácoras registradas
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
        {{ $bitacoras->links() }}
    </div>

</div>

@endsection