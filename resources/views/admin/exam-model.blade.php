
<x-admin-template title="{{ $title }}"> 
    <div class="row">
        <div class="col d-xl-flex justify-content-between">
            <div>
                <p class="mb-1"><strong>Daftar Sesi Ujian</strong></p>
                <p class="text-secondary">Klik tombol tambah sesi untuk membuat sesi ujian baru.</p>
            </div>
            <div>
                <a href="{{ route('create-exam-date') }}" class="btn w-100 w-xl-0 bg-success-subtle text-success"><strong>+ Tambah Sesi</strong></a>
            </div>
        </div>
    </div>
    
    <div class="row my-4">
        <div class="col table-responsive" style="box-shadow: rgba(17, 12, 46, 0.10) 0px 0px 6px 0px; border-radius: 18px;">
            <div class="card" style="border: 0;">
                <div class="card-body py-3">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal Mulai</th>
                                <th>Gelombang</th>
                                <th>Penguji</th>
                                <th>Peserta</th>
                                <th>Status</th>
                                <th>Pengaturan</th>
                            </tr>
                        </thead>
                        <tbody style="vertical-align: middle">
                            <tr>
                                <td>1.</td>
                                <td>Selasa, 12 Okt 2025</td>
                                <td>5</td>
                                <td>10</td>
                                <td>0</td>
                                <td>
                                    <div class="d-flex text-center align-items-center justify-content-center">
                                        <span class="spinner-grow text-success spinner-grow-sm me-2" aria-hidden="true"></span>
                                        <span role="status">Aktif</span>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn border-dark"><strong><i class="bi bi-ui-checks-grid text-success"></i></strong></button>
                                    <button class="btn border-dark"><strong><i class="bi bi-gear-fill text-primary"></i></strong></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-template>