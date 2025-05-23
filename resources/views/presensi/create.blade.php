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
    @push('myscripts')
    <script> 
        Webcam.set({
            width: 320,
            height: 240,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
        Webcam.attach('.webcam-capture');

        function take_snapshot() {
            Webcam.snap(function (data_uri) {
                document.getElementById('my_camera').innerHTML = '<img src="' + data_uri + '"/>';
            });
        } 

    </script>
    <!-- * App Capsule -->

    <!-- App Bottom Menu -->
    <div class="appBottomMenu">
        <a href="#" class="item">
            <div class="col">
                <ion-icon name="file-tray-full-outline" role="img" class="md hydrated"
                    aria-label="file tray full outline"></ion-icon>
                <strong>Today</strong>
            </div>
        </a>
        <a href="#" class="item">
            <div class="col">
                <ion-icon name="calendar-outline" role="img" class="md hydrated"
                    aria-label="calendar outline"></ion-icon>
                <strong>Calendar</strong>
            </div>
        </a>
        <a href="#" class="item">
            <div class="col">
                <div class="action-button large">
                    <ion-icon name="camera" role="img" class="md hydrated" aria-label="add outline"></ion-icon>
                </div>
            </div>
        </a>
        <a href="#" class="item">
            <div class="col">
                <ion-icon name="document-text-outline" role="img" class="md hydrated"
                    aria-label="document text outline"></ion-icon>
                <strong>Docs</strong>
            </div>
        </a>
        <a href="javascript:;" class="item">
            <div class="col">
                <ion-icon name="people-outline" role="img" class="md hydrated"
                    aria-label="people outline"></ion-icon>
                <strong>Profile</strong>
            </div>
        </a>
    </div>

    <x-layouts.footer />
</x-layouts.app>
