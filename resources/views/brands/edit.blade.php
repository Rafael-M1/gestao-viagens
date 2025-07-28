<x-layout title="Editar Marca">
    <h2>Editar Marca</h2>

    <form method="POST" action="{{ route('brands.update', $brand) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nome da Marca</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $brand->name) }}" required>
            @error('name')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-success" type="submit">Atualizar</button>
        <a href="{{ route('brands.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</x-layout>
