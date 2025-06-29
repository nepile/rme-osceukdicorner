<div class="header bg-light d-flex p-3 justify-content-between align-items-center">
  <button class="btn btn-outline-secondary sidebar-toggle" id="sidebarToggle">☰</button>
  <h1 class="fs-5 fw-bold mb-0">{{ $title }}</h1>
  <div class="dropdown-center">
    <span class="d-none d-lg-inline">{{ session('user.email') }}</span>
    <button class="btn btn-secondary bg-primary-subtle" type="button" data-bs-toggle="dropdown" style="height: 45px; width: 45px; padding: 10px; border-radius: 100%; border: 0;" aria-expanded="false">
      <h5 class="mb-0 text-primary"><strong>{{ Str::substr(session('user.name'), 0, 1) }}</strong></h5>
    </button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item btn text-danger" data-bs-toggle="modal" data-bs-target="#logout">Keluar</a></li>
    </ul>
  </div>
</div>

<x-modal id="logout" title="Perhatian" size="modal-md">
  <x-slot:footer>
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
    <form action="{{ route('handle-logout') }}" method="POST">
      @csrf
      <button type="submit" class="btn btn-danger">Ya</button>
    </form>
  </x-slot:footer>

  <p>
    Anda yakin untuk keluar?
  </p>
</x-modal>