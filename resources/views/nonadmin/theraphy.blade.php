<x-nonadmin-template :title="$title" :active="$active" :tester="$tester">
    <div class="container mt-4">
        <form method="POST" action="{{ route('store-therapy-answer') }}" class="card shadow-sm p-4">
            @csrf
            <input type="hidden" name="tester_id" value="{{ $tester->tester_id }}">
            <h5 class="mb-3">Tuliskan resep yang Anda berikan kepada pasien!</h5>

                @for ($i = 0; $i < 4; $i++)
                    <div class="mb-3 row align-items-start">
                        <label class="col-auto col-form-label fw-bold">R/</label>
                        <div class="col">
                            <textarea class="form-control" name="{{ 'rslash'.($i+1) }}" rows="2" @if($therapy) readonly @endif>{{ $therapy->{'rslash'.($i+1)} ?? null }}</textarea>
                        </div>
                    </div>
                @endfor

            @if (!$therapy)  
            <div class="text-end">
                <button type="submit" class="btn btn-primary">KUMPULKAN</button>
            </div>
            @else
            <div>
                <span class="text-success"><strong>DIKUMPUL</strong></span>
            </div>
            @endif
        </div>
    </div>
</x-nonadmin-template>
