@extends('app')

@section('title', 'Programas')

@section('content')
<body>
  <div class="container mt-5">
    <h1>Detalles del Programa</h1>

    <div class="card mt-3">
        <div class="card-header">
            Programa: {{ $programas->denominacion }}
        </div>
        <div class="card-body">
            <p><strong>Código:</strong> {{ $programas->codigo }}</p>
            <p><strong>Denominación:</strong> {{ $programas->denominacion }}</p>
            <p><strong>Observaciones:</strong> {{ $programas->observaciones }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('programas.index') }}" class="btn btn-secondary">Volver a la lista</a>
            <a href="{{ route('programas.edit', $programas->NIS) }}" class="btn btn-primary">Editar</a>

            {{-- Botón eliminar --}}
            <form action="{{ route('programas.destroy', $programas->NIS) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este programa?')">
                    Eliminar
                </button>
            </form>
        </div>
    </div>
</div>
</body>
@endsection