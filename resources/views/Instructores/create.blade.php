@extends('app')

@section('title', 'Registrar Instructor')

@section('content')

    <div class="container mt-4">
        <div class="table table-bordered table-striped table-hover">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0">Registrar Instructor</h4>
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

                <form action="{{ route('instructores.store') }}" method="POST">
                    @csrf

                    <div class="row">

                        {{-- Tipo Documento --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tipo de Documento</label>
                            <select name="tbl_tiposdocumentos_NIS"
                                    class="form-select @error('tbl_tiposdocumentos_NIS') is-invalid @enderror">
                                <option value="" disabled selected>Seleccione...</option>
                                @foreach($tiposdocumentos as $tipodoc)
                                    <option value="{{ $tipodoc->NIS }}"
                                        {{ old('tbl_tiposdocumentos_NIS') == $tipodoc->NIS ? 'selected' : '' }}>
                                        {{ $tipodoc->denominacion }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tbl_tiposdocumentos_NIS')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Número Documento --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Número de Documento</label>
                            <input type="number" name="numDocumento"
                                   value="{{ old('numDocumento') }}"
                                   class="form-control @error('numDocumento') is-invalid @enderror">
                            @error('numDocumento')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Nombres --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nombres</label>
                            <input type="text" name="nombres"
                                   value="{{ old('nombres') }}"
                                   class="form-control @error('nombres') is-invalid @enderror">
                            @error('nombres')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Apellidos --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Apellidos</label>
                            <input type="text" name="apellidos"
                                   value="{{ old('apellidos') }}"
                                   class="form-control @error('apellidos') is-invalid @enderror">
                            @error('apellidos')
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

                        {{-- Correo Institucional --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Correo Institucional</label>
                            <input type="email" name="correoInstitucional"
                                   value="{{ old('correoInstitucional') }}"
                                   class="form-control">
                        </div>

                        {{-- Correo Personal --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Correo Personal</label>
                            <input type="email" name="correoPersonal"
                                   value="{{ old('correoPersonal') }}"
                                   class="form-control">
                        </div>

                        {{-- Sexo --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Sexo</label>
                            <select name="sexo"
                                    class="form-select @error('sexo') is-invalid @enderror">
                                <option value="" disabled selected>Seleccione...</option>
                                <option value="1" {{ old('sexo') == 1 ? 'selected' : '' }}>Femenino</option>
                                <option value="2" {{ old('sexo') == 2 ? 'selected' : '' }}>Masculino</option>
                            </select>
                            @error('sexo')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Fecha Nacimiento --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Fecha de Nacimiento</label>
                            <input type="date" name="fechaNacimiento"
                                   value="{{ old('fechaNacimiento') }}"
                                   class="form-control">
                        </div>

                        {{-- EPS --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">EPS</label>
                            <select name="tbl_eps_NIS"
                                    class="form-select @error('tbl_eps_NIS') is-invalid @enderror">
                                <option value="" disabled selected>Seleccione...</option>
                                @foreach($eps as $Eps)
                                    <option value="{{ $Eps->NIS }}"
                                        {{ old('tbl_eps_NIS') == $Eps->NIS ? 'selected' : '' }}>
                                        {{ $Eps->denominacion }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tbl_eps_NIS')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- ROL --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Rol Administrativo</label>
                            <select name="tbl_roladministrativo_NIS"
                                    class="form-select @error('tbl_roladministrativo_NIS') is-invalid @enderror">
                                <option value="" disabled selected>Seleccione...</option>
                                @foreach($roladministrativo as $Rol)
                                    <option value="{{ $Rol->NIS }}"
                                        {{ old('tbl_roladministrativo_NIS') == $Rol->NIS ? 'selected' : '' }}>
                                        {{ $Rol->descripcion }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tbl_roladministrativo_NIS')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="text-end mt-3">
                        <a href="{{ route('instructores.index') }}" class="btn btn-secondary">
                            Volver
                        </a>
                        <button type="submit" class="btn btn-success">
                            Guardar Instructor
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

@endsection
