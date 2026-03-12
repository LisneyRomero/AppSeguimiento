@extends('app')

@section('title', 'ID')
    
@section('content')

<div class="container mt-5">
    <h1>Editar ID</h1>

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
    <form method="POST" action="{{ route('tiposdocumentos.update', $tiposdocumentos) }}">
        @csrf
        @method('PUT') 

        <div class="mb-3">
            <label for="denominacion" class="form-label">Descripcion</label>
            <input name="denominacion" type="text" class="form-control" id="denominacion" placeholder="tipo de id" value="{{ old('denominacion', $tiposdocumentos->denominacion) }}">
        </div>
        <div class="mb-3">
            <label for="observaciones" class="form-label">Observaciones</label>
            <input name="observaciones" type="text" class="form-control" id="observaciones" placeholder="Observaciones" value="{{ old('observaciones', $tiposdocumentos->observaciones) }}">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('tiposdocumentos.index') }}" class="btn btn-secondary"> Cancelar </a>
    </form>
</div>
@endsection