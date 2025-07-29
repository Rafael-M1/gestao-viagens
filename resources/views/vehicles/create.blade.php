<x-layout title="Adicionar Veículo">
    <form action="{{ route('vehicles.store') }}" method="POST" class="card card-body bg-black text-light border-light">
        @csrf

        <div class="mb-3">
            <label for="vehicle_model_id" class="form-label">Modelo</label>
            <select name="vehicle_model_id" id="vehicle_model_id" class="form-select" required>
                @foreach ($vehicleModels as $model)
                    <option value="{{ $model->id }}" @selected(old('vehicle_model_id') == $model->id)>
                        Marca: {{ $model->brand->name }} - Modelo: {{ $model->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="license_plate" class="form-label">Placa</label>
            <input type="text" name="license_plate" id="license_plate" class="form-control"
                value="{{ old('license_plate') }}" required>
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Ano</label>
            <input type="number" name="year" id="year" class="form-control"
                value="{{ old('year') }}" required>
        </div>

        <div class="d-flex">
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="{{ route('vehicles.index') }}" class="btn btn-secondary ms-2">Cancelar</a>
        </div>
    </form>
</x-layout>
