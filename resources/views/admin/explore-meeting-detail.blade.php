@extends('admin.component.template')

@section('title', 'EcoTrip Meeting Point')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">EcoExplore</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Meeting Point</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    {!! $point->mapIframe !!}
                </div>
                <div class="px-3 py-4">
                    <h2>{{ $point->title }}</h2>
                    <p>
                        {{ $point->description }}
                    </p>
                </div>
            </div>
            <a href="{{ route('adminExploreMeeting') }}" class="btn btn-info float-right mr-3 mt-2">Kembali</a>
        </div>
    </div>
@endsection

@section('page-script')
@endsection
