<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6 space-y-6">

                <div class="text-gray-900 text-lg">
                    <span class="font-semibold">{{ Auth::user()->name }}</span>, {{ __("You're logged in!") }}
                </div>

                <div>
                    <h2 class="text-xl font-semibold text-gray-800 mb-3">Permissões do usuário:</h2>
                    @if (count(Auth::user()->roles))
                        <ul class="list-disc list-inside text-gray-700 space-y-1">
                            @foreach (Auth::user()->roles as $role)
                                <li class="capitalize">{{ $role->name }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-600">Nenhum papel atribuído.</p>
                    @endif
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
