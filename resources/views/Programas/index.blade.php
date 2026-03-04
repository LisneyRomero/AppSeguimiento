@extends('app')

@section('title', 'Programas')

@section('content')
    <h1>Lista de Programas de Formación</h1>

{{-- BUSCADOR --}}
<form method="GET" action="{{ route('programas.index') }}" class="row mb-3">
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
        <a href="{{ route('programas.index') }}" class="btn btn-secondary">
            Limpiar
        </a>
    </div>
</form>



    {{-- Mensaje de éxito --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

  
    <div class="mb-3">
        <a href="{{ route('programas.create') }}" class="btn btn-primary">Añadir Programa de Formación</a>
        
    </div>

    {{-- Tabla --}}
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
            @forelse($programas as $programas)
                <tr>
                    <td>{{ $programas->NIS }}</td>
                    <td>{{ $programas->codigo }}</td>
                    <td>{{ $programas->denominacion }}</td>
                    <td>{{ $programas->observaciones }}</td>
                    <td>
                        <a href="{{ route('programas.show', $programas->NIS) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('programas.edit', $programas->NIS) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('programas.destroy', $programas->NIS) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este programa?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No hay programas registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection