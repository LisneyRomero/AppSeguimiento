@extends('app')

@section('title', 'Rol')

@section('content')
<body>
  <div class="container mt-5">
    <h1>Detalles</h1>

    <div class="card mt-3">
        <div class="card-header">
            Rol: {{ $rol->descripcion }}
        </div>
        <div class="card-body">
            <p><strong>Descripcion</strong> {{ $rol->descripcion }}</p>
      
        </div>
        <div class="card-footer">
            <a href="{{ route('rolesadministrativos.index') }}" class="btn btn-secondary">Volver a la lista</a>
            <a href="{{ route('rolesadministrativos.edit', $rol->NIS) }}" class="btn btn-primary">Editar</a>

            {{-- Botón eliminar --}}
            <form action="{{ route('rolesadministrativos.destroy', $rol->NIS) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta eps?')">
                    Eliminar
                </button>
            </form>
        </div>
    </div>
</div>
@endsection