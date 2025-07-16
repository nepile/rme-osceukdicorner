<x-admin-template title="{{ $title }}">
    <div class="container mt-4">
        <h4 class="fw-bold mb-4">Daftar Penguji</h4>

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-bordered table-hover m-0">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Gelombang</th>
                            <th>Tanggal Mulai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td>john@example.com</td>
                            <td>Gelombang 1</td>
                            <td>2025-07-10</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Jane Smith</td>
                            <td>jane@example.com</td>
                            <td>Gelombang 2</td>
                            <td>2025-07-12</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-template>
