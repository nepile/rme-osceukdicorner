<x-admin-template title="{{ $title }}">
    <div class="row">
         <div class="col mb-4 d-flex justify-content-between align-items-end">
            <div class="">
                <a href="{{ route('examination-management', $session->session_id) }}" class="btn btn-secodary px-0 mb-4">
                    <i class="bi bi-arrow-left"></i>
                    <span>Kembali</span>
                </a>
                <h4><span class="fw-normal">Penguji:</span> {{ $tester['name'] }}</h4>    
            </div>
            <button class="btn bg-primary-subtle border-primary">
                <span class="text-primary" data-bs-toggle="modal" data-bs-target="#createQuestion"><strong>TAMBAH SOAL</strong></span>
            </button>
            <x-modal id="createQuestion" title="Tambah Soal" size="modal-md">
                <form action="">
                    <div class="">
                        <label for="">Nama Soal</label>
                        <input type="text" class="form-control" placeholder="Masukkan nama soal" name="question_name" id="question_name">
                    </div>

                    <x-slot:footer>
                        <button class="btn btn-primary">SIMPAN</button>
                    </x-slot:footer>
                </form>
            </x-modal>
        </div>
        <hr>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <p><strong>Soal</strong></p>
                        <div class="">
                            <button class="btn fs-5" data-bs-toggle="modal" data-bs-target="#deleteQuestion"><i class="bi bi-trash text-danger"></i></button>
                            <x-modal id="deleteQuestion" title="Perhatian" size="modal-md">
                                <p>
                                    Tindakan ini akan menghapus soal dan sub-sub soalnya.
                                </p>

                                <x-slot:footer>
                                    <form action="">
                                        <button class="btn btn-danger">HAPUS</button>
                                    </form>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">BATAL</button>
                                </x-slot:footer>
                            </x-modal>

                            <button class="btn fs-5" data-bs-toggle="modal" data-bs-target="#createSubQuestion"><i class="bi bi-plus-circle-fill text-secondary"></i></button>
                            <x-modal id="createSubQuestion" title="Tambah Sub Soal" size="modal-md">
                                <form action="">
                                    <div class="">
                                        <label for="subquestion_name">Nama Sub Soal</label>
                                        <input type="text" class="form-control" placeholder="Masukkan nama sub soal" name="subquestion_name" id="subquestion_name">
                                    </div>
                                    
                                    <div class="image-input-container mt-3">
                                        <label for="subquestion_image">Informasi Gambar</label>
                                        <input type="file" class="form-control subquestion-image" name="subquestion_image">
                                    </div>

                                    <div class="mt-3 form-check">
                                        <input type="checkbox" class="form-check-input border-secondary toggle-image-checkbox" id="check-image" checked>
                                        <label class="form-check-label" for="check-image">Berisi informasi gambar</label>
                                    </div>
                                    
                                    <x-slot:footer>
                                        <button class="btn btn-success">TAMBAH</button>
                                    </x-slot:footer>
                                </form>
                            </x-modal>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex flex-wrap" style="gap:25px;">
                        <div class="p-3 bg-secondary-subtle rounded" data-bs-toggle="modal" data-bs-target="#detailSubQuestion" style="cursor: pointer;">
                            <span>Sub soal</span>
                        </div>

                        <x-modal id="detailSubQuestion" title="Detail" size="modal-lg">
                            <form action="">
                                <div class="">
                                    <label for="subquestion_name">Nama Sub Soal</label>
                                    <input type="text" class="form-control" placeholder="Masukkan nama sub soal" name="subquestion_name" id="subquestion_name">
                                </div>
                                    
                                <div class="image-input-container mt-3">
                                    <label for="subquestion_image">Informasi Gambar</label>
                                    <input type="file" class="form-control subquestion-image" name="subquestion_image">
                                </div>

                                <div class="mt-3 form-check">
                                    <input type="checkbox" class="form-check-input border-secondary toggle-image-checkbox" id="check-image" checked>
                                    <label class="form-check-label" for="check-image">Berisi informasi gambar</label>
                                </div>

                                    
                                <x-slot:footer>
                                    <button class="btn btn-danger">HAPUS</button>
                                    <button class="btn btn-primary">PERBARUI</button>
                                </x-slot:footer>
                            </form>
                        </x-modal>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-admin-template>