@extends('layouts.app')

@section('content')
    <!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Absensi</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/guru">Home</a></li>
            <li class="breadcrumb-item"><a href="./">Absensi</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $data->mapel }}</li>
        </ol>
    </div>

    <div class="card">
        <div class="card-body">
            @if (isset($qr) && $qr->scannable == '1')
            <div class="text-center">
                <img src="{{ asset('qr/'.$qr->qrcode) }}" alt="">
                <h4 class="mt-3">Pertemuan ke-{{ $qr->pertemuan }}</h4>
            </div>
            @else
            <button class="btn btn-success btn-block" data-toggle="modal" data-target="#exampleModal">Buat QR Code</button>
            @endif
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">QR Code</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="pertemuan">Pertemuan</label>
                            <input type="text" class="form-control" id="pertemuan" name="pertemuan" readonly autocomplete="off" value="{{ (isset($qr) && $qr->pertemuan >= 1) ? $qr->pertemuan + 1 : 1 }} ">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Lanjutkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!---Container Fluid-->

@endsection
