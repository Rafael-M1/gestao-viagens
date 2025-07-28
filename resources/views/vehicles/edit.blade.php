<x-layout title="Editar Veículo">
    @include('vehicles.form', ['action' => route('vehicles.update', $vehicle), 'isEdit' => true])
</x-layout>
