<x-app-layout title="Editar Veículo">
    <form action="{{ route('vehicles.update', $vehicle) }}" method="POST" class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow-md space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="vehicle_model_id" class="block text-sm font-medium text-gray-700 mb-1">Modelo</label>
            <select name="vehicle_model_id" id="vehicle_model_id" required
                class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm">
                @foreach ($vehicleModels as $model)
                    <option value="{{ $model->id }}"
                        @selected(old('vehicle_model_id', $vehicle->vehicle_model_id) == $model->id)>
                        Marca: {{ $model->brand->name }} - Modelo: {{ $model->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="license_plate" class="block text-sm font-medium text-gray-700 mb-1">Placa</label>
            <input type="text" name="license_plate" id="license_plate"
                value="{{ old('license_plate', $vehicle->license_plate) }}" required
                class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm px-3 py-2">
        </div>

        <div>
            <label for="year" class="block text-sm font-medium text-gray-700 mb-1">Ano</label>
            <input type="number" name="year" id="year"
                value="{{ old('year', $vehicle->year) }}" required
                class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm px-3 py-2">
        </div>

        <div class="flex justify-end space-x-2 pt-4">
            <button type="submit"
                class="px-4 py-2 bg-emerald-600 text-white text-sm font-semibold rounded hover:bg-emerald-700 transition flex items-center gap-2">
                ✅ <span>Atualizar</span>
            </button>
            <a href="{{ route('vehicles.index') }}"
                class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-300 text-sm font-medium">
                ❌ Cancelar
            </a>
        </div>
    </form>
</x-app-layout>
