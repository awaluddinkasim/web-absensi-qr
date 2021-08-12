@extends('layouts.app')


@push('styles')
<link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Laporan</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item"><a href="../">Laporan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Download</li>
        </ol>
    </div>


    <!-- DataTable with Hover -->
    <div class="card mb-4">
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
                            <button class="btn btn-info btn-sm" onclick="document.location.href = '{{ Request::url() }}/{{ $item->id }}'">Download Laporan</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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

