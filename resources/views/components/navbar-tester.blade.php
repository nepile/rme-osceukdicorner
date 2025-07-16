<nav class="navbar navbar-expand-lg navbar-light bg-light px-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard-tester') }}">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" width="150" height="60" style="border: 2px solid black; border-radius: 5px;">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarContent" aria-controls="navbarContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
            <ul class="navbar-nav align-items-center">

                {{-- Link Profil berupa Email + Avatar --}}
                <li class="nav-item">
                    <a href="{{ route('profile') }}" class="nav-link d-flex align-items-center px-2 py-1 rounded"
                    style="transition: 0.2s;">
                        {{-- Avatar Bulat: Huruf Pertama Nama --}}
                        <div class="bg-primary-subtle text-primary fw-bold d-flex justify-content-center align-items-center"
                            style="height: 45px; width: 45px; border-radius: 50%; font-size: 18px;">
                            {{ Str::substr(session('user.name'), 0, 1) }}
                        </div>

                        {{-- Email: muncul di layar sedang ke atas --}}
                        <span class="ms-3 d-none d-md-inline text-dark fw-semibold">
                            {{ session('user.email') }}
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
