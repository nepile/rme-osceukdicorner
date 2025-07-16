<x-nonadmin-template :title="$title" :active="$active">
    <div class="container mt-4">
        <div class="card shadow-sm p-4">
            <h5 class="mb-3">Tuliskan resep yang Anda berikan kepada pasien!</h5>

            @for ($i = 0; $i < 4; $i++)
                <div class="mb-3 row align-items-start">
                    <label class="col-auto col-form-label fw-bold">R/</label>
                    <div class="col">
                        <textarea class="form-control" rows="2"></textarea>
                    </div>
                </div>
            @endfor

            <div class="text-end">
                <button class="btn btn-primary">KUMPULKAN</button>
            </div>
        </div>
    </div>
</x-nonadmin-template>
