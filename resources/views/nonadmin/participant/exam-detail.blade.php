<x-nonadmin-template title="Detail Ujian">
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">{{ date('d M Y', strtotime($session->examDate->date)) }}</h4>
            <h6 class="mb-0">Jumlah Penguji: {{ $session->testers->count() }}</h6>
        </div>

        {{-- Accordion Informasi Gelombang --}}
        <div class="accordion mb-4" id="gelombangAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="gelombangHeader">
                    <button class="accordion-button collapsed" type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#gelombangBody"
                        aria-expanded="false"
                        aria-controls="gelombangBody">
                        Informasi Gelombang
                    </button>
                </h2>
                <div id="gelombangBody"
                    class="accordion-collapse collapse"
                    aria-labelledby="gelombangHeader"
                    data-bs-parent="#gelombangAccordion">
                    <div class="accordion-body">
                        <table class="table table-bordered table-sm mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Gelombang</th>
                                    <th>Jam</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($waves as $wave)
                                    <tr>
                                        <td>Gelombang {{ $loop->iteration }}</td>
                                        <td>{{ $wave->start }} - {{ $wave->end }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($testers as $no => $tester)
                <div class="col-md-3 mb-2">
                    <div class="card shadow-sm border rounded p-3 d-flex flex-column justify-content-between" style="height: auto; ">
                        <div>
                            <h2>{{ $tester['name'] }}</h2> <br>
                        </div>
                        <div class="text-end">
                            <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="{{ '#startExam'.$tester['tester_id'] }}">Mulai</button>
                        
                            <x-modal id="{{ 'startExam'.$tester['tester_id'] }}" title="Perhatian" size="modal-md">
                                <p>Anda yakin untuk mengerjakan soal dari Penguji <strong>{{ $tester['name'] }}</strong></p>
                                
                                <x-slot:footer>
                                    <form action="{{ route('enrolled-exam', $tester['tester_id']) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Mulai</button>
                                    </form>
                                </x-slot:footer>
                            </x-modal>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-nonadmin-template>
