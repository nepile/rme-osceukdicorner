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
            <button class="btn bg-success-subtle border-success">
                <span class="text-success" data-bs-toggle="modal" data-bs-target="#createQuestion"><strong>TAMBAH SOAL</strong></span>
            </button>
            <x-modal id="createQuestion" title="Tambah Soal" size="modal-md">
                <form action="{{ route('create-examination-question') }}" method="POST">
                    @csrf
                    <div class="">
                        <label for="question_name">Nama Soal</label>
                        <input type="hidden" required name="tester_id" value="{{ $tester['tester_id'] }}">
                        <input type="text" required class="form-control" placeholder="Masukkan nama soal" name="question_name" id="question_name">
                    </div>

                    <div class="text-end mt-3">
                        <button type="submit" class="btn btn-success">SIMPAN</button>
                    </div>
                </form>
            </x-modal>
        </div>
        <hr>
    </div>

    @foreach ($questions as $question)
    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <p><strong>{{ $question->question_name }}</strong></p>
                        <div>
                            <button class="btn fs-5" data-bs-toggle="modal" data-bs-target="{{ '#deleteQuestion'.$question->question_id }}"><i class="bi bi-trash text-danger"></i></button>
                            <x-modal id="{{ 'deleteQuestion'.$question->question_id }}" title="Perhatian" size="modal-md">
                                <p>
                                    Tindakan ini akan menghapus soal dan sub-sub soalnya.
                                </p>

                                <div class="mt-4 d-flex justify-content-end" style="gap: 10px;">
                                    <form action="{{ route('delete-examination-question', $question->question_id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">HAPUS</button>
                                    </form>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">BATAL</button>
                                </div>
                            </x-modal>

                            <button class="btn fs-5" data-bs-toggle="modal" data-bs-target="{{ '#updateQuestion' . $question->question_id }}"><i class="bi bi-pencil text-primary"></i></button>
                            <x-modal id="{{ 'updateQuestion' . $question->question_id }}" title="Perhatian" size="modal-md">
                                <form action="{{ route('update-examination-question', $question->question_id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="">
                                        <label for="question_name">Nama Soal</label>
                                        <input type="text" required  class="form-control" value="{{ $question->question_name }}" placeholder="Masukkan nama soal" name="question_name" id="question_name">
                                    </div>

                                    <div class="text-end mt-3">
                                        <button type="submit" class="btn btn-primary">PERBARUI</button>
                                    </div>
                                </form>
                            </x-modal>


                            <button class="btn fs-5" data-bs-toggle="modal" data-bs-target="#createSubQuestion"><i class="bi bi-plus-circle-fill text-success"></i></button>
                            <x-modal id="createSubQuestion" title="Tambah Sub Soal" size="modal-md">
                                <form action="{{ route('create-examination-subquestion') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="">
                                        <input type="hidden" name="question_id" value="{{ $question->question_id }}">
                                        <label for="subquestion_name">Nama Sub Soal</label>
                                        <input type="text" class="form-control" required placeholder="Masukkan nama sub soal" name="subquestion_name" id="subquestion_name">
                                    </div>
                                    
                                    <div class="image-input-container mt-3">
                                        <label for="subquestion_image">Informasi Gambar</label>
                                        <input type="file" accept=".jpeg,.jpg,.png" required class="form-control subquestion-image" name="subquestion_image">
                                    </div>

                                    <div class="mt-3 form-check">
                                        <input type="checkbox" class="form-check-input border-secondary toggle-image-checkbox" id="check-image">
                                        <label class="form-check-label" for="check-image">Berisi informasi gambar</label>
                                    </div>
                                    
                                    <div class="mt-3 text-end">
                                        <button type="submit" class="btn btn-success">TAMBAH</button>
                                    </div>
                                </form>
                            </x-modal>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex flex-wrap" style="gap:25px;">
                        @foreach ($question->subQuestions as $subquestion)
                        <div class="d-flex">
                            <div class="justify-content-between p-3 bg-secondary-subtle" data-bs-toggle="modal" data-bs-target="{{ '#detailSubQuestion'.$subquestion->subquestion_id }}" style="cursor: pointer;">
                                <span>{{ $subquestion->subquestion_name }}</span>
                            </div>
                            <form action="{{ route('delete-examination-subquestion', $subquestion->subquestion_id) }}" method="POST" class="d-flex align-items-center justify-content-center bg-danger-subtle border border-danger" style="cursor: pointer">
                                @csrf
                                @method('DELETE')
                                <button class="btn" type="submit"><i class="bi bi-x fs-5 fw-bold text-danger"></i></button>
                            </form>
                        </div>

                        <x-modal id="{{ 'detailSubQuestion'.$subquestion->subquestion_id }}" title="Detail Sub Soal" size="modal-lg">
                            <form action="{{ route('update-examination-subquestion', $subquestion->subquestion_id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="">
                                    <label for="subquestion_name">Nama Sub Soal</label>
                                    <input type="text" value="{{ $subquestion->subquestion_name }}" class="form-control" required placeholder="Masukkan nama sub soal" name="subquestion_name" id="subquestion_name">
                                </div>
                                
                                @if ($subquestion->subquestion_image)
                                    <div class=" my-3">
                                        <img src="{{ asset('img/subquestion/'.$subquestion->subquestion_image) }}" width="200" height="300" alt="">
                                    </div>
                                @endif
                                    
                                <div class="image-input-container mt-3">
                                    <label for="subquestion_image">Informasi Gambar</label>
                                    <input type="file" class="form-control subquestion-image" name="subquestion_image">
                                </div>


                                <div class="mt-3 form-check">
                                    <input type="checkbox" class="form-check-input border-secondary toggle-image-checkbox" id="{{ 'check-image'.$loop->iteration }}">
                                    <label class="form-check-label" for="{{ 'check-image'.$loop->iteration }}">{{ $subquestion->subquestion_image == null ? 'Berisi informasi gambar' : 'Ganti gambar' }}</label>
                                </div>

                                <div class="text-end mt-3">
                                    <button type="submit" class="btn btn-primary">PERBARUI</button>
                                </div>
                            </form>
                        </x-modal>
                        @endforeach

                        
                        @if ($question->subQuestions->isEmpty())
                            <p class="text-secondary">Belum ada sub soal yang tersedia</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    @if ($questions->isEmpty())
        <p class="text-secondary">Belum ada soal pemeriksaan</p>
    @endif

</x-admin-template>