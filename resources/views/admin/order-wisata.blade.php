@extends('admin.component.template')

@section('title', 'EcoTrip Pemesanan Wisata')

@section('page-style')
    <link href="{{ asset(asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.css')) }}" rel="stylesheet">
@endsection

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pemesanan Wisata</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Pemesanan Wisata</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Transaction Date</th>
                            <th>Ticket Code</th>
                            <th>Wisata Name</th>
                            <th>Qty</th>
                            <th>Ticket Date</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Transaction Date</th>
                            <th>Ticket Code</th>
                            <th>Wisata Name</th>
                            <th>Qty</th>
                            <th>Ticket Date</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php
                            $count = 1;
                        @endphp
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ date("d/m/Y H:i:s", strtotime($order->created_at)) }}</td>
                                <td>{{ $order->kode_tiket }}</td>
                                <td>{{ $order->wisata->name }}</td>
                                <td>{{ $order->qty }}</td>
                                <td>{{ date("d/m/Y", strtotime($order->date)) }}</td>
                                <td>{{ $order->status_code == 2 ? 'Verified' : (Carbon\Carbon::parse($order->date)->lt(Carbon\Carbon::today()) ? 'Expired' : 'Pending') }}</td>
                                <td class="d-flex flex-wrap" style="gap: .5rem">
                                    <a href="{{ route('adminOrderWisataDetail', $order->id) }}" class="btn btn-info btn-sm">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
    <script src="{{ asset('assets/admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
@endsection
