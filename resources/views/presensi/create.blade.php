<x-layouts.app>
    <x-slot:title>
        Presensi
    </x-slot>

    <x-layouts.header />

    <!-- App Capsule -->
    <div id="appCapsule">
        <style> 
            .webcam-capture {
              
            }
            .webcam-capture video {
                display: inline-block;
                width: 100%; !important;
                height: auto; !important;
                border-radius: 15px;
                margin: auto;
            
               
            }
        </style>
        
        <div class="row webcam-row-padding" style="margin-top: 70px;">
            <div class="col d-flex justify-content-center align-items-center flex-column">
                <input type="text" id="lokasi" class="mb-3" readonly style="max-width:320px;">
                <div class="webcam-capture"></div>
            </div>
        </div>
       
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>
    <script> 
        Webcam.set({
            width: 400,
            height: 500,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
        Webcam.attach('.webcam-capture');

        function take_snapshot() {
            Webcam.snap(function(data_uri) {
                document.getElementById('my_camera').innerHTML = '<img src="' + data_uri + '"/>';
            });
        } 
        var lokasi = document.getElementById('lokasi');
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(succesCallback, errorCallback); 
            };
       function succesCallback(position) {
           lokasi.value = position.coords.latitude + ',' + position.coords.longitude;
        }
        function errorCallback(error) {
            console.log(error);
        }
    </script>
    <!-- * App Capsule -->
    <x-layouts.footer />
</x-layouts.app>
