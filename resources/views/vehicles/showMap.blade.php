<x-app-layout title="Lista de Veículos">
    <h1>Mapa</h1>
    <div id="map" style="height: 500px;"></div>

    @push('styles')
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    @endpush

    @push('scripts')
        <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
        <script>
            const map = L.map('map').setView([-15.567770709052642, -56.0732124789146], 18);

            L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                attribution: 'Tiles © Esri'
            }).addTo(map);
            L.circle([-15.567770709052642, -56.0732124789146], {
                color: 'red',
                radius: 500
            }).addTo(map);
            L.marker([-15.567770709052642, -56.0732124789146]).addTo(map)
                .bindPopup("Marcador");
                // .openPopup();
        </script>
    @endpush
</x-app-layout>
