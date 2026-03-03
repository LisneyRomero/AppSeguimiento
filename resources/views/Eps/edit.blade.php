@extends('app')

@section('title', 'EPS')
    
@section('content')

<div class="container mt-5">
    <h1>Editar EPS</h1>

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
    <form method="POST" action="{{ route('eps.update', $eps) }}">
        @csrf
        @method('PUT') 

        <div class="mb-3">
            <label for="numDocumento" class="form-label">NIT</label>
            <input name="numDocumento" type="number" class="form-control" id="numDocumento" placeholder="NIT" value="{{ old('numDocumento', $eps->numDocumento) }}">
        </div>

        <div class="mb-3">
            <label for="denominacion" class="form-label">nombre de eps</label>
            <input name="denominacion" type="text" class="form-control" id="denominacion" placeholder="nombre de eps" value="{{ old('denominacion', $eps->denominacion) }}">
        </div>

        <div class="mb-3">
            <label for="observaciones" class="form-label">Observaciones</label>
            <input name="observaciones" type="text" class="form-control" id="observaciones" placeholder="Observaciones" value="{{ old('observaciones', $eps->observaciones) }}">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('eps.index') }}" class="btn btn-secondary"> Cancelar </a>
    </form>
</div>
@endsection