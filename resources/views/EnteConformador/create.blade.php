@extends('app')

@section('title', 'Registrar Empresa')

@section('content')

    <div class="container mt-4">
        <div class="table table-bordered table-striped table-hover">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0">Registrar Empresa</h4>
            </div>

            <div class="card-body">
{{-- Mostrar errores de validación --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('enteconformadores.store') }}" method="POST">
                    @csrf

                    <div class="row">

                        {{-- Tipo Documento --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tipo Documento</label>
                            <select name="tbl_tiposdocumentos_NIS"
                                    class="form-select @error('tbl_tiposdocumentos_NIS') is-invalid @enderror">
                                <option value="" disabled selected>Seleccione...</option>
                                @foreach($tiposdocumentos as $tipo)
                                    <option value="{{ $tipo->NIS }}"
                                        {{ old('tbl_tiposdocumentos_NIS') == $tipo->NIS ? 'selected' : '' }}>
                                        {{ $tipo->denominacion }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tbl_tiposdocumentos_NIS')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Numero de Documento --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Num.Documento</label>
                            <input type="number" name="numDocumento"
                                   value="{{ old('numDocumento') }}"
                                   class="form-control @error('numDocumento') is-invalid @enderror">
                            @error('numDocumento')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Razon Social  --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Razón Social</label>
                            <input type="text" name="razonSocial"
                                   value="{{ old('razonSocial') }}"
                                   class="form-control @error('razonSocial') is-invalid @enderror">
                            @error('razonSocial')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Dirección --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Dirección</label>
                            <input type="text" name="direccion"
                                   value="{{ old('direccion') }}"
                                   class="form-control">
                        </div>

                        {{-- Telefono --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Telefono</label>
                            <input type="number" name="telefono"
                                   value="{{ old('telefono') }}"
                                   class="form-control">
                        </div>

                        {{-- Correo Institucional --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Correo Institucional</label>
                            <input type="email" name="correoInstitucional"
                                   value="{{ old('correoInstitucional') }}"
                                   class="form-control">
                        </div>


                    </div>

                    <div class="text-end mt-3">
                        <a href="{{ route('enteconformadores.index') }}" class="btn btn-secondary">
                            Volver
                        </a>
                        <button type="submit" class="btn btn-success">
                            Guardar Empresa
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>


@endsection
