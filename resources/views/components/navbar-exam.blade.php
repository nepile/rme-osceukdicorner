@php
    $active = $active ?? 'pemeriksaan';
@endphp

<div class="container mt-4">
    <div class="row g-2 mb-4">
        <div class="col-md-3">
            <a href="{{ route('examination', $tester->tester_id) }}"
                class="btn w-100 {{ $active === 'pemeriksaan' ? 'btn-success border-bottom border-4 border-dark fw-bold' : 'btn-outline-success' }}">
                Pemeriksaan
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('diagnosis', $tester->tester_id) }}"
                class="btn w-100 {{ $active === 'diagnosis' ? 'btn-success border-bottom border-4 border-dark fw-bold' : 'btn-outline-success' }}">
                Diagnosis
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('theraphy', $tester->tester_id) }}"
                class="btn w-100 {{ $active === 'terapi' ? 'btn-success border-bottom border-4 border-dark fw-bold' : 'btn-outline-success' }}">
                Terapi
            </a>
        </div>
        <div class="col-md-3">
            @if (session('user.role') === 'mentor')
                <a href="{{ route('assessment-tester', ['id' => 1]) }}"
                    class="btn w-100 {{ $active === 'penilaian' ? 'btn-primary border-bottom border-4 border-dark fw-bold' : 'btn-outline-primary' }}">
                    Penilaian
                </a>
            @else
                <a href="{{ route('dashboard-participant') }}" class="btn btn-danger w-100">
                    Keluar
                </a>
            @endif
        </div>
    </div>

</div>
