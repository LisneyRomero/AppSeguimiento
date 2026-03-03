@extends('app')

@section('title', 'Roles')

@section('content')


<h1>Lista de roles</h1>

{{-- BUSCADOR --}}
<form method="GET" action="{{ route('rolesadministrativos.index') }}" class="row mb-3">
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
        <a href="{{ route('rolesadministrativos.index') }}" class="btn btn-secondary">
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
    <a href="{{ route('rolesadministrativos.create') }}" class="btn btn-primary">
        Añadir Rol
    </a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>NIS</th>
            <th>Descripcion</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($rol as $roles)
            <tr>
                <td>{{ $roles->NIS }}</td>
                <td>{{ $roles->descripcion }}</td>
                <td>
                    <a href="{{ route('rolesadministrativos.show', $roles->NIS) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('rolesadministrativos.edit', $roles->NIS) }}" class="btn btn-warning btn-sm">Editar</a>

                    <form action="{{ route('rolesadministrativos.destroy', $roles->NIS) }}" 
                          method="POST" 
                          class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Estás seguro de eliminar esta rol')">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">
                    No hay roles registradaos.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection