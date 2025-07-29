<x-layout title="Lista de Veículos">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Veículos</h2>
        <div>
            <a href="{{ route('vehicles.create') }}" class="btn btn-outline-light">➕ Adicionar Veículo</a>
            <a href="{{ route('vehicles.pdf') }}" class="btn btn-outline-light">⬇️ Exportar PDF</a>
        </div>
    </div>

    <table class="table table-dark table-bordered table-hover">
        <thead>
            <tr>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Ano</th>
                <th>Placa</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vehicles as $vehicle)
                <tr>
                    <td>{{ $vehicle->vehicleModel->brand->name ?? '-' }}</td>
                    <td>{{ $vehicle->vehicleModel->name ?? '-' }}</td>
                    <td>{{ $vehicle->year ?? '-' }}</td>
                    <td>{{ $vehicle->license_plate }}</td>
                    <td>
                        <a href="{{ route('vehicles.edit', $vehicle) }}" class="btn btn-sm btn-warning">Editar</a>

                        <form action="{{ route('vehicles.destroy', $vehicle) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
