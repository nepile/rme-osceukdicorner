<x-admin-template title="{{ $title }}">
    @if (request()->routeIs('create-exam-date'))
    <div class="row">
        <div class="col mb-4 d-flex justify-content-between align-items-end">
            <div class="">
                <a href="{{ route('exam-model') }}" class="btn btn-secodary px-0 mb-4">
                    <i class="bi bi-arrow-left"></i>
                    <span>Kembali</span>
                </a>
                <h4>Buat Sesi</h4>
                <span class="text-secondary">Lengkapi form di bawah ini.</span>
            </div>
            {{-- <div class="">
                <select name="" class="form-select" id="">
                    <option value="">Aktif</option>
                    <option value="">Tidak Aktif</option>
                </select>
            </div> --}}
            
            {{-- @if (request()->routeIs('create-exam-session'))
            <button class="btn bg-success-subtle border-success">
                <span class="text-success"><strong>SIMPAN SESI</strong></span>
            </button>
            @endif --}}
        </div>
        <hr>
    </div>

    

    <div class="row my-4">
        <div class="col table-responsive" style="box-shadow: rgba(17, 12, 46, 0.10) 0px 0px 6px 0px; border-radius: 18px;">
            <div class="card" style="border: 0;">
                <div class="card-body py-3">
                    <div class="d-flex justify-content-between align-items-center">    
                        <div class="">    
                            <h5>Tanggal Pelaksanaan</h5>
                            <p class="text-secondary">Tentukan tanggal pelaksanaan ujian</p>
                        </div>
                        <div class="">
                            {{-- <input type="date" class="form-control" name="" id="" value="{{ date('Y-m-d') }}"> --}}
                            <input type="date" class="form-control" required name="" id="">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="text-end">
        <a href="{{ route('create-exam-tester') }}" class="btn bg-primary-subtle text-primary">Selanjutnya</a>
    </div>
    @endif
    
    @if (request()->routeIs('create-exam-tester'))
    <div class="row my-4">
        <div class="col table-responsive" style="box-shadow: rgba(17, 12, 46, 0.10) 0px 0px 6px 0px; border-radius: 18px;">
            <div class="card" style="border: 0;">
                <div class="card-body py-3">
                    <div class="d-flex justify-content-between">    
                        <div class="">    
                            <h5>Penguji</h5>
                            <p class="text-secondary">Pastikan penguji sudah terdaftar terlebih dahulu</p>
                        </div>
                        <div class="">
                            <a href="" class="btn btn-link">
                                <span class="text-primary">+ Tambah Penguji</span>
                            </a>
                        </div>
                    </div>
                    
                    <x-alert />

                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Penguji</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Neville</td>
                                <td>
                                    <button class="btn bg-danger-subtle"><i class="bi bi-trash text-danger"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    
                    <div class="d-flex my-3" style="gap: 10px;">
                        <select name="" class="form-select w-25" id="" required>
                            <option value="">Silakan Pilih Penguji</option>
                        </select>
                        <button class="btn bg-success-subtle">
                            <i class="bi bi-arrow-up-short text-success fs-5 fw-bold"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('create-exam-date') }}" class="btn bg-secondary-subtle">Kembali</a>
        <a href="{{ route('create-exam-session') }}" class="btn bg-primary-subtle text-primary">Selanjutnya</a>
    </div>
    @endif
    
    @if (request()->routeIs('create-exam-session'))
    <div class="row my-4">
        <div class="col table-responsive" style="box-shadow: rgba(17, 12, 46, 0.10) 0px 0px 6px 0px; border-radius: 18px;">
            <div class="card" style="border: 0;">
                <div class="card-body py-3">
                    <div>    
                        <h5>Sesi Gelombang</h5>
                        <p class="text-secondary">Tentukan gelombang ujian</p>
                    </div>

                    <x-alert />
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gelombang</th>
                                <th>Mulai (WIB)</th>
                                <th>Selesai (WIB)</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Gelombang 1</td>
                                <td>08.00</td>
                                <td>12.00</td>
                                <td>
                                    <button class="btn bg-danger-subtle"><i class="bi bi-trash text-danger"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    
                    <div class="d-flex my-3 align-items-end" style="gap: 10px;">
                        <div class="">
                            <label for="">Waktu Mulai</label>    
                            <input type="time" required class="form-control" placeholder="JAM" name="" id="" value="00">
                        </div>
                        <div class="">
                            <label for="">Waktu Selesai</label>    
                            <input type="time" required class="form-control" placeholder="MENIT" name="" id="" value="00">
                        </div>
                        <button class="btn bg-success-subtle">
                            <i class="bi bi-arrow-up-short text-success fs-5 fw-bold"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('create-exam-tester') }}" class="btn bg-secondary-subtle">Kembali</a>
        <a href="#" class="btn bg-primary-subtle text-primary"><strong>SIMPAN & SELESAI</strong></a>
    </div>
    @endif
    
</x-admin-template>

