<x-layouts.app>
    <x-slot:title>
        Login
    </x-slot>
    <!-- App Capsule -->
    <div id="appCapsule" class="pt-0">

        <div class="login-form mt-1">
            <div class="section">
                <img src="{{ asset('assets/img/login/login1.png') }}" alt="image" class="form-image">
            </div>
            <div class="section mt-1">
                <h1>Selamat Datang</h1>
                <h4>Isi Data Diri</h4>
            </div>
            @session('error')
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Opps...',
                        text: '{{ session('error') }}',
                    })
                </script>
            @endsession
            <div class="section mt-1 mb-5">
                <form action={{ route('proseslogin') }} method="POST">
                    @csrf
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="text" name="npm" class="form-control" id="npm" placeholder="NPM">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-links mt-2">
                        <div><a href="page-forgot-password.html" class="text-muted">Lupa Password?</a></div>
                    </div>

                    <div class="form-button-group">
                        <button type="submit" class="btn btn-success btn-block btn-lg">Login</button>
                    </div>

                </form>
            </div>
        </div>


    </div>
    <!-- * App Capsule -->
</x-layouts.app>
