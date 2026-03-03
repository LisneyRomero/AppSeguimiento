@extends('app')

@section('title', 'ROL')

@section('content')
  
<div class="container mt-5">
    <h1>Crear rol</h1>

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

    <form method="POST" action="{{ route('rolesadministrativos.store') }}">
        @csrf

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion</label>
            <input name="descripcion" type="text" class="form-control" id="descripcion" placeholder="descripcion" value="{{ old('descripcion') }}">
       

        <button type="submit" class="btn btn-primary">Agregar rol</button>
        <a href="{{ route('rolesadministrativos.index') }}" class="btn btn-secondary">Volver a la lista</a>
    </form>
</div>
@endsection

