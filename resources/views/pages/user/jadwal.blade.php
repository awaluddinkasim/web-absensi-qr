@extends('layouts.app')

@section('content')
    <!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Jadwal</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Jadwal</li>
        </ol>
    </div>

    @php
        $senin = App\Models\Mapel::where('kelas', auth()->user()->kelas)->where('jurusan', auth()->user()->jurusan)->orderBy('jam')->where('hari', 'Senin')->get();
        $selasa = App\Models\Mapel::where('kelas', auth()->user()->kelas)->where('jurusan', auth()->user()->jurusan)->orderBy('jam')->where('hari', 'Selasa')->get();
        $rabu = App\Models\Mapel::where('kelas', auth()->user()->kelas)->where('jurusan', auth()->user()->jurusan)->orderBy('jam')->where('hari', 'Rabu')->get();
        $kamis = App\Models\Mapel::where('kelas', auth()->user()->kelas)->where('jurusan', auth()->user()->jurusan)->orderBy('jam')->where('hari', 'Kamis')->get();
        $jumat = App\Models\Mapel::where('kelas', auth()->user()->kelas)->where('jurusan', auth()->user()->jurusan)->orderBy('jam')->where('hari', 'Jumat')->get();
    @endphp

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Senin</h5>
                    <div class="list-group">
                        @forelse ($senin as $item)
                        <a href="{{ Request::url() }}/{{ $item->id }}" class="list-group-item list-group-item-action">{{ $item->mapel }}</a>
                        @empty
                        <label class="list-group-item list-group-item-action text-center">Tidak ada jadwal</label>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Selasa</h5>
                    <div class="list-group">
                        @forelse ($selasa as $item)
                        <a href="{{ Request::url() }}/{{ $item->id }}" class="list-group-item list-group-item-action">{{ $item->mapel }}</a>
                        @empty
                        <label class="list-group-item list-group-item-action text-center">Tidak ada jadwal</label>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Rabu</h5>
                    <div class="list-group">
                        @forelse ($rabu as $item)
                        <a href="{{ Request::url() }}/{{ $item->id }}" class="list-group-item list-group-item-action">{{ $item->mapel }}</a>
                        @empty
                        <label class="list-group-item list-group-item-action text-center">Tidak ada jadwal</label>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row my-3">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Kamis</h5>
                    <div class="list-group">
                        @forelse ($kamis as $item)
                        <a href="{{ Request::url() }}/{{ $item->id }}" class="list-group-item list-group-item-action">{{ $item->mapel }}</a>
                        @empty
                        <label class="list-group-item list-group-item-action text-center">Tidak ada jadwal</label>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Jumat</h5>
                    <div class="list-group">
                        @forelse ($jumat as $item)
                        <a href="{{ Request::url() }}/{{ $item->id }}" class="list-group-item list-group-item-action">{{ $item->mapel }}</a>
                        @empty
                        <label class="list-group-item list-group-item-action text-center">Tidak ada jadwal</label>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!---Container Fluid-->

@endsection
