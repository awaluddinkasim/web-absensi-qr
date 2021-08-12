@extends('layouts.app')

@push('styles')
<link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Mata Pelajaran {{ $jurusan == 'tkj' ? strtoupper($jurusan) : ucfirst($jurusan) }}</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Master</a></li>
            <li class="breadcrumb-item"><a href="/admin/master/mapel">Mata Pelajaran</a></li>
            <li class="breadcrumb-item"><a href="#">{{ $jurusan == 'tkj' ? strtoupper($jurusan) : ucfirst($jurusan) }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $kelas }}</li>
        </ol>
    </div>

    <!-- DataTable with Hover -->
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Mata Pelajaran Kelas {{ $kelas }}</h6>
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus-circle mr-2"></i>Tambah Mata Pelajaran
            </button>
        </div>
        <div class="table-responsive p-3">
            <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Pelajaran</th>
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Guru</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->mapel }}</td>
                        <td>{{ $item->hari }}</td>
                        <td>{{ Carbon\Carbon::parse($item->jam)->format('h:i') }}</td>
                        <td>{{ $item->guru->nama }}</td>
                        <td class="text-center">
                            <button class="btn btn-success btn-sm" onclick="document.location.href = '{{ Request::url() }}/{{ $item->id }}'">Edit</button>
                            <form action="{{ Request::url() }}/{{ $item->id }}" method="POST" style="display: inline">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-outline-danger btn-sm" type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Mata Pelajaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama Pelajaran</label>
                            <input type="text" class="form-control" id="nama" name="nama" required autocomplete="off">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="hari">Hari</label>
                                    <select class="form-control" name="hari" id="hari" required>
                                        <option value="" selected hidden>Pilih</option>
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jumat</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jam">Jam</label>
                                    <input type="time" class="form-control" id="jam" name="jam" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="guru">Guru</label>
                            <select class="form-control" name="guru" id="guru" required>
                                <option value="" selected hidden>Pilih</option>
                                @foreach ($daftarGuru as $guru)
                                    <option value="{{ $guru->username }}">{{ $guru->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!---Container Fluid-->
@endsection

@push('scripts')

<script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script>
    $(document).ready(function () {
      $('#dataTableHover').DataTable({
          ordering: false,
          responsive: true
      }); // ID From dataTable with Hover
    });
</script>
@endpush
