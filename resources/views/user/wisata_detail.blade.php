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
                    <img src="{{ asset('assets/user/images/homeExplore1.png') }}" alt="Wisata" class="w-full max-h-96 object-cover">
                    <div class="main-carousel mt-3" data-flickity='{ "cellAlign": "left", "contain": true, "pageDots": false }'>
                        <div class="carousel-cell w-2/5 mr-3 max-h-24 object-cover">
                            <img src="{{ asset('assets/user/images/homeExplore1.png') }}" alt="Banner" class="w-full rounded-xl max-h-24 object-cover">
                        </div>
                        <div class="carousel-cell w-2/5 mr-3 max-h-24 object-cover">
                            <img src="{{ asset('assets/user/images/homeExplore1.png') }}" alt="Banner" class="w-full rounded-xl max-h-24 object-cover">
                        </div>
                        <div class="carousel-cell w-2/5 mr-3 max-h-24 object-cover">
                            <img src="{{ asset('assets/user/images/homeExplore1.png') }}" alt="Banner" class="w-full rounded-xl max-h-24 object-cover">
                        </div>
                        <div class="carousel-cell w-2/5 mr-3 max-h-24 object-cover">
                            <img src="{{ asset('assets/user/images/homeExplore1.png') }}" alt="Banner" class="w-full rounded-xl max-h-24 object-cover">
                        </div>
                    </div>
                    <div class="pt-3 pb-6">
                        <h1 class="text-4xl font-bold my-8">Wisata Coban Rondo</h1>
                        <div class="flex items-center gap-8">
                            <p class="text-gray font-bold">HARGA TIKET</p>
                            <div class="relative">
                                <img src="{{ asset('assets/user/images/lokal.png') }}" alt="Lokal" class="w-52">
                                <div class="absolute top-2 right-4 text-primary font-bold">Rp 15.000</div>
                            </div>
                            <div class="relative">
                                <img src="{{ asset('assets/user/images/asing.png') }}" alt="Asing" class="w-52">
                                <div class="absolute top-2 right-4 text-blue font-bold">Rp 25.000</div>
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
                                    Panas-panas gini enak nya nyobain suasana dingin dan sejuk nihh, yuk cobain vibes air terjun coban rondo bersama Eco Trip.
                                </p>
                                <p class="text-justify mb-2">
                                    Coban Rondo merupakan salah satu destinasi yang wajib dikunjungi ketika kalian sedang berada di Malang. Air terjun yang memiliki ketinggian sekitar 84 meter dan lokasi air terjun berada pada ketinggian 1.134 meter di atas permukaan laut merupakan air terjun yang terletak di di Desa Pandesari, Kecamatan Pujon, Kabupaten Malang, Jawa Timur.
                                </p>
                                <p class="text-justify mb-2">
                                    Saat berkunjung kesini kalian akan disuguhkan dengan keindahan alam yang menyejukkan mata dengan pemandangan panorama air terjun yang turun dari tebing dan juga banyak aktivitas seru lainnya yang bisa kalian nikmati .
                                </p>
                            </div>
                            <div class="pt-6 pb-2">
                                <h2 class="mb-3 font-bold text-gray">DESKRIPSI TEMPAT WISATA</h2>
                                <p class="text-justify mb-2">
                                    Jalan-jalan di Jawa Timur belum lengkap rasanya kalau belum menikmati keindahan tempat wisata alamnya. Salah satunya adalah wisata ke pantai-pantai cantiknya! Tersedia banyak pilihan paket dengan durasi, jam keberangkatan, serta lokasi kunjungan yang bervariasi. Jadi, tinggal kamu sesuaikan saja dengan waktu jalan-jalanmu!
                                </p>
                            </div>
                            <div class="pt-6 pb-2">
                                <h2 class="mb-3 font-bold text-gray">AKTIVITAS</h2>
                                <ul class="flex flex-wrap gap-x-8 gap-y-5 my-5">
                                    <li class="flex gap-2"><i class='bx bx-check text-primary bg-primary/5 p-1.5 rounded-full'></i> Bermain Air</li>
                                    <li class="flex gap-2"><i class='bx bx-check text-primary bg-primary/5 p-1.5 rounded-full'></i> EcoKit</li>
                                    <li class="flex gap-2"><i class='bx bx-check text-primary bg-primary/5 p-1.5 rounded-full'></i> Taman Labirin</li>
                                    <li class="flex gap-2"><i class='bx bx-check text-primary bg-primary/5 p-1.5 rounded-full'></i> Tiket Masuk</li>
                                    <li class="flex gap-2"><i class='bx bx-check text-primary bg-primary/5 p-1.5 rounded-full'></i> Shooting Target</li>
                                    <li class="flex gap-2"><i class='bx bx-check text-primary bg-primary/5 p-1.5 rounded-full'></i> Bersepeda</li>
                                </ul>
                            </div>
                            <div class="pt-6 pb-2">
                                <h2 class="mb-3 font-bold text-gray">AKTIVITAS</h2>
                                <ul class="my-5 flex flex-col gap-3">
                                    <li class="rounded border-l-4 border-l-primary border-r border-r-gray border-t border-t-gray/25 border-b border-b-gray px-6 py-3">Akses ke fasilitas umum yang tersedia</li>
                                    <li class="rounded border-l-4 border-l-primary border-r border-r-gray border-t border-t-gray/25 border-b border-b-gray px-6 py-3">Tiket masuk Air Terjun Coban Rondo</li>
                                    <li class="rounded border-l-4 border-l-primary border-r border-r-gray border-t border-t-gray/25 border-b border-b-gray px-6 py-3">EcoKit</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="basis-2/5">
                    <div class="p-8 w-full shadow-lg rounded-xl sticky top-8">
                        <p class="text-gray">PEMBELIAN TIKET</p>
                        <h2 class="font-bold text-2xl my-2">Wisata Coban Rondo</h2>
                        <div class="flex justify-between flex-wrap items-center my-5">
                            <label for="#">Pilih Tanggal</label>
                            <input type="date" class="py-2 px-4 rounded border border-gray">
                        </div>
                        <div class="flex justify-between flex-wrap items-center my-5">
                            <label for="#">Jumlah Peserta</label>
                            <div class="flex items-center gap-2">
                                <button type="button" class="py-1 px-3 bg-black rounded text-white text-xl">-</button>
                                <input type="number" value="1" class="w-12 text-center outline-none text-xl">
                                <button type="button" class="py-1 px-3 bg-black rounded text-white text-xl">+</button>
                            </div>
                        </div>
                        <div class="py-5 flex justify-between items-center">
                            <div class="text-gray text-xl font-bold">TOTAL HARGA</div>
                            <strong class="font-bold text-2xl">Rp 100.000</strong>
                        </div>
                        <button class="w-full px-4 py-3 mt-2 rounded-xl bg-primary text-white">Pesan Sekarang</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
