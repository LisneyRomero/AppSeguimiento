@extends('app')

@section('title', 'Regionales')

@section('content')

<h1>Lista de Identificaciones</h1>

{{-- BUSCADOR --}}
<form method="GET" action="{{ route('tiposdocumentos.index') }}" class="row mb-3">
    <div class="col-md-4">
        <input type="text" 
               name="buscar" 
               value="{{ request('buscar') }}"
               class="form-control"
               placeholder="Buscar...">
    </div>

    <div class="col-md-2">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-search"></i> Buscar
        </button>
    </div>

    <div class="col-md-2">
        <a href="{{ route('tiposdocumentos.index') }}" class="btn btn-secondary">
            Limpiar
        </a>
    </div>
</form>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="mb-3">
    <a href="{{ route('tiposdocumentos.create') }}" class="btn btn-primary">
        Añadir ID
    </a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>NIS</th>
            <th>Denominación</th>
            <th>Observaciones</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($tiposdocumentos as $tipos)
            <tr>
                <td>{{ $tipos->NIS }}</td>
                <td>{{ $tipos->denominacion }}</td>
                <td>{{ $tipos->observaciones }}</td>
                <td>
                    <a href="{{ route('tiposdocumentos.show', $tipos->NIS) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('tiposdocumentos.edit', $tipos->NIS) }}" class="btn btn-warning btn-sm">Editar</a>

                    <form action="{{ route('tiposdocumentos.destroy', $tipos->NIS) }}" 
                          method="POST" 
                          class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Estás seguro de eliminar esta región?')">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">
                    No hay identificaciones registradas.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection