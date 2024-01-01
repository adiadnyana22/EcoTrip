@extends('admin.component.template')

@section('title', 'EcoTrip Wisata')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">EcoWisata</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail EcoWisata</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <img src="{{ asset('assets/user/images/wisata/'.$wisata->picture) }}" alt="EcoWisata" class="w-100" style="height: 500px; object-fit: cover">
                </div>
                <div class="col-lg-12 py-3">
                    <div class="row justify-content-center">
                        @foreach ($wisataImages as $image)
                            <div class="col-3">
                                <img src="{{ asset('assets/user/images/wisata/'.$image->picture) }}" alt="EcoWisata" class="w-100" style="height: 150px; object-fit: cover">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-12">
                    <h1 class="mb-3 mt-2 text-dark">{{ $wisata->name }}</h1>
                    <div class="row">
                        <div class="col-6">
                            <b>Rating</b> : {{ $wisata->rating }}
                        </div>
                        <div class="col-6">
                            <b>Order</b> : {{ $wisata->order }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <b>Local Weekday Price</b> : {{ $wisata->local_price }}
                        </div>
                        <div class="col-3">
                            <b>Local Weekend Price</b> : {{ $wisata->local_weekend_price }}
                        </div>
                        <div class="col-3">
                            <b>Foreign Weekday Price</b> : {{ $wisata->foreign_price }}
                        </div>
                        <div class="col-3">
                            <b>Fooreign Weekend Price</b> : {{ $wisata->foreign_weekend_price }}
                        </div>
                    </div>
                    <div>
                        <b>Location</b> : {{ $wisata->location }}
                    </div>
                    <div>
                        <div><b>Description :</b></div>
                        <p>
                            {{ $wisata->description }}
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div><b>Activity :</b></div>
                            <ul>
                                @foreach (explode(',', $wisata->activity) as $activity)
                                    <li>{{ trim($activity) }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-6">
                            <div><b>Include :</b></div>
                            <ul>
                                @foreach (explode(',', $wisata->includes) as $include)
                                    <li>{{ trim($include) }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('adminWisata') }}" class="btn btn-info float-right mr-3 mt-2">Kembali</a>
        </div>
    </div>
@endsection

@section('page-script')
@endsection
