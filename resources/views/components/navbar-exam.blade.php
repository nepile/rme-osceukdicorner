@php
    $active = $active ?? 'pemeriksaan';
@endphp

<div class="container mt-4">
    <div class="row g-2 mb-4">
        <div class="col-md-3">
            <a href="{{ route('examination') }}"
               class="btn w-100 {{ $active === 'pemeriksaan' ? 'btn-success border-bottom border-4 border-dark fw-bold' : 'btn-outline-success' }}">
                Pemeriksaan
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('diagnosis') }}"
               class="btn w-100 {{ $active === 'diagnosis' ? 'btn-success border-bottom border-4 border-dark fw-bold' : 'btn-outline-success' }}">
                Diagnosis
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('theraphy') }}"
               class="btn w-100 {{ $active === 'terapi' ? 'btn-success border-bottom border-4 border-dark fw-bold' : 'btn-outline-success' }}">
                Terapi
            </a>
        </div>
        <div class="col-md-3">
            @if (session('user.role') === 'mentor')
                <a href="{{ route('assessment-tester', ['id' => 1]) }}"  class="btn btn-outline-primary w-100 fw-bold hover-btn">
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
