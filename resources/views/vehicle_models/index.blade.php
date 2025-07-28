<x-layout title="Modelos de Veículos">
    <a href="{{ route('vehicle-models.create') }}" class="btn btn-primary mb-3">Adicionar Modelo</a>

    <table class="table table-bordered table-hover table-dark">
        <thead>
            <tr>
                <th>Marca</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($models as $model)
                <tr>
                    <td>{{ $model->brand->name }}</td>
                    <td>{{ $model->name }}</td>
                    <td>
                        <a href="{{ route('vehicle-models.edit', $model) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('vehicle-models.destroy', $model) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Confirmar exclusão?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
