<form method="POST" action="{{ $action }}" class="mb-4">
    @csrf
    @if ($isEdit)
        @method('PUT')
    @endif

    <div class="mb-3">
        <label class="form-label">Marca</label>
        <input type="text" name="brand" class="form-control" value="{{ old('brand', $vehicle->brand ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Modelo</label>
        <input type="text" name="model" class="form-control" value="{{ old('model', $vehicle->model ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Ano</label>
        <input type="number" name="year" class="form-control" value="{{ old('year', $vehicle->year ?? '') }}" required>
    </div>

    <button type="submit" class="btn btn-success">
        {{ $isEdit ? 'Atualizar' : 'Salvar' }}
    </button>
</form>
