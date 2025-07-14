<x-nonadmin-template title="{{ $title }}">
    <div class="container mt-4">
        <div class="row">
            @foreach ($exams as $exam)
                <div class="col-md-6 mb-4">
                    {{-- Kotak Ujian --}}
                    <div class="card shadow-sm border rounded p-3 d-flex flex-column justify-content-between" style="height: 200px;">
                        <div>
                            <h3 class="mb-1">{{ $exam['tanggal'] }}</h3> <br>
                            <p class="mb-1"><strong>Jumlah Penguji:</strong> {{ $exam['penguji'] }}</p>
                            <p class="mb-1"><strong>Jumlah Gelombang:</strong> {{ $exam['gelombang'] }}</p>
                        </div>
                        <div class="text-end mt-auto">
                            <a href="{{ route('exam-detail', ['tanggal' => $exam['tanggal'], 'penguji' => $exam['penguji'], 'gelombang' => $exam['gelombang']]) }}" class="btn btn-sm btn-primary">Lihat</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-nonadmin-template>
