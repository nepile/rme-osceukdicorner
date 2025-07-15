<x-nonadmin-template :title="$title" :active="$active">
    <div class="container mt-4">
        <div class="card shadow-sm p-4">
            <h5 class="mb-3">Tuliskan diagnosis yang Anda tetapkan!</h5>

            <div class="mb-3">
                <label class="form-label">Diagnosis</label>
                <textarea class="form-control" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Diagnosis Banding 1</label>
                <textarea class="form-control" rows="2"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Diagnosis Banding 2</label>
                <textarea class="form-control" rows="2"></textarea>
            </div>

            <div class="text-end">
                <button class="btn btn-primary">KUMPULKAN</button>
            </div>
        </div>
    </div>
</x-nonadmin-template>
