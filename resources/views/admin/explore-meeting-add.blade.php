@extends('admin.component.template')

@section('title', 'EcoTrip Meeting Point')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">EcoExplore</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Meeting Point</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('adminExploreMeetingAddMethod') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Title ..." required>
                    @error('title')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <input type="text" class="form-control" name="description" placeholder="Description ..." required>
                    @error('description')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Map Iframe <b>(Copy HTML dari fitur "Embed Map" / "Sematkan Peta" di Google Maps)</b></label>
                    <input type="text" class="form-control" name="map" placeholder="Map Iframe ..." required>
                    @error('map')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                </div>
                <button type="submit" id="submit" class="btn btn-primary float-right">Tambah</button>
                <a href="{{ route('adminExploreMeeting') }}" class="btn btn-info float-right mr-3">Kembali</a>
            </form>
        </div>
    </div>
@endsection

@section('page-script')
@endsection
