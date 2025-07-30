<x-app-layout title="Editar Modelo">
    <form method="POST" action="{{ route('vehicle-models.update', $vehicleModel) }}" class="space-y-6 max-w-md">
        @csrf
        @method('PUT')

        <div>
            <label for="brand_id" class="block text-gray-700 font-medium mb-2">Marca</label>
            <select
                name="brand_id"
                id="brand_id"
                class="w-full rounded border border-gray-300 px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                required
            >
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}" @selected($brand->id == $vehicleModel->brand_id)>
                        {{ $brand->name }}
                    </option>
                @endforeach
            </select>
            @error('brand_id')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="name" class="block text-gray-700 font-medium mb-2">Nome do Modelo</label>
            <input
                type="text"
                name="name"
                id="name"
                value="{{ old('name', $vehicleModel->name) }}"
                class="w-full rounded border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required
            >
            @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex space-x-4">
            <button
                type="submit"
                class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition"
            >
                Atualizar
            </button>
            <a
                href="{{ route('vehicle-models.index') }}"
                class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition"
            >
                Voltar
            </a>
        </div>
    </form>
</x-app-layout>
