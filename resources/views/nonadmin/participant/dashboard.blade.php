<x-nonadmin-template title="{{ $title }}">
    <div class="container mt-4">
        <div class="row">
            <h5 class="mb-5 mt-3">Hi, {{ session('user.name') }}</h5>
            @foreach ($exams as $exam)
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm border rounded p-3 d-flex flex-column justify-content-between" style="height: 200px;">
                        <div>
                            <h1 class="mb-1">{{ date('D, d M Y', strtotime($exam->examDate->date)) }}</h1> <br>
                            <p class="mb-1"><strong>Jumlah Penguji:</strong> {{ $exam->testers->count() }}</p>
                            <p class="mb-1"><strong>Jumlah Gelombang:</strong> {{ $exam->waveSessions->count() }}</p>
                        </div>
                        <div class="text-end mt-auto">
                            <a href="{{ route('exam-detail', $exam->session_id) }}" class="btn btn-sm btn-primary">Lihat</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-nonadmin-template>
