@extends('layouts.app')

@section('content')
    <!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Absensi</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Absensi</li>
        </ol>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Daftar Mata Pelajaran</h5>
            <div class="list-group">
                @foreach (auth()->user()->pelajaran as $item)
                <a href="{{ Request::url() }}/{{ $item->id }}" class="list-group-item list-group-item-action">{{ $item->mapel }} Kelas {{ $item->kelas }} Jurusan {{ $item->jurusan == "tkj" ? strtoupper($item->jurusan) : ucfirst($item->jurusan) }}</a>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!---Container Fluid-->

@endsection
