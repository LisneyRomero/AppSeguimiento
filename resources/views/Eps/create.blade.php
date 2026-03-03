@extends('app')

@section('title', 'EPS')

@section('content')
  
<div class="container mt-5">
    <h1>Crear eps</h1>

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

    <form method="POST" action="{{ route('eps.store') }}">
        @csrf

        <div class="mb-3">
            <label for="numDocumento" class="form-label">Num.Documento</label>
            <input name="numDocumento" type="number" class="form-control" id="numDocumento" placeholder="Num Documento" value="{{ old('numDocumento') }}">
        </div>

        <div class="mb-3">
            <label for="denominacion" class="form-label">Nombre EPS</label>
            <input name="denominacion" type="text" class="form-control" id="denominacion" placeholder="Nombre de eps" value="{{ old('denominacion') }}">
        </div>

        <div class="mb-3">
            <label for="observaciones" class="form-label">Observaciones</label>
            <input name="observaciones" type="text" class="form-control" id="observaciones" placeholder="Observaciones" value="{{ old('observaciones') }}">
        </div>

        <button type="submit" class="btn btn-primary">Agregar EPS</button>
        <a href="{{ route('eps.index') }}" class="btn btn-secondary">Volver a la lista</a>
    </form>
</div>
@endsection

