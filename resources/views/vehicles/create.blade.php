<x-app-layout title="Adicionar Veículo">
    <form action="{{ route('vehicles.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md max-w-xl mx-auto mt-6 space-y-4">
        @csrf

        <div>
            <label for="vehicle_model_id" class="block text-sm font-medium text-gray-700">Modelo</label>
            <select name="vehicle_model_id" id="vehicle_model_id"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                required>
                @foreach ($vehicleModels as $model)
                    <option value="{{ $model->id }}" @selected(old('vehicle_model_id') == $model->id)>
                        Marca: {{ $model->brand->name }} - Modelo: {{ $model->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="license_plate" class="block text-sm font-medium text-gray-700">Placa</label>
            <input type="text" name="license_plate" id="license_plate"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                value="{{ old('license_plate') }}" required>
        </div>

        <div>
            <label for="year" class="block text-sm font-medium text-gray-700">Ano</label>
            <input type="number" name="year" id="year"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                value="{{ old('year') }}" required>
        </div>

        <div class="flex justify-end space-x-2 pt-4">
            <a href="{{ route('vehicles.index') }}"
                class="inline-block px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 text-sm font-medium">
                Cancelar
            </a>
            <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm font-medium">
                Salvar
            </button>
        </div>
    </form>
</x-app-layout>
