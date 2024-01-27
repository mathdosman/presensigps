<style>
    #map {
        height: 500px;
        border-style: solid;
        }
</style>
<div id="map"></div>


    <script>
        var lokasi = "{{$presensi->lokasi_in}}";
        var lok = lokasi.split(",");
        var latitude = lok[0];
        var longitude = lok[1];

        var map = L.map('map').setView([latitude,longitude], 13);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
        var marker = L.marker([latitude,longitude]).addTo(map);
        var circle = L.circle([-8.54263320129492, 115.33350104997552], {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.5,
            radius: 20000
        }).addTo(map);

        var popup = L.popup()
        .setLatLng([latitude,longitude])
        .setContent("{{$presensi->nama_lengkap}}")
        .openOn(map);
    </script>

<div class="text-center">

    <button type="button" class="btn me-auto mt-1 btn-secondary" data-bs-dismiss="modal">Close</button>
</div>
