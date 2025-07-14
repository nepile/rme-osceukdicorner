<x-nonadmin-template title="{{ $title }}">
    <div class="container mt-4">
        <h3 class="mb-4">Arsip Ujian</h3>

        <div class="accordion" id="arsipAccordion">
            @foreach ($arsip as $tanggal => $ujianList)
                @php
                    $id = 'collapse' . preg_replace('/\s+/', '', $tanggal);
                @endphp

                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{ $loop->index }}">
                        <button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#{{ $id }}"
                                aria-expanded="false"
                                aria-controls="{{ $id }}">
                            {{ $tanggal }}
                        </button>
                    </h2>
                    <div id="{{ $id }}"
                         class="accordion-collapse collapse"
                         aria-labelledby="heading{{ $loop->index }}"
                         data-bs-parent="#arsipAccordion">
                        <div class="accordion-body p-3">
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Nama Ujian</th>
                                            <th>Jam</th>
                                            <th>Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ujianList as $ujian)
                                            <tr>
                                                <td>{{ $ujian['nama_ujian'] }}</td>
                                                <td>{{ $ujian['jam'] }}</td>
                                                <td>{{ $ujian['nilai'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-nonadmin-template>
