@extends('app')

@section('title', 'Registrar Empresa')

@section('content')

    <div class="container mt-4">
        <div class="table table-bordered table-striped table-hover">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0">Registrar Centro de Formacion</h4>
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

                <form action="{{ route('centrosdeformacion.store') }}" method="POST">
                    @csrf

                    <div class="row">

                        {{-- Regional --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Regional</label>
                            <select name="tbl_regionales_NIS"
                                    class="form-select @error('tbl_regionales_NIS') is-invalid @enderror">
                                <option value="" disabled selected>Seleccione...</option>
                                @foreach($regionales as $regional)
                                    <option value="{{ $regional->NIS }}"
                                        {{ old('tbl_regionales_NIS') == $regional->NIS ? 'selected' : '' }}>
                                        {{ $regional->denominacion }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tbl_regionales_NIS')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

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

                        {{-- Dirección --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Dirección</label>
                            <input type="text" name="direccion"
                                   value="{{ old('direccion') }}"
                                   class="form-control">
                        </div>

                        {{-- Observaciones --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Observaciones</label>
                            <input type="text" name="observaciones"
                                   value="{{ old('observaciones') }}"
                                   class="form-control">
                        </div>


                    </div>

                    <div class="text-end mt-3">
                        <a href="{{ route('centrosdeformacion.index') }}" class="btn btn-secondary">
                            Volver
                        </a>
                        <button type="submit" class="btn btn-success">
                            Guardar Centro de Formación
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>


@endsection
