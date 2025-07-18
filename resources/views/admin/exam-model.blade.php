
<x-admin-template title="{{ $title }}">
    <x-alert />
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
                            @foreach ($examSessions as $session)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ date('D, d M Y', strtotime($session->examDate->date)) }}</td>
                                <td>{{ $session->waveSessions->count() }}</td>
                                <td>{{ $session->testers->count() }}</td>
                                <td>0</td>
                                <td>
                                    <div class="d-flex text-center align-items-center justify-content-center">
                                        <span class="spinner-grow @if($session->status == 'NONAKTIF') text-danger @elseif($session->status == 'MENUNGGU') text-warning @else text-success @endif spinner-grow-sm me-2" aria-hidden="true"></span>
                                        <span role="status">{{ $session->status }}</span>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('examination-management', $session->session_id) }}" class="btn bg-primary-subtle"><strong class="text-primary"><i class="bi bi-ui-checks-grid text-primary"></i> SOAL</strong></a>
                                    <button class="btn bg-secondary-subtle"><strong class="text-dark"><i class="bi bi-gear-fill text-dark"></i> EDIT</strong></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-template>