<x-admin-template title="Beranda">
    <div class="container mt-4">
        <h4 class="fw-bold mb-4">Ringkasan Ujian</h4>

        <div class="row g-4 mb-4">
            <div class="col-md-3">
                <div class="card text-white bg-primary shadow-sm">
                    <div class="card-body">
                        <h6 class="card-title">Total Gelombang</h6>
                        <h3>5</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-info shadow-sm">
                    <div class="card-body">
                        <h6 class="card-title">Total Penguji</h6>
                        <h3>10</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-success shadow-sm">
                    <div class="card-body">
                        <h6 class="card-title">Total Peserta</h6>
                        <h3>120</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-warning shadow-sm">
                    <div class="card-body">
                        <h6 class="card-title">Ujian Belum Dinilai</h6>
                        <h3>22</h3>
                    </div>
                </div>
            </div>
        </div>

        <h5 class="fw-bold mb-3">Gelombang Terbaru</h5>
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Tanggal Mulai</th>
                    <th>Gelombang</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>2025-07-10</td>
                    <td>Gelombang 1</td>
                    <td><span class="badge bg-success">Selesai</span></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>2025-07-12</td>
                    <td>Gelombang 2</td>
                    <td><span class="badge bg-warning">Proses</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</x-admin-template>
