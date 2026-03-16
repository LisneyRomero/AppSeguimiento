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

                <form action="{{ route('enteconformadores.update', $centrodeformacion->NIS) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">

                        {{-- Nis --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">NIS</label>
                            <input type="number" class="form-control"
                                   value="{{ $centrodeformacion->NIS }}" disabled>
                        </div>

                        {{-- Regional --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Regional</label>
                            <select name="tbl_regionales_NIS"
                                    class="form-select @error('tbl_regionales_NIS') is-invalid @enderror">
                                @foreach($regionales as $regional)
                                    <option value="{{ $regional->NIS }}"
                                        {{ old('tbl_regionales_NIS', $centrodeformacion->tbl_regionales_NIS) == $regional->NIS ? 'selected' : '' }}>
                                        {{ $regional->denominacion }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tbl_regionales_NIS')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Codigo--}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Código</label>
                            <input type="number" name="codigo"
                                   value="{{ old('codigo', $centrodeformacion->codigo) }}"
                                   class="form-control @error('codigo') is-invalid @enderror">
                            @error('codigo')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Denominación --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Denominación</label>
                            <input type="text" name="denominacion"
                                   value="{{ old('denominacion', $centrodeformacion->denominacion) }}"
                                   class="form-control @error('denominacion') is-invalid @enderror">
                            @error('denominacion')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Dirección --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Dirección</label>
                            <input type="text" name="direccion"
                                   value="{{ old('direccion', $centrodeformacion->direccion) }}"
                                   class="form-control">
                        </div>


                        {{-- Observaciones --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Observaciones</label>
                            <input type="text" name="observaciones"
                                   value="{{ old('observaciones', $centrodeformacion->observaciones) }}"
                                   class="form-control">
                        </div>

                    </div>

                    <div class="text-end mt-3">
                        <a href="{{ route('enteconformadores.index') }}" class="btn btn-secondary">
                            Cancelar
                        </a>
                        <button type="submit" class="btn btn-warning">
                            Actualizar Centro de Formación
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>


@endsection
