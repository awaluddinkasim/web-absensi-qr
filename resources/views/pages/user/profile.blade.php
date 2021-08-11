@extends('layouts.app')

@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profil</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profil</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-md-7 col-sm-12 text-center">
            <img src="{{ asset('img/profile.svg') }}" alt="" class="w-50">
        </div>
        <div class="col-md-5 col-sm-12">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nis">Nomor Induk Siswa</label>
                            <input type="text" class="form-control" name="nis" id="nis" value="{{ auth()->user()->nis }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" value="{{ auth()->user()->nama }}" autocomplete="off" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ auth()->user()->tempat_lahir }}" required autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required value="{{ auth()->user()->tgl_lahir }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                            <small>* Kosongkan jika tidak ingin mengganti password</small>
                        </div>
                        <div class="form-group" style="display: none" id="konfirmasi">
                            <label for="konfirmasi-password">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="konfirmasi-password">
                            <div class="invalid-feedback">
                                Konfirmasi password tidak cocok.
                            </div>
                        </div>
                        <div class="clearfix">
                            <button class="btn btn-primary float-right" id="btn-simpan">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!---Container Fluid-->
@endsection


@push('scripts')
    <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
    @if (Session::has('success'))
    <script>
        swal({ icon: 'success', title: '{{ Session::get('success') }}' })
    </script>
    @endif
    <script>
        $('#password, #konfirmasi-password').on('keyup change', function() {
            let pass = $('#password');
            let konf = $('#konfirmasi-password');

            if (pass.val().length > 0) {
                $('#btn-simpan').attr('disabled', true);
                $('#konfirmasi').show();
                konf.attr('required', true);
                if (pass.val() != konf.val()) {
                    konf.removeClass('is-valid');
                    konf.addClass('is-invalid');
                } else {
                    konf.removeClass('is-invalid');
                    konf.addClass('is-valid');
                    $('#btn-simpan').removeAttr('disabled');
                }
            } else {
                $('#btn-simpan').removeAttr('disabled');
                konf.removeAttr('required');
                $('#konfirmasi').hide();
            }
        })
    </script>
@endpush
