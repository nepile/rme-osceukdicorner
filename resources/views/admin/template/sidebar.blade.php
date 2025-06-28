<div class="sidebar" id="sidebar" style="overflow-y: auto">
    <a href="{{ route('dashboard-admin') }}" class="text-center logo mb-4 mt-2"> 
        <div><img src="{{ asset('img/logo.png') }}" class="rounded border-navy" width="150" alt="rme-osceukdicorner-logo"></div> 
    </a>
    <hr>
    <ul class="nav flex-column px-3">
        <li class="nav-item ">
            <a class="nav-link {{ request()->routeIs('dashboard-admin') ? 'active' : '' }}" href="{{ route('dashboard-admin') }}">Beranda</a>
        </li>
        
        <hr>

        <li class="nav-item ">
            <a class="nav-link " href="#">Model Ujian</a>
        </li>

        <li class="nav-item ">
            <a class="nav-link " href="#">Hasil Ujian</a>
        </li>
        
        <hr>

        <li class="nav-item ">
            <a class="nav-link " href="#">Daftar Penguji</a>
        </li>
    </ul>
</div>

<div class="overlay" id="overlay"></div>