@extends('app')

@section('title', 'Editar Instructor')

@section('content')
 
 
 <div class="container mt-4">
        <div class="table table-bordered table-striped table-hover">
            <div class="card-header bg-warning text-dark">
                <h4 class="mb-0">Editar Instructor</h4>
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

                <form action="{{ route('instructores.update', $instructores->NIS) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">

                        {{-- Nis --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">NIS</label>
                            <input type="number" class="form-control"
                                   value="{{ $instructores->NIS }}" disabled>
                        </div>

                        {{-- Tipo Documento --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tipo de Documento</label>
                            <select name="tbl_tiposdocumentos_NIS"
                                    class="form-select @error('tbl_tiposdocumentos_NIS') is-invalid @enderror">
                                @foreach($tiposdocumentos as $tipodoc)
                                    <option value="{{ $tipodoc->NIS }}"
                                        {{ old('tbl_tiposdocumentos_NIS', $instructores->tbl_tiposdocumentos_NIS) == $tipodoc->NIS ? 'selected' : '' }}>
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
                                   value="{{ old('numDocumento', $instructores->numDocumento) }}"
                                   class="form-control @error('numDocumento') is-invalid @enderror">
                            @error('numDocumento')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Nombres --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nombres</label>
                            <input type="text" name="nombres"
                                   value="{{ old('nombres', $instructores->nombres) }}"
                                   class="form-control @error('nombres') is-invalid @enderror">
                            @error('nombres')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Apellidos --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Apellidos</label>
                            <input type="text" name="apellidos"
                                   value="{{ old('apellidos', $instructores->apellidos) }}"
                                   class="form-control @error('apellidos') is-invalid @enderror">
                            @error('apellidos')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Dirección --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Dirección</label>
                            <input type="text" name="direccion"
                                   value="{{ old('direccion', $instructores->direccion) }}"
                                   class="form-control">
                        </div>

                        {{-- Correo Institucional --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Correo Institucional</label>
                            <input type="email" name="correoInstitucional"
                                   value="{{ old('correoInstitucional', $instructores->correoInstitucional) }}"
                                   class="form-control">
                        </div>

                        {{-- Correo Personal --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Correo Personal</label>
                            <input type="email" name="correoPersonal"
                                   value="{{ old('correoPersonal', $instructores->correoPersonal) }}"
                                   class="form-control">
                        </div>

                        {{-- Sexo --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Sexo</label>
                            <select name="sexo"
                                    class="form-select @error('sexo') is-invalid @enderror">
                                <option value="1" {{ old('sexo', $instructores->sexo) == 1 ? 'selected' : '' }}>Femenino</option>
                                <option value="2" {{ old('sexo', $instructores->sexo) == 2 ? 'selected' : '' }}>Masculino</option>
                            </select>
                            @error('sexo')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Fecha Nacimiento --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Fecha de Nacimiento</label>
                            <input type="date" name="fechaNacimiento"
                                   value="{{ old('fechaNacimiento', $instructores->fechaNacimiento) }}"
                                   class="form-control">
                        </div>

                        {{-- EPS --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">EPS</label>
                            <select name="tbl_eps_NIS"
                                    class="form-select @error('tbl_eps_NIS') is-invalid @enderror">
                                @foreach($eps as $Eps)
                                    <option value="{{ $Eps->NIS }}"
                                        {{ old('tbl_eps_NIS', $instructores->tbl_eps_NIS) == $Eps->NIS ? 'selected' : '' }}>
                                        {{ $Eps->denominacion }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tbl_eps_NIS')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Rol Administrativo --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Rol Administrativo</label>
                            <select name="tbl_roladministrativo_NIS"
                                    class="form-select @error('tbl_roladministrativo_NIS') is-invalid @enderror">
                                <option value="" disabled selected>Seleccione...</option>
                                @foreach($roladministrativo as $rol)
                                    <option value="{{ $rol->NIS }}"
                                        {{ old('tbl_roladministrativo_NIS', $instructores->tbl_roladministrativo_NIS) == $rol->NIS ? 'selected' : '' }}>
                                        {{ $rol->descripcion }}
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
                            Cancelar
                        </a>
                        <button type="submit" class="btn btn-warning">
                            Actualizar Instructor
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

@endsection
                                