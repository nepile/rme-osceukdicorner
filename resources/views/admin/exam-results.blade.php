<x-admin-template title="{{ $title }}">
    <div class="container mt-4">
        <h4 class="fw-bold mb-4">Hasil Ujian</h4>

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-bordered table-hover m-0">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Tanggal Mulai</th>
                            <th>Gelombang</th>
                            <th>Nama Peserta</th>
                            <th>Nilai</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>2025-07-10</td>
                            <td>Gelombang 1</td>
                            <td>Andi Saputra</td>
                            <td>85</td>
                            <td><span class="badge bg-success">Sudah Dinilai</span></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>2025-07-12</td>
                            <td>Gelombang 2</td>
                            <td>Budi Hartono</td>
                            <td>—</td>
                            <td><span class="badge bg-danger">Belum Dinilai</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-template>
