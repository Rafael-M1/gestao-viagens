<x-app-layout title="Lista de Marcas">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Marcas</h2>
        <a href="{{ route('brands.create') }}"
           class="inline-flex items-center px-5 py-2.5 text-sm font-semibold text-white bg-blue-600 rounded-lg shadow hover:bg-blue-700 transition">
            + Adicionar Marca
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 px-4 py-2 bg-green-100 text-green-800 border border-green-300 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded shadow">
            <thead>
                <tr class="bg-gray-100 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">
                    <th class="px-6 py-3">Nome</th>
                    <th class="px-6 py-3">Ações</th>
                </tr>
            </thead>
            <tbody class="text-gray-800 divide-y divide-gray-200">
                @foreach ($brands as $brand)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $brand->name }}</td>
                        <td class="px-6 py-4 flex items-center gap-2">
                            <a href="{{ route('brands.edit', $brand) }}"
                            class="inline-flex items-center px-3 py-1.5 bg-yellow-500 text-black rounded-md hover:bg-yellow-600 transition text-sm font-semibold shadow-sm !no-underline">
                                ✏️ Editar
                            </a>
                            <form action="{{ route('brands.destroy', $brand) }}"
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
