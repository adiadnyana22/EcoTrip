@extends('user.component.user_template')

@section('title', 'EcoTrip')

@section('headExtention')
    <style>
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .flickity-button {
            background: #000 !important;
            outline: none;
        }
        .flickity-button:hover {
            background: #1a202c;
        }

        .flickity-prev-next-button {
            width: 30px;
            height: 30px;
            border-radius: 5px;
        }

        .flickity-button-icon {
            fill: white;
        }

        .flickity-prev-next-button.previous {
            left: 20px;
        }
        .flickity-prev-next-button.next {
            right: 20px;
        }
    </style>
@endsection

@section('content')
    <section class="py-12">
        <div class="container mx-auto">
            <div class="flex gap-12">
                <div class="basis-3/5">
                    <img src="{{ asset('assets/user/images/wisata/'.$wisata->picture) }}" alt="Wisata" class="w-full max-h-96 object-cover">
                    <div class="main-carousel mt-3" data-flickity='{ "cellAlign": "left", "contain": true, "pageDots": false }'>
                        @foreach($wisataImgList as $img)
                        <div class="carousel-cell w-2/5 mr-3 max-h-24 object-cover">
                            <img src="{{ asset('assets/user/images/wisata/'.$img->picture) }}" alt="Banner" class="w-full rounded-xl max-h-24 object-cover">
                        </div>
                        @endforeach
                    </div>
                    <div class="pt-3 pb-6">
                        <h1 class="text-4xl font-bold my-8">{{ $wisata->name }}</h1>
                        <div class="flex items-center gap-8">
                            <p class="text-gray font-bold">HARGA TIKET</p>
                            <div class="relative">
                                <img src="{{ asset('assets/user/images/lokal.png') }}" alt="Lokal" class="w-52">
                                <div class="absolute top-3 right-4 text-primary font-bold text-sm">Rp {{ number_format($wisata->local_price) }}</div>
                            </div>
                            <div class="relative">
                                <img src="{{ asset('assets/user/images/asing.png') }}" alt="Asing" class="w-52">
                                <div class="absolute top-3 right-4 text-blue font-bold text-sm">Rp {{ number_format($wisata->foreign_price) }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="py-6">
                        <ul class="flex items-center gap-6">
                            <li><div id="btnDeskripsi" class="cursor-pointer">Deskripsi<hr class="w-4/5 mx-auto mt-1"></div></li>
                        </ul>
                        <div id="deskripsi">
                            <div class="pt-6 pb-2">
                                <h2 class="mb-3 font-bold text-gray">DESKRIPSI TEMPAT WISATA</h2>
                                <p class="text-justify mb-2">
                                    {{ $wisata->description }}
                                </p>
                            </div>
                            <div class="pt-6 pb-2">
                                <h2 class="mb-3 font-bold text-gray">AKTIVITAS</h2>
                                <ul class="flex flex-wrap gap-x-8 gap-y-5 my-5">
                                    @foreach(explode(',', $wisata->activity) as $activity)
                                    <li class="flex gap-2"><i class='bx bx-check text-primary bg-primary/5 p-1.5 rounded-full'></i> {{ trim($activity) }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="pt-6 pb-2">
                                <h2 class="mb-3 font-bold text-gray">TIKET SUDAH TERMASUK</h2>
                                <ul class="my-5 flex flex-col gap-3">
                                    @foreach(explode(',', $wisata->includes) as $includes)
                                    <li class="rounded border-l-4 border-l-primary border-r border-r-gray border-t border-t-gray/25 border-b border-b-gray px-6 py-3"> {{ trim($includes) }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="basis-2/5" x-data="{ count: 1, price: @json($wisata->local_price) }">
                    <div class="p-8 w-full shadow-lg rounded-xl sticky top-8">
                        <p class="text-gray">PEMBELIAN TIKET</p>
                        <h2 class="font-bold text-2xl my-2">{{ $wisata->name }}</h2>
                        <div class="flex justify-between flex-wrap items-center my-5">
                            <label for="#">Pilih Tanggal</label>
                            <input type="date" class="py-2 px-4 rounded border border-gray">
                        </div>
                        <div class="flex justify-between flex-wrap items-center my-5">
                            <label for="#">Jumlah Peserta</label>
                            <div class="flex items-center gap-2">
                                <button type="button" class="py-1 px-3 bg-black rounded text-white text-xl" x-on:click="count = Math.max(count - 1, 1)">-</button>
                                <input type="number" x-model="count" class="w-12 text-center outline-none text-xl">
                                <button type="button" class="py-1 px-3 bg-black rounded text-white text-xl" x-on:click="count = Math.min(count + 1, 10)">+</button>
                            </div>
                        </div>
                        <div class="py-5 flex justify-between items-center">
                            <div class="text-gray text-xl font-bold">TOTAL HARGA</div>
                            <strong class="font-bold text-2xl">Rp <span x-text="new Intl.NumberFormat('en-ID').format(count * price)"></span></strong>
                        </div>
                        <button class="w-full px-4 py-3 mt-2 rounded-xl bg-primary text-white">Pesan Sekarang</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footExtention')
    <script src="//unpkg.com/alpinejs" defer></script>
@endsection
