<x-layouts.app>
    <x-slot:title>
        Presensi
    </x-slot>

    <x-layouts.header />

    <style>
       .webcam-capture {
            padding: 24px;
            /* background: #fff; */
            border-radius: 15px;
            /* box-shadow: 0 2px 16px rgb(239, 238, 238); */
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            max-width: 352px; /* Lebar maksimal agar tidak melewati batas layar */
            margin: 32px auto 0 auto;
            box-sizing: border-box;
        }
        .webcam-capture video,
        #my_camera video {
            display: block;
            width: 100%;
            height: auto;
            border-radius: 15px;
            border: 4px solid #007bff;
            /* box-shadow: 0 2px 16px rgb(242, 242, 242); */
            /* background: #fff; */
            box-sizing: border-box; 
        }
        #appCapsule {
            padding-bottom: 90px;
            padding-left: 90px;
        }
        #map {
            width: 100%;
            max-width: 352px;
            height: 300px;
            margin-top: 16px;
            border-radius: 12px;
            border: 4px solid #007bff; /* Border biru */
            box-shadow: 0 2px 16px rgb(239, 238, 238); /* Bayangan */
            background: #fff;
            box-sizing: border-box;
        }
    </style>
     <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
     <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
     <div class="w-full bg-red-500 py-10">
       <div class="row webcam-row-padding" >
        <div class="col d-flex justify-content-center align-items-center flex-column">
            <input type="hidden" id="lokasi" class="mb-3" readonly style="max-width:320px;">
            <div class="webcam-capture" >
                <div id="my_camera" style="width:100%; max-width:352px;"></div>
            </div>
            <div class="row">
        <div class="col text-center">
            <button id="absen" class="btn btn-primary btn-block mt-4" style="max-width:320px;">
                <ion-icon name="camera-outline"></ion-icon>    
                Absen Masuk
            </button>
        </div>
    </div> 
            <div id="map"></div>
        </div>
    </div>

    
     </div>
    
    
    <input type="text" id="lokasi" class="mb-3" readonly style="max-width:320px; display:block; margin:16px auto;">

    <div id="appCapsule">
        <!-- Konten lain di bawah kamera -->
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>
    <script>
        Webcam.set({
            width: 400,
            height: 500,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
        Webcam.attach('#my_camera');

        var lokasi = document.getElementById('lokasi');
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(succesCallback, errorCallback, { enableHighAccuracy: true });
        }
        function succesCallback(position) {
            lokasi.value = position.coords.latitude + ',' + position.coords.longitude;
            var map = L.map('map').setView([position.coords.latitude, position.coords.longitude], 20);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
             attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);
            var marker = L.marker([position.coords.latitude, position.coords.longitude]).addTo(map);
            var circle = L.circle([position.coords.latitude, position.coords.longitude], { /* nanti taro titik kordinat kampus yaaa */
    color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5,
    radius: 100
}).addTo(map);

        }
        function errorCallback(error) {
            console.log(error);
        }
        $('#absen').click(function(e){
            alert('Absen Masuk Berhasil');
        });
    </script>   
    <x-layouts.footer />
</x-layouts.app>
