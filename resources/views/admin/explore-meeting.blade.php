@extends('admin.component.template')

@section('title', 'EcoTrip Meeting Point')

@section('page-style')
    <link href="{{ asset(asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.css')) }}" rel="stylesheet">
@endsection

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">EcoExplore</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Meeting Point</h6>
            <a href="{{ route('adminExploreMeetingAdd') }}" class="btn btn-primary btn-md">Tambah</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php
                            $count = 1;
                        @endphp
                        @foreach($points as $point)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $point->title }}</td>
                                <td>{{ $point->description }}</td>
                                <td class="d-flex flex-wrap" style="gap: .5rem">
                                    <form method="POST" action="{{ route('adminExploreMeetingDeleteMethod', $point->id) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm del">Delete</button>
                                    </form>
                                    <a href="{{ route('adminExploreMeetingEdit', $point->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="{{ route('adminExploreMeetingDetail', $point->id) }}" class="btn btn-info btn-sm">Detail</a>
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
