@extends('app')

@section('title', 'EPS')

@section('content')

<h1>Lista de EPS</h1>

{{-- BUSCADOR --}}
<form method="GET" action="{{ route('eps.index') }}" class="row mb-3">
    <div class="col-md-4">
        <input type="text" 
               name="buscar" 
               value="{{ request('buscar') }}"
               class="form-control"
               placeholder="Buscar por departamento...">
    </div>

    <div class="col-md-2">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-search"></i> Buscar
        </button>
    </div>

    <div class="col-md-2">
        <a href="{{ route('eps.index') }}" class="btn btn-secondary">
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
    <a href="{{ route('eps.create') }}" class="btn btn-primary">
        Añadir EPS
    </a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>NIS</th>
            <th>Numero de Documento</th>
            <th>Denominación</th>
            <th>Observaciones</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($eps as $eps)
            <tr>
                <td>{{ $eps->NIS }}</td>
                <td>{{ $eps->numDocumento }}</td>
                <td>{{ $eps->denominacion }}</td>
                <td>{{ $eps->observaciones }}</td>
                <td>
                    <a href="{{ route('eps.show', $eps->NIS) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('eps.edit', $eps->NIS) }}" class="btn btn-warning btn-sm">Editar</a>

                    <form action="{{ route('eps.destroy', $eps->NIS) }}" 
                          method="POST" 
                          class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Estás seguro de eliminar esta eps')">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">
                    No hay regiones registradas.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection