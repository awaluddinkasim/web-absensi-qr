@extends('layouts.app')

@section('content')
    <!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Scan QR Code</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Scanner</li>
        </ol>
    </div>

    <div class="card">
        <div class="card-body">
            <div style="width: 100%; min-height: 300px; height: calc(100vh - 300px)" id="reader"></div>
        </div>
    </div>

</div>
<!---Container Fluid-->

@endsection

@push('scripts')
    @if (Session::has('failed'))
        <script>
            swal({ icon: 'error', title: '{{ Session::get('failed') }}' })
        </script>
    @endif
    @if (Session::has('success'))
        <script>
            swal({ icon: 'success', title: '{{ Session::get('success') }}' })
        </script>
    @endif
    <script src="{{ asset('assets/js/html5-qrcode.min.js') }}"></script>
    <script>
        function onScanSuccess(decodedText, decodedResult) {
            // Handle on success condition with the decoded text or result.
            console.log(`Scan result: ${decodedText}`, decodedResult);
            document.location.href = decodedText;
            html5QrcodeScanner.clear();
        }
        var html5QrcodeScanner = new Html5QrcodeScanner("reader", { fps: 10, qrbox: 250 });
        html5QrcodeScanner.render(onScanSuccess);
    </script>
@endpush
