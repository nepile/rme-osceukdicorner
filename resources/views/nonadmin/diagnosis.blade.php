<x-nonadmin-template :title="$title" :active="$active" :tester="$tester">
    <div class="container mt-4">
        <form action="{{ route('store-diagnosis-answer') }}" method="POST" class="card shadow-sm p-4">
            @csrf
            <input type="hidden" name="tester_id" value="{{ $tester->tester_id }}">
            <h5 class="mb-3">Tuliskan diagnosis yang Anda tetapkan!</h5>

            <div class="mb-3">
                <label class="form-label">Diagnosis</label>
                <textarea class="form-control" name="diagnosis1" rows="2" @if($diagnoses) readonly @endif>{{ $diagnoses->diagnosis1 ?? null }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Diagnosis Banding 1</label>
                <textarea class="form-control" name="diagnosis2" rows="2" @if($diagnoses) readonly @endif>{{ $diagnoses->diagnosis2 ?? null }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Diagnosis Banding 2</label>
                <textarea class="form-control" name="diagnosis3" rows="2" @if($diagnoses) readonly @endif>{{ $diagnoses->diagnosis3 ?? null }}</textarea>
            </div>

            @if (!$diagnoses)
            <div class="text-end">
                <button class="btn btn-primary">KUMPULKAN</button>
            </div>
            @else
            <div>
                <span class="text-success"><strong>DIKUMPUL</strong></span>
            </div>
            @endif
        </form>
    </div>
</x-nonadmin-template>
