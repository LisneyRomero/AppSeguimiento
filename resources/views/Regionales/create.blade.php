@extends('app')

@section('title', 'Registrar Region')

@section('content')

    <div class="container mt-4">
        <div class="table table-bordered table-striped table-hover">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0">Registrar Region</h4>
            </div>

            <div class="card-body">

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

                <form action="{{ route('regionales.store') }}" method="POST">
                    @csrf

                    <div class="row">


                        {{-- CODIGO --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Codigo</label>
                            <input type="number" name="codigo" value="{{ old('codigo') }}"
                                class="form-control @error('codigo') is-invalid @enderror">
                            @error('codigo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Denominacion Departamento --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Departamento</label>
                            <input type="text" name="denominacion" value="{{ old('denominacion') }}"
                                class="form-control @error('denominacion') is-invalid @enderror">
                            @error('denominacion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Observaciones --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Observaciones</label>
                            <input type="text" name="observaciones" value="{{ old('observaciones') }}"
                                class="form-control @error('observaciones') is-invalid @enderror">
                            @error('observaciones')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="text-end mt-3">
                        <a href="{{ route('regionales.index') }}" class="btn btn-secondary">
                            Volver
                        </a>
                        <button type="submit" class="btn btn-success">
                            Guardar Region
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

@endsection
