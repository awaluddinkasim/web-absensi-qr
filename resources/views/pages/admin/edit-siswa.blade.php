@extends('layouts.app')

@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Siswa</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Master</a></li>
            <li class="breadcrumb-item"><a href="/admin/master/siswa">Siswa</a></li>
            <li class="breadcrumb-item"><a href="#">{{ $jurusan == 'tkj' ? strtoupper($jurusan) : ucfirst($jurusan) }}</a></li>
            <li class="breadcrumb-item"><a href="./">{{ $kelas }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </div>

    <!-- DataTable with Hover -->
    <div class="card mb-4">
        <div class="card-body">
            <form action="" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $data->nama }}" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <select class="form-control" name="jk" id="jk" required>
                                <option value="" selected hidden>Pilih</option>
                                <option value="L" {{ $data->jk == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="P" {{ $data->jk == 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ $data->tempat_lahir }}" required autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required value="{{ $data->tgl_lahir }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">

                        <div class="form-group">
                            <label for="nis">Nomor Induk Siswa</label>
                            <input type="text" class="form-control" id="nis" name="nis" value="{{ $data->nis }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <small class="form-text text-danger">* Kosongkan jika tidak ingin mengganti password</small>
                        </div>
                    </div>
                </div>
                <button class="btn btn-info btn-block" type="submit">Simpan</button>
            </form>
        </div>
    </div>

</div>
<!---Container Fluid-->
@endsection
