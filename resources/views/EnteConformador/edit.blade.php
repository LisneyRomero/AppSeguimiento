 @extends('app')

@section('title', 'Editar Empresa')

@section('content')

    <div class="container mt-4">
        <div class="table table-bordered table-striped table-hover">
            <div class="card-header bg-warning text-dark">
                <h4 class="mb-0">Editar Empresa</h4>
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

                <form action="{{ route('enteconformadores.update', $enteconformador->NIS) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">

                        {{-- Nis --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">NIS</label>
                            <input type="number" class="form-control"
                                   value="{{ $enteconformador->NIS }}" disabled>
                        </div>

                        {{-- Tipo de Documento --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tipo de Documento</label>
                            <select name="tbl_tiposdocumentos_NIS"
                                    class="form-select @error('tbl_tiposdocumentos_NIS') is-invalid @enderror">
                                @foreach($tiposdocumentos as $tipodocumento)
                                    <option value="{{ $tipodocumento->NIS }}"
                                        {{ old('tbl_tiposdocumentos_NIS', $enteconformador->tbl_tiposdocumentos_NIS) == $tipodocumento->NIS ? 'selected' : '' }}>
                                        {{ $tipodocumento->denominacion }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tbl_tiposdocumentos_NIS')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Numero de Documento --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Número de Documento</label>
                            <input type="number" name="numDocumento"
                                   value="{{ old('numDocumento', $enteconformador->numDocumento) }}"
                                   class="form-control @error('numDocumento') is-invalid @enderror">
                            @error('numDocumento')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Razon social --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Razon Social</label>
                            <input type="text" name="razonSocial"
                                   value="{{ old('razonSocial', $enteconformador->razonSocial) }}"
                                   class="form-control @error('razonSocial') is-invalid @enderror">
                            @error('razonSocial')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Dirección --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Dirección</label>
                            <input type="text" name="direccion"
                                   value="{{ old('direccion', $enteconformador->direccion) }}"
                                   class="form-control">
                        </div>


                        {{-- Telefono --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Teléfono</label>
                            <input type="number" name="telefono"
                                   value="{{ old('telefono', $enteconformador->telefono) }}"
                                   class="form-control">
                        </div>

                        {{-- Correo Institucional --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Correo Institucional</label>
                            <input type="email" name="correoInstitucional"
                                   value="{{ old('correoInstitucional', $enteconformador->correoInstitucional) }}"
                                   class="form-control">
                        </div>

                    </div>

                    <div class="text-end mt-3">
                        <a href="{{ route('enteconformadores.index') }}" class="btn btn-secondary">
                            Cancelar
                        </a>
                        <button type="submit" class="btn btn-warning">
                            Actualizar Empresa
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>


@endsection
