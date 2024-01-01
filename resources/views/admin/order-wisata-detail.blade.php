@extends('admin.component.template')

@section('title', 'EcoTrip Order Wisata')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Order Wisata</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Order Wisata</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="mb-3 mt-2 text-dark">{{ $order->kode_tiket }}</h1>
                    <h3>{{ date("d/m/Y H:i:s", strtotime($order->created_at)) }}</h3>
                    <div class="row py-3">
                        <div class="col-6">
                            <b>Wisata Name</b> : {{ $order->wisata->name }}
                        </div>
                        <div class="col-6">
                            <b>Account Email</b> : {{ $order->user->email }}
                        </div>
                        <div class="col-6">
                            <b>Ticket Date</b> : {{ date("d/m/Y", strtotime($order->date)) }}
                        </div>
                    </div>
                    <div class="py-2">
                        <h4>Data Diri Pemesan</h4>
                        <div class="row">
                            @php
                                $count = 0;
                            @endphp
                            @foreach ($order->customer as $customer)
                                <div class="col-6">
                                    <div><b>Pemesan {{ ++$count }} :</b></div>
                                    <ul>
                                        <li>Name : {{ $customer->name }}</li>
                                        <li>Email : {!! $count == 1 ? $customer->email.' <b>(Email pemesanan dikirim kesini)</b>' : $customer->email !!}</li>
                                        <li>Gender : {{ $customer->gender }}</li>
                                        <li>Phone Number : {{ $customer->telp }}</li>
                                        <li>Nationality : {{ $customer->nationality == 0 ? 'Indonesia' : 'Foreign' }}</li>
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-12">
                            <div class="mb-2">
                                <b>Qty Total Ticket</b> : {{ $order->qty }}
                            </div>
                            <div class="mb-2">
                                <b>Qty Local Ticket</b> : {{ $order->qty_indonesia }} x {{ Carbon\Carbon::parse($order->date)->isWeekend() ? number_format($order->wisata->local_weekend_price) : number_format($order->wisata->local_price) }}
                            </div>
                            <div class="mb-2">
                                <b>Qty Foreign Ticket</b> : {{ $order->qty_foreign }} x {{ Carbon\Carbon::parse($order->date)->isWeekend() ? number_format($order->wisata->foreign_weekend_price) : number_format($order->wisata->foreign_price) }}
                            </div>
                            <div class="mb-2">
                                <b>Total Ticket Price</b> : {{ number_format($order->total_ticket_price) }}
                            </div>
                            <div class="mb-2">
                                <b>Coin Use</b> : - {{ number_format($order->coin) }}
                            </div>
                            <div class="mb-2">
                                <b>Voucher Use</b> : - {{ number_format($order->voucher_nominal) }}
                            </div>
                            <div class="mb-2">
                                <b>Unique Code</b> : {{ number_format($order->unique_code) }}
                            </div>
                            <div class="mb-2 h2 text-dark">
                                <b>Grand Total</b> : {{ number_format($order->grand_total_price) }}
                            </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        @if ($order->status_code == 1 && Carbon\Carbon::parse($order->date)->lt(Carbon\Carbon::today()))
                        <div class="text-white h1 bg-danger text-center ">Tanggal pada tiket sudah lewat (Expired)</div>
                        @elseif ($order->status_code == 1)
                        <form action="{{ route('adminOrderWisataConfirmMethod', $order->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <button class="btn btn-primary px-5 py-2"><strong>Konfirmasi Pesanan</strong></button>
                        </form>
                        @else
                        <div class="text-white h1 bg-primary text-center ">TRANSACTION VERIFIED</div>
                        @endif
                    </div>
                </div>
            </div>
            <a href="{{ route('adminOrderWisata') }}" class="btn btn-info float-right mr-3 mt-2">Kembali</a>
        </div>
    </div>
@endsection

@section('page-script')
@endsection
