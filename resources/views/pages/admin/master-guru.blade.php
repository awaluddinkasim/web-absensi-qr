@extends('layouts.app')

@push('styles')
<link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Guru</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Master</a></li>
            <li class="breadcrumb-item active" aria-current="page">Guru</li>
        </ol>
    </div>

    <!-- DataTable with Hover -->
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Guru</h6>
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus-circle mr-2"></i>Tambah Guru
            </button>
        </div>
        <div class="table-responsive p-3">
            <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat Tanggal Lahir</th>
                        <th>Jabatan</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->nip ? $item->nip : '-' }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->jk }}</td>
                        <td>{{ $item->tempat_lahir }}, {{ Carbon\Carbon::parse($item->tgl_lahir)->isoFormat('D MMMM YYYY') }}</td>
                        <td>{{ $item->jabatan }}</td>
                        <td class="text-center">
                            <button class="btn btn-success btn-sm" onclick="document.location.href = '{{ Request::url() }}/{{ $item->username }}'">Edit</button>
                            <form action="{{ Request::url() }}/{{ $item->username }}/delete" method="POST"  style="display: inline">
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Guru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="nip">Nomor Induk Pegawai</label>
                            <input type="text" class="form-control" id="nip" name="nip" autocomplete="off">
                            <small class="form-text text-muted">* Kosongkan jika tidak ada</small>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <select class="form-control" name="jk" id="jk" required>
                                <option value="" selected hidden>Pilih</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Status</label>
                            <select class="form-control" name="jabatan" id="jabatan" required>
                                <option value="" selected hidden>Pilih</option>
                                <option value="Guru Tidak Tetap">Guru Tidak Tetap</option>
                                <option value="Guru Tetap Yayasan">Guru Tetap Yayasan</option>
                                <option value="PNS Diperbantukan">PNS Diperbantukan</option>
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
