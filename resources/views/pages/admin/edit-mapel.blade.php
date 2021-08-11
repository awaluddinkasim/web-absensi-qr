@extends('layouts.app')

@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Guru</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Master</a></li>
            <li class="breadcrumb-item"><a href="/admin/master/mapel">Mata Pelajaran</a></li>
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
                            <label for="nama">Nama Pelajaran</label>
                            <input type="text" class="form-control" id="nama" name="nama" required autocomplete="off" value="{{ $data->mapel }}">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="hari">Hari</label>
                                    <select class="form-control" name="hari" id="hari" required>
                                        <option value="" selected hidden>Pilih</option>
                                        <option value="Senin" {{ $data->hari == "Senin" ? 'selected' : '' }}>Senin</option>
                                        <option value="Selasa" {{ $data->hari == "Selasa" ? 'selected' : '' }}>Selasa</option>
                                        <option value="Rabu" {{ $data->hari == "Rabu" ? 'selected' : '' }}>Rabu</option>
                                        <option value="Kamis" {{ $data->hari == "Kamis" ? 'selected' : '' }}>Kamis</option>
                                        <option value="Jumat" {{ $data->hari == "Jumat" ? 'selected' : '' }}>Jumat</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jam">Jam</label>
                                    <input type="time" class="form-control" id="jam" name="jam" required value="{{ Carbon\Carbon::parse($data->jam)->format('h:i') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="guru">Guru</label>
                            <select class="form-control" name="guru" id="guru" required>
                                <option value="" selected hidden>Pilih</option>
                                @foreach ($daftarGuru as $guru)
                                    <option value="{{ $guru->username }}" {{ $guru->username == $data->pengajar ? 'selected' : '' }}>{{ $guru->nama }}</option>
                                @endforeach
                            </select>
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
