<x-layouts.app>
    <x-slot:title>
        Presensi
    </x-slot>

    <x-layouts.header />

    <!-- App Capsule -->
    <div id="appCapsule">
        <div class="row" style="margin-top: 70px;">
            <div class="col">
                <div class= "webcam-capture"></div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>
    <script language="JavaScript">
        Webcam.set({
            width: 320,
            height: 240,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
        Webcam.attach('.webcam-capture');

        function take_snapshot() {
            Webcam.snap(function(data_uri) {
                document.getElementById('my_camera').innerHTML = '<img src="' + data_uri + '"/>';
            });
        }
    </script>
    <!-- * App Capsule -->
    <x-layouts.footer />
</x-layouts.app>
