@extends('app')

@section('title', 'Registrar Ficha')

@section('content')

    <div class="container mt-4">
        <div class="table table-bordered table-striped table-hover">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0">Registrar Ficha</h4>
            </div>

            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('fichacaracterizacion.store') }}" method="POST">
                    @csrf

                    <div class="row">


                        {{-- Codigo --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Codigo</label>
                            <input type="number" name="codigo"
                                   value="{{ old('codigo') }}"
                                   class="form-control @error('codigo') is-invalid @enderror">
                            @error('codigo')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Programa de formacion --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Programa</label>
                            <select name="tbl_programasdeformacion_NIS"
                                    class="form-select @error('tbl_programasdeformacion_NIS') is-invalid @enderror">
                                <option value="" disabled selected>Seleccione...</option>
                                @foreach($programasdeformacion as $programa)
                                    <option value="{{ $programa->NIS }}"
                                        {{ old('tbl_programasdeformacion_NIS') == $programa->NIS ? 'selected' : '' }}>
                                        {{ $programa->denominacion }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tbl_programasdeformacion_NIS')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        

                        {{-- Denominacion --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Denominacion</label>
                            <input type="text" name="denominacion"
                                   value="{{ old('denominacion') }}"
                                   class="form-control @error('denominacion') is-invalid @enderror">
                            @error('denominacion')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Cupo --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Cupo</label>
                            <input type="number" name="cupo"
                                   value="{{ old('cupo') }}"
                                   class="form-control @error('cupo') is-invalid @enderror">
                            @error('cupo')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Fecha Inicio --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Fecha de Inicio</label>
                            <input type="date" name="fechaInicio"
                                   value="{{ old('fechaInicio') }}"
                                   class="form-control">
                        </div>

                        {{-- Fecha Finalizacion --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Fecha de Finalizacion</label>
                            <input type="date" name="fechaFin"
                                   value="{{ old('fechaFin') }}"
                                   class="form-control">
                        </div>

                        
                        {{-- Centro de formacion --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Centro de Formación</label>
                            <select name="tbl_centrosdeformacion_NIS"
                                    class="form-select @error('tbl_centrosdeformacion_NIS') is-invalid @enderror">
                                <option value="" disabled selected>Seleccione...</option>
                                @foreach($centrosdeformacion as $centro)
                                    <option value="{{ $centro->NIS }}"
                                        {{ old('tbl_centrosdeformacion_NIS') == $centro->NIS ? 'selected' : '' }}>
                                        {{ $centro->denominacion }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tbl_centrosdeformacion_NIS')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Observaciones --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Observaciones</label>
                            <input type="text" name="observaciones"
                                   value="{{ old('observaciones') }}"
                                   class="form-control @error('observaciones') is-invalid @enderror">
                            @error('observaciones')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="text-end mt-3">
                        <a href="{{ route('fichacaracterizacion.index') }}" class="btn btn-secondary">
                            Volver
                        </a>
                        <button type="submit" class="btn btn-success">
                            Guardar Ficha
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

@endsection