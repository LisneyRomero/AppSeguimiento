@extends('app')

@section('title', 'EPS')

@section('content')
<body>
  <div class="container mt-5">
    <h1>Detalles</h1>

    <div class="card mt-3">
        <div class="card-header">
            EPS: {{ $eps->denominacion }}
        </div>
        <div class="card-body">
            <p><strong>NIT</strong> {{ $eps->numDocumento }}</p>
            <p><strong>Nombre de eps</strong> {{ $eps->denominacion }}</p>
            <p><strong>Observaciones:</strong> {{ $eps->observaciones }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('eps.index') }}" class="btn btn-secondary">Volver a la lista</a>
            <a href="{{ route('eps.edit', $eps->NIS) }}" class="btn btn-primary">Editar</a>

            {{-- Botón eliminar --}}
            <form action="{{ route('eps.destroy', $eps->NIS) }}" method="POST" class="d-inline">
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