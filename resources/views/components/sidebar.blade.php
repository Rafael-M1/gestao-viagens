<nav class="bg-black p-3 border-end border-secondary" style="width: 240px;">
    <h4 class="text-light">
        <a href="{{ route('vehicles.index') }}" class="text-decoration-none text-light">Gestão de Viagens</a>
    </h4>
    <ul class="nav flex-column mt-4">
        <li class="nav-item mb-2">
            <a href="{{ route('vehicles.index') }}" class="nav-link text-light">Veículos</a>
        </li>
        <li class="nav-item mb-2">
            <a href="{{ route('brands.index') }}" class="nav-link text-light">Marcas</a>
        </li>
        <li class="nav-item mb-2">
            <a href="{{ route('vehicle-models.index') }}" class="nav-link text-light">Modelos</a>
        </li>
    </ul>
</nav>
