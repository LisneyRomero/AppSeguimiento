@extends('app')

@section('title', 'Regionales')

@section('content')

<h1>Lista de Regiones</h1>

{{-- BUSCADOR --}}
<form method="GET" action="{{ route('regionales.index') }}" class="row mb-3">
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
        <a href="{{ route('regionales.index') }}" class="btn btn-secondary">
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
    <a href="{{ route('regionales.create') }}" class="btn btn-primary">
        Añadir Región
    </a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>NIS</th>
            <th>Código</th>
            <th>Denominación</th>
            <th>Observaciones</th>
            <th>Acciones</th>
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
                    <a href="{{ route('regionales.show', $regional->NIS) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('regionales.edit', $regional->NIS) }}" class="btn btn-warning btn-sm">Editar</a>

                    <form action="{{ route('regionales.destroy', $regional->NIS) }}" 
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
                    No hay regiones registradas.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection