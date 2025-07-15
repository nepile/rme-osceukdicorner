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
            <a href="{{ route('dashboard-participant') }}" class="btn btn-danger w-100">
                KELUAR
            </a>
        </div>
    </div>
</div>
