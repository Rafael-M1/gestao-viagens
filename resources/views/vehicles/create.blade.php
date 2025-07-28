<x-layout title="Novo Veículo">
    @include('vehicles.form', ['action' => route('vehicles.store'), 'isEdit' => false])
</x-layout>
