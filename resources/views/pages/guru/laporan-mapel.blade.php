@extends('layouts.app')


@push('styles')
<link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush


@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    @livewire('guru-laporan', ['id_mapel' => $id])
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
