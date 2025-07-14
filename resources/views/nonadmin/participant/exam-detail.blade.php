<x-nonadmin-template title="Detail Ujian">
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">{{ $tanggal}}</h4>
            <h6 class="mb-0">Jumlah Penguji: {{ $penguji }}</h6>
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
                                @foreach ($gelombang as $no => $data)
                                    <tr>
                                        <td>Gelombang {{ $no }}</td>
                                        <td>{{ $data['jam_mulai'] }} - {{ $data['jam_selesai'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        {{-- Kartu Ujian --}}
        <div class="row">
            @foreach ($gelombang as $no => $data)
                @foreach ($data['ujian'] as $ujian)
                    <div class="col-md-3 mb-2">
                        <div class="card shadow-sm border rounded p-3 d-flex flex-column justify-content-between" style="height: auto; ">
                            <div>
                                <h2>{{ $ujian['penguji'] }}</h2> <br>
                                <p><strong>Gelombang ke:</strong> {{ $no }}</p>
                            </div>
                            <div class="text-end">
                                <a href="{{route('examination')}}" class="btn btn-sm btn-success">Mulai</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
</x-nonadmin-template>
