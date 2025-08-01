<x-app-layout title="Mapa de Unidades">
    <h1>Mapa de Unidades</h1>
    <div class="relative" style="height: 700px;">
        <div id="map" class="w-full h-full"></div>
        <form method="POST" action="{{ route('units.store' ) }}" id="coord-form"
              class="hidden absolute bottom-4 right-4 bg-white border border-gray-300 rounded-lg shadow-md p-4 w-72 z-[1000]">
            @csrf
            <div class="flex justify-between items-center mb-2">
                <h2 class="text-lg font-semibold">Nova Unidade</h2>
                <button type="button" onclick="closeCard()"
                        class="text-gray-500 hover:text-red-600 font-bold text-xl leading-none">&times;</button>
            </div>
            <input type="text" name="name" required
                   class="w-full border border-gray-300 rounded px-2 py-1 mb-3 focus:outline-none focus:ring focus:border-blue-300">

            <input type="hidden" name="latitude" id="latitude">
            <input type="hidden" name="longitude" id="longitude">

            <p id="coord-text" class="text-sm text-gray-700 mb-3">Clique no mapa...</p>

            <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
                Salvar Unidade
            </button>
        </form>
    </div>

    @push('styles')
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    @endpush

    @push('scripts')
        <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
        <script>
            const csrfToken = @json(csrf_token());
            // Constantes
            function createIcon(color) {
                return L.icon({
                    iconUrl: `https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-${color}.png`,
                    shadowUrl: 'https://unpkg.com/leaflet@1.9.3/dist/images/marker-shadow.png',
                    iconSize: [25, 41],
                    iconAnchor: [12, 41],
                    tooltipAnchor: [0, -45],
                    shadowSize: [41, 41]
                });
            }

            const redIcon = createIcon('red');
            const greenIcon = createIcon('green');
            const lat = -15.56762;
            const long = -56.0728;
            const coordinates = [lat, long];
            const map = L.map('map');
            const units = @json($units);
            const markers = [];
            // Constantes

            L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}')
                .addTo(map);

            units.forEach(unit => {
                const marker = L.marker([unit.latitude, unit.longitude], { icon: redIcon })
                    .addTo(map)
                    .bindTooltip(unit.name, { permanent: false, direction: "top" })
                    .bindPopup(`
                        <div>
                            <strong>${unit.name}</strong><br>
                            Latitude: ${unit.latitude}<br>
                            Longitude: ${unit.longitude}<br>
                            <form method="POST" action="/units/${unit.id}" onsubmit="return confirm('Deseja excluir esta unidade?');" class="mt-2">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="text-red-600 hover:underline flex items-center gap-1">
                                    🗑️ <span>Excluir</span>
                                </button>
                            </form>
                        </div>
                    `);

                const circle = L.circle([unit.latitude, unit.longitude], {
                    color: 'red',
                    radius: 50
                }).addTo(map);
                markers.push(marker);
            });

            centerMapByMarkers(map, markers);

            // Card de coordenadas atuais
            const coordDiv = L.control({ position: 'bottomleft' });

            coordDiv.onAdd = function (map) {
                this._div = L.DomUtil.create('div', 'mouse-coordinates');
                this._div.style.background = 'rgba(255,255,255,0.8)';
                this._div.style.padding = '4px';
                this._div.style.borderRadius = '4px';
                this._div.style.fontSize = '14px';
                this.update();
                return this._div;
            };

            coordDiv.update = function (latlng) {
                this._div.innerHTML = latlng
                    ? `Lat: ${latlng.lat.toFixed(5)}, Lng: ${latlng.lng.toFixed(5)}`
                    : 'Passe o mouse sobre o mapa';
            };

            coordDiv.addTo(map);
            map.on('mousemove', e => coordDiv.update(e.latlng));
            // Card de coordenadas atuais

            //Add new coordinate
            let lastClickedCoordinates = null;
            let lastClickedMarker = null;

            map.on('click', function (e) {
                const { lat, lng } = e.latlng;

                document.getElementById('coord-text').textContent = `Lat: ${lat.toFixed(6)}, Lng: ${lng.toFixed(6)}`;
                document.getElementById('latitude').value = lat.toFixed(6);
                document.getElementById('longitude').value = lng.toFixed(6);

                document.getElementById('coord-form').classList.remove('hidden');

                if (lastClickedMarker) {
                    map.removeLayer(lastClickedMarker);
                }

                lastClickedMarker = L.marker([lat, lng], { icon: greenIcon })
                    .addTo(map)
                    .bindTooltip("Nova coordenada", { direction: "top" });
            });

            function closeCard() {
                const card = document.getElementById('coord-form');
                card.classList.add('hidden');
            }

            //Functions
            function centerMapByMarkers(map, markers) {
                if (markers.length) {
                    const group = L.featureGroup(markers);
                    map.fitBounds(group.getBounds(), { padding: [30, 30] });
                } else {
                    map.locate({ setView: true, maxZoom: 18 });
                }
            }
        </script>
    @endpush
</x-app-layout>
