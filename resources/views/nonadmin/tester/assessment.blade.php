<x-nonadmin-template title="Penilaian Peserta">
    <div class="container mt-4">
        <h4 class="mb-4 fw-bold">Penilaian Peserta</h4>

        <div class="card shadow-sm p-5">
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label fw-semibold">Nama :</label>
                <div class="col-sm-9">
                    <p class="form-control-plaintext">Nono</p>
                </div>
            </div>
            <div class="mb-4 row">
                <label class="col-sm-3 col-form-label fw-semibold">Email :</label>
                <div class="col-sm-9">
                    <p class="form-control-plaintext">Nono@example.com</p>
                </div>
            </div>

            <form action="#" method="POST">
                @csrf
                <div class="mb-3 row">
                    <label for="pemeriksaan" class="col-sm-3 col-form-label fw-semibold">Pemeriksaan :</label>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input type="number" class="form-control" id="pemeriksaan" name="pemeriksaan" placeholder="Nilai 0-3" min="0" max="3">
                            <span class="input-group-text">x 3</span>
                        </div>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="diagnosis" class="col-sm-3 col-form-label fw-semibold">Diagnosis :</label>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input type="number" class="form-control" id="diagnosis" name="diagnosis" placeholder="Nilai 0-3" min="0" max="3">
                            <span class="input-group-text">x 3</span>
                        </div>
                    </div>
                </div>

                <div class="mb-4 row">
                    <label for="terapi" class="col-sm-3 col-form-label fw-semibold">Terapi :</label>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input type="number" class="form-control" id="terapi" name="terapi" placeholder="Nilai 0-3" min="0" max="3">
                            <span class="input-group-text">x 3</span>
                        </div>
                    </div>
                </div>
               <div class="row">
                    <div class="col-sm-12 text-end">
                        <button type="submit" class="btn btn-primary fw-bold">
                            Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-nonadmin-template>
