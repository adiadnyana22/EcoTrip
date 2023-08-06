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
                    <img src="{{ asset('assets/user/images/explore/'.$explore->picture) }}" alt="Explore" class="w-full max-h-96 object-cover">
                    <div class="main-carousel mt-3" data-flickity='{ "cellAlign": "left", "contain": true, "pageDots": false }'>
                        @foreach($exploreImgList as $img)
                            <div class="carousel-cell w-2/5 mr-3 max-h-24 object-cover">
                                <img src="{{ asset('assets/user/images/explore/'.$img->picture) }}" alt="Banner" class="w-full rounded-xl max-h-24 object-cover">
                            </div>
                        @endforeach
                    </div>
                    <div class="pt-3 pb-6">
                        <h1 class="text-4xl font-bold my-8">{{ $explore->name }}</h1>
                        <div class="flex items-center gap-8">
                            <p class="text-gray font-bold">HARGA TIKET</p>
                            <div class="relative">
                                <img src="{{ asset('assets/user/images/lokal.png') }}" alt="Lokal" class="w-52">
                                <div class="absolute top-3 right-5 text-primary font-bold text-sm">Rp {{ number_format($explore->local_price) }}</div>
                            </div>
                            <div class="relative">
                                <img src="{{ asset('assets/user/images/asing.png') }}" alt="Asing" class="w-52">
                                <div class="absolute top-3 right-5 text-blue font-bold text-sm">Rp {{ number_format($explore->foreign_price) }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="py-6">
                        <ul class="flex items-center gap-6">
                            <li><div id="btnDeskripsi" class="cursor-pointer">Deskripsi<hr class="w-4/5 mx-auto mt-1"></div></li>
                            <li><div id="btnItinerary" class="text-gray cursor-pointer">Itinerary<hr class="w-0 mx-auto mt-1"></div></li>
                        </ul>
                        <div id="deskripsi">
                            <div class="pt-6 pb-2">
                                <h2 class="mb-3 font-bold text-gray">DESKRIPSI TEMPAT WISATA</h2>
                                <p class="text-justify mb-2">
                                    {{ $explore->description }}
                                </p>
                            </div>
                            <div class="pt-6 pb-2">
                                <h2 class="mb-3 font-bold text-gray">AKTIVITAS</h2>
                                <ul class="flex flex-wrap gap-x-8 gap-y-5 my-5">
                                    @foreach(explode(',', $explore->activity) as $activity)
                                        <li class="flex gap-2"><i class='bx bx-check text-primary bg-primary/5 p-1.5 rounded-full'></i> {{ trim($activity) }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="pt-6 pb-2">
                                <h2 class="mb-3 font-bold text-gray">AKTIVITAS</h2>
                                <ul class="my-5 flex flex-col gap-3">
                                    @foreach(explode(',', $explore->includes) as $includes)
                                        <li class="rounded border-l-4 border-l-primary border-r border-r-gray border-t border-t-gray/25 border-b border-b-gray px-6 py-3"> {{ trim($includes) }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div id="itinerary" style="display: none">
                            <div class="pt-6 pb-2">
                                <h2 class="mb-3 font-bold text-gray">ITINERARY</h2>
                                <ul class="flex my-5 flex-col gap-3 relative">
                                    @foreach(explode(',', $explore->itinerary) as $itinerary)
                                    <li class="flex gap-4 items-center"><i class='bx bx-radio-circle-marked text-secondary text-3xl'></i> {{ $itinerary }}</li>
                                    @endforeach
                                    <div class="absolute left-3.5 top-4 border-l-2 border-secondary" style="height: calc(100% - 2rem)"></div>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="basis-2/5" x-data="{ count: 1, price: @json($explore->local_price) }">
                    <div class="p-8 w-full shadow-lg rounded-xl sticky top-8">
                        <p class="text-gray">PEMBELIAN TIKET</p>
                        <h2 class="font-bold text-2xl my-2">{{ $explore->name }}</h2>
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
    <script>
        let btnDeskripsi = document.querySelector("#btnDeskripsi");
        let btnItinerary = document.querySelector("#btnItinerary");
        let deskripsi = document.querySelector("#deskripsi");
        let itinerary = document.querySelector("#itinerary");

        btnDeskripsi.addEventListener('click', () => {
            deskripsi.style.display = "block";
            itinerary.style.display = "none";
            document.querySelector("#btnDeskripsi").classList.remove("text-gray");
            document.querySelector("#btnDeskripsi hr").classList.add("w-4/5");
            document.querySelector("#btnDeskripsi hr").classList.remove("w-0");
            document.querySelector("#btnItinerary").classList.add("text-gray");
            document.querySelector("#btnItinerary hr").classList.remove("w-4/5");
            document.querySelector("#btnItinerary hr").classList.add("w-0");
        });

        btnItinerary.addEventListener('click', () => {
            deskripsi.style.display = "none";
            itinerary.style.display = "block";
            document.querySelector("#btnDeskripsi").classList.add("text-gray");
            document.querySelector("#btnDeskripsi hr").classList.remove("w-4/5");
            document.querySelector("#btnDeskripsi hr").classList.add("w-0");
            document.querySelector("#btnItinerary").classList.remove("text-gray");
            document.querySelector("#btnItinerary hr").classList.add("w-4/5");
            document.querySelector("#btnItinerary hr").classList.remove("w-0");
        });
    </script>
@endsection
