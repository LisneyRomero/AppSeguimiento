@extends('app')

@section('title', 'Roles')
    
@section('content')

<div class="container mt-5">
    <h1>Editar Rol</h1>

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
    <form method="POST" action="{{ route('rolesadministrativos.update', $rol) }}">
        @csrf
        @method('PUT') 

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion</label>
            <input name="descripcion" type="text" class="form-control" id="descripcion" placeholder="descripcion" value="{{ old('descripcion', $rol->descripcion) }}">
        </div>


        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('rolesadministrativos.index') }}" class="btn btn-secondary"> Cancelar </a>
    </form>
</div>
@endsection