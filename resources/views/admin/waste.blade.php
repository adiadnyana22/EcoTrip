@extends('admin.component.template')

@section('title', 'EcoTrip EcoWaste')

@section('page-style')
    <link href="{{ asset(asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.css')) }}" rel="stylesheet">
@endsection

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">EcoWaste</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">EcoWaste</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Review Date</th>
                            <th>Product Type</th>
                            <th>Account Email</th>
                            <th>Star</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Review Date</th>
                            <th>Product Type</th>
                            <th>Account Email</th>
                            <th>Star</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php
                            $count = 1;
                        @endphp
                        @foreach($wastes as $waste)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ date("d/m/Y H:i:s", strtotime($waste->created_at)) }}</td>
                                <td>{{ $waste->order_type == 'W' ? 'Wisata' : 'Explore' }}</td>
                                <td>{{ $waste->user->email }}</td>
                                <td>{{ $waste->star }}</td>
                                <td>{{ $waste->status_code == 2 ? 'Verified' : 'Pending' }}</td>
                                <td class="d-flex flex-wrap" style="gap: .5rem">
                                    <a href="{{ route('adminWasteDetail', $waste->id) }}" class="btn btn-info btn-sm">Detail</a>
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
