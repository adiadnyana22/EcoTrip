@extends('admin.component.template')

@section('title', 'EcoTrip EcoWaste')

@section('page-style')
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"
    />
@endsection

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">EcoWaste</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail EcoWaste</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="mb-3 mt-2 text-dark">{{ $order->kode_tiket }}</h1>
                    <h3>{{ date("d/m/Y H:i:s", strtotime($order->created_at)) }}</h3>
                    <div class="row py-3">
                        <div class="col-6">
                            <b>Product Type</b> : {{ $waste->order_type == 'E' ? 'Explore' : 'Wisata' }}
                        </div>
                        <div class="col-6">
                            <b>Account Email</b> : {{ $waste->user->email }}
                        </div>

                        @if ($waste->order_type == 'W')
                        <div class="col-6">
                            <b>Product Name</b> : {{ $order->wisata->name }}
                        </div>
                        @elseif ($waste->order_type == 'E')
                        <div class="col-6">
                            <b>Product Name</b> : {{ $order->explore->type == 0 ? $order->explore->name.' (Private Trip)' : $order->explore->name.' (Open Trip)' }}
                        </div>
                        @endif

                        @if ($waste->order_type == 'E')
                            <div class="col-6">
                                <b>Meeting Point</b> : {{ $order->meeting->title }}
                            </div>
                        @endif
                        <div class="col-6">
                            <b>Ticket Date</b> : {{ date("d/m/Y", strtotime($order->date)) }}
                        </div>
                    </div>
                    <div class="mt-3">
                        <div>
                            <b>Qty Ticket</b> : {{ $order->qty }}
                        </div>
                        <div>
                            <b>Grand Total</b> : {{ number_format($order->grand_total_price) }}
                        </div>
                    </div>
                    <div class="row justify-content-center mt-5 mb-2">
                        @foreach ($wasteImages as $image)
                            <a data-src="{{ asset('assets/admin/images/waste/'.$image->image) }}" data-fancybox="gallery" class="col-3">
                                <img src="{{ asset('assets/admin/images/waste/'.$image->image) }}" alt="EcoWaste" class="w-100" style="height: 150px; object-fit: cover; cursor: pointer; border: 1px solid #1f1f1f; border-radius: 1rem">
                            </a>
                        @endforeach
                    </div>
                    <div class="mt-4">
                        @if ($waste->status_code == 1)
                        <form action="{{ route('adminWasteConfirmMethod', $waste->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Coin</label>
                                <input type="number" class="form-control" name="coin" value="{{ old('coin') }}" placeholder="Coin ..." required>
                                @error('coin')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                            </div>
                            <button class="btn btn-primary px-5 py-2"><strong>Konfirmasi EcoWaste</strong></button>
                        </form>
                        @else
                        <div class="text-white h1 bg-primary text-center ">ECOWASTE VERIFIED</div>
                        @endif
                    </div>
                </div>
            </div>
            <a href="{{ route('adminWaste') }}" class="btn btn-info float-right mr-3 mt-2">Kembali</a>
        </div>
    </div>
@endsection

@section('page-script')
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script>
        Fancybox.bind('[data-fancybox="gallery"]', {

        });
    </script>
@endsection
