<x-layouts.app>
    <x-slot:title>
        Presensi
    </x-slot>

    <x-layouts.header />

    <style>
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

        #map {
            width: 100%;
            /* max-width: 352px; */
            height: 300px;
            margin-top: 16px;
            border-radius: 12px;
            border: 4px solid #007bff;
            /* Border biru */
            box-shadow: 0 2px 16px rgb(239, 238, 238);
            /* Bayangan */
            background: #fff;
            box-sizing: border-box;
        }
    </style>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <div class="w-full">
        <div class="webcam-row-padding w-full flex flex-col pt-20 pb-28">
            <div class="col d-flex justify-content-center align-items-center flex-column bgoran">
                <input type="hidden" id="lokasi" class="mb-3" readonly style="max-width:320px;">
                <div>
                    <div id="my_camera"></div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <button id="absen" class="btn btn-primary btn-block mt-4" style="max-width:320px;">
                            <ion-icon name="camera-outline"></ion-icon>
                            Absen Masuk
                        </button>
                    </div>
                </div>
                <div id="map" class="w-full bg-blue-400 max-w-[352px]"></div>
            </div>
        </div>


        <input type="text" id="lokasi" class="" readonly>
    </div>



    <div id="appCapsule" class="">
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
            navigator.geolocation.getCurrentPosition(succesCallback, errorCallback, {
                enableHighAccuracy: true
            });
        }

        function succesCallback(position) {
            lokasi.value = position.coords.latitude + ',' + position.coords.longitude;
            var map = L.map('map').setView([position.coords.latitude, position.coords.longitude], 20);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);
            var marker = L.marker([position.coords.latitude, position.coords.longitude]).addTo(map);
            var circle = L.circle([position.coords.latitude, position.coords.longitude], {
                /* nanti taro titik kordinat kampus yaaa */
                color: 'red',
                fillColor: '#f03',
                fillOpacity: 0.5,
                radius: 100
            }).addTo(map);

        }

        function errorCallback(error) {
            console.log(error);
        }

        $('#absen').click(function(e) {

            Webcam.snap(function(uri) {
                image = uri;
            });

            var lokasi = $("#lokasi").val();
            $.ajax({
                type: 'POST',
                url: '/presensi/store',
                data: {
                    _token: "{{ csrf_token() }}",
                    image: image,
                    lokasi: lokasi
                },
                cache: false,
                success: function(response) {
                    if (response) {
                        Swal.fire({
                            title: 'Berhasil Absen',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/dashboard';
                            }
                        });
                    } else {
                        Swal.fire({
                            title: 'Gagal Absen',
                            text: response.message,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }

                }
            });
        });
    </script>
    <x-layouts.footer />
</x-layouts.app>
