<div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $mapel->mapel }}</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item"><a href="./">Laporan</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $mapel->mapel }}</li>
        </ol>
    </div>

    <!-- DataTable with Hover -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group row">
                        <label for="pertemuan" class="col-md-6 align-middle">Pertemuan</label>
                        <div class="col-md-6">
                            <select name="pertemuan" id="pertemuan" class="form-control" wire:model="filterPertemuan">
                                <option value="" selected hidden>Pilih</option>
                                @foreach ($pertemuan as $item)
                                    <option value="{{ $item->pertemuan }}">{{ $item->pertemuan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    @if ($filterPertemuan)
                    <div class="clearfix">
                        <button class="btn btn-primary float-right" onclick="document.location.href = '/guru/laporan/{{ $mapel->id }}/{{ $filterPertemuan }}/export'">Cetak Laporan</button>
                    </div>
                    @endif
                </div>
            </div>
            <div class="table-responsive p-3">
                <table class="table table-hover">
                    <thead>
                        <tr class="d-flex row">
                            <th scope="col" class="col-1">#</th>
                            <th class="col-2">NIS</th>
                            <th class="col-4">Nama</th>
                            <th class="col-1">L/P</th>
                            <th class="col-2 text-center">Hadir</th>
                            <th class="col-2 text-center">Tidak Hadir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($filterPertemuan)
                            @forelse ($siswa as $item)
                            <tr class="d-flex row">
                                <td class="col-1">{{ $loop->iteration }}</td>
                                <td class="col-2">{{ $item->nis }}</td>
                                <td class="col-4">{{ $item->nama }}</td>
                                <td class="col-1">{{ $item->jk }}</td>
                                <td class="col-2 text-center">
                                    @if ($item->absensi($filterPertemuan, $mapel->id)->first())
                                        <i class="fas fa-check-circle text-success"></i>
                                    @endif
                                </td>
                                <td class="col-2 text-center">
                                    @if (!$item->absensi($filterPertemuan, $mapel->id)->first())
                                        <i class="fas fa-check-circle text-success"></i>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr class="d-flex row">
                                <td colspan="5" class="col-12 text-center">Tidak ada data</td>
                            </tr>
                            @endforelse
                        @else
                            <tr class="d-flex row">
                                <td colspan="5" class="col-12 text-center">Tidak ada data</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
