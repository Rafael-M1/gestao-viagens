<x-app-layout title="Modelos de Veículos">
    <div class="mb-4">
        <a href="{{ route('vehicle-models.create') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            Adicionar Modelo
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300 text-left text-sm text-gray-700">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border border-gray-300">Marca</th>
                    <th class="px-4 py-2 border border-gray-300">Nome</th>
                    <th class="px-4 py-2 border border-gray-300">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($models as $model)
                    <tr class="border border-gray-300 even:bg-gray-50">
                        <td class="px-4 py-2 border border-gray-300">{{ $model->brand->name }}</td>
                        <td class="px-4 py-2 border border-gray-300">{{ $model->name }}</td>
                        <td class="px-4 py-2 border border-gray-300 space-x-2">
                            <a href="{{ route('vehicle-models.edit', $model) }}" class="inline-block bg-yellow-400 text-black px-3 py-1 rounded hover:bg-yellow-500 transition text-sm">
                                Editar
                            </a>

                            <form action="{{ route('vehicle-models.destroy', $model) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    onclick="return confirm('Confirmar exclusão?')"
                                    class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition text-sm"
                                >
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
