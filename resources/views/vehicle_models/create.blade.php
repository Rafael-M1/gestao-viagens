<x-layout title="Adicionar Modelo">
    <form method="POST" action="{{ route('vehicle-models.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Marca</label>
            <select name="brand_id" class="form-select" required>
                <option value="">Selecione</option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Nome do Modelo</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <button class="btn btn-success">Salvar</button>
        <a href="{{ route('vehicle-models.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</x-layout>
