@extends('app')

@section('title', 'Programas')
    
@section('content')
<div class="container mt-5">
    <h1>Editar Programa</h1>

    {{-- Mostrar errores de validación --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulario de edición --}}
    <form method="POST" action="{{ route('programas.update', $programas->NIS) }}">
        @csrf
        @method('PUT') 

        <div class="mb-3">
            <label for="codigo" class="form-label">Código</label>
            <input name="codigo" type="number" class="form-control" id="codigo" placeholder="Código del programa" value="{{ old('codigo', $programas->codigo) }}">
        </div>

        <div class="mb-3">
            <label for="denominacion" class="form-label">Denominación</label>
            <input name="denominacion" type="text" class="form-control" id="denominacion" placeholder="Denominación del programa" value="{{ old('denominacion', $programas->denominacion) }}">
        </div>

        <div class="mb-3">
            <label for="observaciones" class="form-label">Observaciones</label>
            <input name="observaciones" type="text" class="form-control" id="observaciones" placeholder="Observaciones" value="{{ old('observaciones', $programas->observaciones) }}">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('programas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
@endsection