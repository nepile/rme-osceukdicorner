<x-header title="{{ $title }}" />
<x-content>
    <div class="container-fluid">
        <div class="row vh-100 justify-content-center align-items-center bg-light">
            <div class="col-xl-7 d-flex justify-content-center   p-0 rounded" style="height: 420px;">
                <div class="col-xl-5 d-xl-inline-block d-none">
                    <img src="{{ asset('img/osceukdicorner-login-img.jpg') }}" class="start-corner object-fit-cover h-100 w-100" alt="osceukdicorner-login-img">
                </div>
                <div class="col-xl-7 col-lg-10 col-md-8 bg-white end-corner p-4">
                    <div>
                        <h1 class="fs-5"><strong>RME - OSCEUKDICORNER</strong></h1>
                        <p class="text-secondary">Silakan masuk untuk mendapatkan akses penuh.</p>
                        <hr>
                    </div>

                    <x-alert />

                    <form action="{{ route('handle-login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <input type="email" required class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="contoh@gmail.com">
                        </div>
                        <div class="mb-4">
                            <label for="password">Password <span class="text-danger">*</span></label>
                            <input type="password" required class="form-control" name="password" id="password" placeholder="Masukkan password anda">
                        </div>
                        <div class="text-end">
                            <button class="btn btn-secondary w-100"><strong>MASUK</strong></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-content>
<x-footer />