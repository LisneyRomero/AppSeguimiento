@extends('app')

@section('title', 'ID')

@section('content')
<body>
  <div class="container mt-5">
    <h1>Detalles</h1>

    <div class="card mt-3">
        <div class="card-header">
            Tipo de Documento: {{ $tiposdocumentos->denominacion }}
        </div>
        <div class="card-body">
           {{-- <p><strong>NIT</strong> {{ $tiposdocumentos->numDocumento }}</p> --}}
            <p><strong>TI</strong> {{ $tiposdocumentos->denominacion }}</p>
            <p><strong>Observaciones:</strong> {{ $tiposdocumentos->observaciones }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('tiposdocumentos.index') }}" class="btn btn-secondary">Volver a la lista</a>
            <a href="{{ route('tiposdocumentos.edit', $tiposdocumentos->NIS) }}" class="btn btn-primary">Editar</a>

            {{-- Botón eliminar --}}
            <form action="{{ route('tiposdocumentos.destroy', $tiposdocumentos->NIS) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este ID?')">
                    Eliminar
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
