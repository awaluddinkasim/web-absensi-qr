@extends('layouts.app')


@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Laporan</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Laporan</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Akuntansi</h5>
                    <div class="list-group">
                        <a href="{{ Request::url() }}/akuntansi/X" class="list-group-item list-group-item-action">Kelas X</a>
                        <a href="{{ Request::url() }}/akuntansi/XI" class="list-group-item list-group-item-action">Kelas XI</a>
                        <a href="{{ Request::url() }}/akuntansi/XII" class="list-group-item list-group-item-action">Kelas XII</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- TKJ --}}
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">TKJ</h5>
                    <div class="list-group">
                        <a href="{{ Request::url() }}/tkj/X" class="list-group-item list-group-item-action">Kelas X</a>
                        <a href="{{ Request::url() }}/tkj/XI" class="list-group-item list-group-item-action">Kelas XI</a>
                        <a href="{{ Request::url() }}/tkj/XII" class="list-group-item list-group-item-action">Kelas XII</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- Perhotelan --}}
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Perhotelan</h5>
                    <div class="list-group">
                        <a href="{{ Request::url() }}/perhotelan/X" class="list-group-item list-group-item-action">Kelas X</a>
                        <a href="{{ Request::url() }}/perhotelan/XI" class="list-group-item list-group-item-action">Kelas XI</a>
                        <a href="{{ Request::url() }}/perhotelan/XII" class="list-group-item list-group-item-action">Kelas XII</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- Perkantoran --}}
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Perkantoran</h5>
                    <div class="list-group">
                        <a href="{{ Request::url() }}/perkantoran/X" class="list-group-item list-group-item-action">Kelas X</a>
                        <a href="{{ Request::url() }}/perkantoran/XI" class="list-group-item list-group-item-action">Kelas XI</a>
                        <a href="{{ Request::url() }}/perkantoran/XII" class="list-group-item list-group-item-action">Kelas XII</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!---Container Fluid-->
@endsection
