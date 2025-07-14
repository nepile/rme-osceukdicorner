<nav class="navbar navbar-expand-lg navbar-light bg-light px-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard-participant') }}">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" width="150" height="60" style="border: 2px solid black; border-radius: 5px;">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarContent" aria-controls="navbarContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard-participant') ? 'fw-bold text-dark' : '' }}"
                       href="{{ route('dashboard-participant') }}">
                        Beranda
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('profile') ? 'fw-bold text-dark' : '' }}"
                       href="{{ route('profile') }}">
                        Profil
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('archives') ? 'fw-bold text-dark' : '' }}"
                       href="{{ route('archives') }}">
                        Arsip
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
