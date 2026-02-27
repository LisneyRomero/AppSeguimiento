@extends('app')

@section('title', 'Programas')

@section('content')
    <h1>Lista de Programas de Formación</h1>

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
            @forelse($programasdeformacion as $programa)
                <tr>
                    <td>{{ $programa->NIS }}</td>
                    <td>{{ $programa->codigo }}</td>
                    <td>{{ $programa->denominacion }}</td>
                    <td>{{ $programa->observaciones }}</td>
                    <td>
                        <a href="{{ route('programas.show', $programa->NIS) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('programas.edit', $programa->NIS) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('programas.destroy', $programa->NIS) }}" method="POST" class="d-inline">
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
    <a href="{{ route('inicio') }}" class="btn btn-success">Inicio</a>
</div>

@endsection