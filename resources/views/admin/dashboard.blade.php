@extends('admin.component.template')

@section('title', 'EcoTrip Dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Card Example -->
        <div class="col-xl-4 col-md-12 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Pending EcoWaste
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pendingEcoWaste }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-hand-sparkles fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Pending Pesanan EcoWisata
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pendingEcoWisata }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-mountain fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pending Pesanan EcoExplore
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pendingEcoExplore }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-umbrella-beach fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
@endsection
