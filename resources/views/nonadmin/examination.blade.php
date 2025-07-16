<x-nonadmin-template :title="$title" :active="$active" :tester="$tester">
    <div class="container mt-4">
        <div class="card shadow-sm p-4">
            <div class="card-body">
                <div class="border-bottom border-secondary mb-4">
                    <p class="text-muted">Pilih pemeriksaan penunjang yang anda ajukan minimal 5!</p>
                </div>

                @foreach ($questions as $question)
                <div class="border-bottom mb-4">
                    <h6 class="fw-bold">
                        {{ $question->question_name }}
                    </h6>
                    <div class="d-flex flex-wrap">
                        @foreach ($question->subQuestions as $subquestion)
                        @php
                            $userAnswer = $subquestion->answers->where('participant_id', session('user.user_id'))->first();
                        @endphp
                        <div class="col-3 mt-2 form-check">
                            <input type="checkbox" class="form-check-input border-secondary toggle-image-checkbox" id="{{ 'check-image'.$loop->iteration }}" @if($userAnswer && $userAnswer->subquestion_id == $subquestion->subquestion_id && $subquestion->question->tester_id == $tester->tester_id) checked disabled @else onclick="return false" @endif>
                            <label class="form-check-label" data-bs-toggle="modal" data-bs-target="{{ '#detailSubQuestion'.$subquestion->subquestion_id }}" for="{{ 'check-image'.$loop->iteration }}">{{ $subquestion->subquestion_name }}</label>
                        </div>

                        <x-modal id="{{ 'detailSubQuestion'.$subquestion->subquestion_id }}" title="Interpretasi Jawaban" size="modal-lg">
                            <div class="w-100">
                                @if ($subquestion->subquestion_image)
                                <img src="{{ asset('img/subquestion/'.$subquestion->subquestion_image) }}" class="w-100 h-100 object-fit-cover" alt="">
                                @else
                                <p class="text-secondary">Tidak ada informasi</p>
                                @endif
                            </div>

                            @if($userAnswer && $userAnswer->subquestion_id == $subquestion->subquestion_id && $subquestion->question->tester_id == $tester->tester_id)
                            <form action="{{ route('delete-examination-answer', $userAnswer->answerexamination_id) }}" method="POST">
                                @if ($subquestion->subquestion_image)
                                <div class="mt-4">
                                    <p><strong>Interpretasi Jawaban</strong></p>
                                    {{ $userAnswer->answer }}
                                </div>
                                @endif
                                @csrf
                                @method('DELETE')
                                <div class="text-end mt-4">
                                    <button type="submit" class="btn btn-danger">HAPUS</button>
                                </div>
                            </form>
                            @else
                            <form action="{{ route('store-examination-answer') }}" method="POST">
                                @csrf
                                <input type="hidden" name="subquestion_id" value="{{ $subquestion->subquestion_id }}">
                                
                                @if ($subquestion->subquestion_image)    
                                <div class="mt-4">
                                    <label for="">Interpretasi Jawaban</label>
                                    <textarea class="form-control" name="answer" placeholder="Masukkan jawaban anda disini"></textarea>
                                </div>
                                @endif

                                <div class="mt-3 text-end">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">BATAL</button>
                                    <button class="btn btn-primary">SIMPAN</button>
                                </div>
                            </form>

                            @endif
                        </x-modal>
                        @endforeach
                    </div>
                </div>
                @endforeach

                @if ($checkStatus)
                <div>
                    <span class="text-success"><strong>DIKUMPUL</strong></span>
                </div>
                @else
                <form method="POST" action="{{ route('finalization-examination-answer') }}" class="text-end">
                    @csrf
                    <input type="hidden" name="tester_id" value="{{ $tester->tester_id }}">
                    <button class="btn btn-primary">KUMPULKAN</button>
                </form>

                @endif

            </div>
        </div> 
    </div>
</x-nonadmin-template>
