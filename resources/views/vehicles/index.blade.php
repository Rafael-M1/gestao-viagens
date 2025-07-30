<x-app-layout title="Lista de Veículos">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Veículos</h2>
        <div class="flex flex-wrap gap-2 mt-4">
            <a href="{{ route('vehicles.create') }}"
            class="inline-flex items-center px-5 py-2.5 text-sm font-semibold text-white bg-blue-600 rounded-lg shadow hover:bg-blue-700 transition duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4v16m8-8H4" />
                </svg>
                Adicionar Veículo
            </a>

            <a href="{{ route('vehicles.pdf') }}"
                class="inline-flex items-center px-5 py-2.5 text-sm font-semibold text-white bg-green-600 rounded-lg shadow hover:bg-green-700 transition duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4v16m4-4H8" />
                </svg>
                Exportar PDF
            </a>
        </div>
    </div>

    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-2 text-left font-medium">Marca</th>
                    <th class="px-4 py-2 text-left font-medium">Modelo</th>
                    <th class="px-4 py-2 text-left font-medium">Ano</th>
                    <th class="px-4 py-2 text-left font-medium">Placa</th>
                    <th class="px-4 py-2 text-left font-medium">Ações</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach ($vehicles as $vehicle)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 text-gray-800">{{ $vehicle->vehicleModel->brand->name ?? '-' }}</td>
                        <td class="px-4 py-2 text-gray-800">{{ $vehicle->vehicleModel->name ?? '-' }}</td>
                        <td class="px-4 py-2 text-gray-800">{{ $vehicle->year ?? '-' }}</td>
                        <td class="px-4 py-2 text-gray-800">{{ $vehicle->license_plate }}</td>
                        <td class="px-4 py-2 space-x-2 flex items-center">
                            <a href="{{ route('vehicles.edit', $vehicle) }}"
                            class="inline-flex items-center px-3 py-1.5 bg-yellow-500 text-black rounded-md hover:bg-yellow-600 transition text-sm font-semibold shadow-sm !no-underline">
                                ✏️ Editar
                            </a>
                            <form action="{{ route('vehicles.destroy', $vehicle) }}"
                                method="POST" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="inline-flex items-center px-3 py-1.5 bg-red-500 text-black rounded-md hover:bg-red-600 transition text-sm font-semibold shadow-sm">
                                    🗑️ Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
