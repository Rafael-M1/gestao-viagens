<x-layout title="Editar Modelo">
    <form method="POST" action="{{ route('vehicle-models.update', $vehicleModel) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Marca</label>
            <select name="brand_id" class="form-select" required>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}" @selected($brand->id == $vehicleModel->brand_id)>
                        {{ $brand->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Nome do Modelo</label>
            <input type="text" name="name" value="{{ $vehicleModel->name }}" class="form-control" required>
        </div>
        <button class="btn btn-success">Atualizar</button>
        <a href="{{ route('vehicle-models.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</x-layout>
