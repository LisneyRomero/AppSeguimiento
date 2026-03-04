@extends('app')

@section('title', 'Identificacion')

@section('content')
  
<div class="container mt-5">
    <h1>Crear identificacion</h1>

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

    <form method="POST" action="{{ route('tiposdocumentos.store') }}">
        @csrf

        <div class="mb-3">
            <label for="denominacion" class="form-label">Descripcion</label>
            <input name="denominacion" type="text" class="form-control" id="denominacion" placeholder="tipo de documento" value="{{ old('denominacion') }}">
        </div>

        <div class="mb-3">
            <label for="observaciones" class="form-label">Observaciones</label>
            <input name="observaciones" type="text" class="form-control" id="observaciones" placeholder="Observaciones" value="{{ old('observaciones') }}">
        </div>

        <button type="submit" class="btn btn-primary">Agregar ID</button>
        <a href="{{ route('tiposdocumentos.index') }}" class="btn btn-secondary">Volver a la lista</a>
    </form>
</div>
@endsection
