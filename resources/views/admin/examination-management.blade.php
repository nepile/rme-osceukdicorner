<x-admin-template title="{{ $title }}">
<div class="row">
        <div class="col mb-4 d-flex justify-content-between align-items-end">
            <div class="">
                <a href="{{ route('exam-model') }}" class="btn btn-secodary px-0 mb-4">
                    <i class="bi bi-arrow-left"></i>
                    <span>Kembali</span>
                </a>
                <h4>{{ $title }}</h4>
                <span class="text-secondary">Tanggal Pelaksanaan: <strong class="text-success">{{ date('D, d M Y', strtotime($session->examDate->date)) }}</strong></span>
            </div>
        </div>
        <hr>
    </div>

    <div class="row my-3">
        @foreach ($mergedTesters as $tester)
        <div class="col-xl-3">
            <div class="card">
                <div class="card-header">
                    <strong>{{ $tester['name'] }}</strong>
                </div>
                <div class="card-body">
                    <p>Soal:</p>
                    <p>Dikumpul:</p>
                    <p>Diulas:</p>
                    
                    <div class="text-end">
                        <a href="{{ route('examination-question', [$session->session_id, $tester['tester_id']]) }}" class="btn btn-success">Buat Soal</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        
    </div>
</x-admin-template>