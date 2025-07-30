<x-app-layout title="Adicionar Marca">
    <h2 class="text-2xl font-semibold mb-6">Adicionar Marca</h2>

    <form method="POST" action="{{ route('brands.store') }}" class="space-y-6 max-w-md">
        @csrf

        <div>
            <label for="name" class="block text-gray-700 font-medium mb-2">Nome da Marca</label>
            <input
                type="text"
                name="name"
                id="name"
                class="w-full rounded border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                value="{{ old('name') }}"
                required
            >
            @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex space-x-4">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                Salvar
            </button>
            <a href="{{ route('brands.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                Cancelar
            </a>
        </div>
    </form>
</x-app-layout>
