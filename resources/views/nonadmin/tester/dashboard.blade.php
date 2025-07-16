<x-nonadmin-template title="{{ $title }}">
    <div class="container mt-4">

        <form action="{{ route('handle-logout') }}" method="POST">
            @csrf
            <button class="btn btn-danger">LOGOUT</button>
        </form>

        <br>

        <ul class="nav nav-tabs mb-4" id="tableTabs">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#keseluruhan">Keseluruhan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#belum">Belum Dinilai</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#sudah">Sudah Dinilai</a>
            </li>
        </ul>

        <div class="tab-content">

            <div class="tab-pane fade show active" id="keseluruhan">
                <table class="table table-bordered table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>Nama Mahasiswa</th>
                            <th>Pemeriksaan</th>
                            <th>Diagnosa</th>
                            <th>Terapi</th>
                            <th>Nilai</th>
                            <th>Ulas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Andi</td>
                            <td>✅</td>
                            <td>❌</td>
                            <td>✅</td>
                           <td class="text-danger fw-semibold">Belum Dinilai</td>
                            <td><a href="{{ route('examination') }}" class="btn btn-sm btn-primary">Ulas</a></td>
                        </tr>
                        <tr>
                            <td>Budi</td>
                            <td>✅</td>
                            <td>✅</td>
                            <td>✅</td>
                            <td>85</td>
                            <td><a href="{{ route('examination') }}" class="btn btn-sm btn-primary">Ulas</a></td>
                        </tr>
                         <tr>
                            <td>Citra</td>
                            <td>❌</td>
                            <td>❌</td>
                            <td>❌</td>
                            <td class="text-danger fw-semibold">Belum Dinilai</td>
                            <td><a href="{{ route('examination') }}" class="btn btn-sm btn-primary">Ulas</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="tab-pane fade" id="belum">
                <table class="table table-bordered table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>Nama Mahasiswa</th>
                            <th>Pemeriksaan</th>
                            <th>Diagnosa</th>
                            <th>Terapi</th>
                            <th>Nilai</th>
                            <th>Ulas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Andi</td>
                            <td>✅</td>
                            <td>❌</td>
                            <td>✅</td>
                           <td class="text-danger fw-semibold">Belum Dinilai</td>
                            <td><a href="{{ route('examination') }}" class="btn btn-sm btn-primary">Ulas</a></td>
                        </tr>
                        <tr>
                            <td>Citra</td>
                            <td>❌</td>
                            <td>❌</td>
                            <td>❌</td>
                            <td class="text-danger fw-semibold">Belum Dinilai</td>
                            <td><a href="{{ route('examination') }}" class="btn btn-sm btn-primary">Ulas</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- Tab 3: Sudah Dinilai --}}
            <div class="tab-pane fade" id="sudah">
                <table class="table table-bordered table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>Nama Mahasiswa</th>
                            <th>Pemeriksaan</th>
                            <th>Diagnosa</th>
                            <th>Terapi</th>
                            <th>Nilai</th>
                            <th>Ulas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Budi</td>
                            <td>✅</td>
                            <td>✅</td>
                            <td>✅</td>
                            <td>85</td>
                            <td><a href="{{ route('examination') }}" class="btn btn-sm btn-primary">Ulas</a></td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const hash = window.location.hash;
            if (hash) {
                const tabLink = document.querySelector(`a[href="${hash}"]`);
                if (tabLink) {
                    new bootstrap.Tab(tabLink).show();
                }
            }

            const tabLinks = document.querySelectorAll('#tableTabs a[data-bs-toggle="tab"]');
            tabLinks.forEach(function (tabLink) {
                tabLink.addEventListener('shown.bs.tab', function (e) {
                    const targetId = e.target.getAttribute('href');
                    history.replaceState(null, null, targetId);
                });
            });
        });
    </script>
    
</x-nonadmin-template>
