@extends('user.component.user_template')

@section('title', 'EcoTrip')

@section('content')
    <section class="mt-12 mb-6">
        <div class="container mx-auto">
            <div class="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true, "prevNextButtons": false }'>
                @foreach ($carouselList as $carousel)
                <a href="{{ $carousel->link }}" class="carousel-cell w-full">
                    <img src="{{ asset('assets/user/images/carousel/'. $carousel->picture) }}" alt="Banner" class="w-full rounded-xl h-80 object-cover">
                </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Section Intro Ga jadi Dipakai -->
    <!-- <section class="py-6">
        <div class="container mx-auto">
            <div class="rounded-lg text-white px-12 py-8" style="background: linear-gradient(213deg, rgba(113, 152, 79, 0.50) 0%, rgba(0, 0, 0, 0.00) 100%), #134B40;">
                <h1 class="text-3xl font-bold mb-2">Apa itu Eco Trip?</h1>
                <p>
                    EcoTrip merupakan usaha berbasis digital yang bergerak dalam bidang online travel agent (OTA). Kehadiran EcoTrip berupaya sebagai pihak yang menjembatani para wisatawan dan pengelola tempat wisata untuk dapat saling berusaha menerapkan konsep ekowisata demi terciptanya pelestarian lingkungan alam dan tempat wisata yang berkelanjutan.
                </p>
            </div>
        </div>
    </section> -->

    <!-- White Version -->
    <!-- <section class="py-6">
        <div class="container mx-auto rounded-lg shadow-lg py-6 bg-[#FAFAFA]">
            <div class="flex flex-col gap-2 py-3 text-center mb-12">
                <h2 class="text-primary text-3xl font-bold">Pilih sesuai kebutuhanmu!</h2>
                <p>
                    EcoTrip menyediakan fasilitas yang berguna untuk kamu,
                </p>
            </div>
            <div class="flex justify-center items-center gap-16 flex-wrap">
                <a href="{{ route('wisataList') }}" class="flex justify-center items-center flex-col gap-5">
                    <img src="{{ asset('assets/user/images/homeEcoWisataIcon.svg') }}" alt="Eco Wisata" class="w-10">
                    <div class="text-lg">EcoWisata</div>
                </a>
                <a href="{{ route('exploreList') }}" class="flex justify-center items-center flex-col gap-5">
                    <img src="{{ asset('assets/user/images/homeEcoWisataIcon.svg') }}" alt="Eco Explore" class="w-10">
                    <div class="text-lg">EcoExplore</div>
                </a>
                <a href="#" class="flex justify-center items-center flex-col gap-5">
                    <img src="{{ asset('assets/user/images/homeEcoHotelIcon.svg') }}" alt="Eco Hotel" class="w-10">
                    <div class="text-lg">EcoHotel</div>
                </a>
                <a href="#" class="flex justify-center items-center flex-col gap-5">
                    <img src="{{ asset('assets/user/images/homeEcoInsightIcon.svg') }}" alt="Eco Insight" class="w-10">
                    <div class="text-lg">EcoInsight</div>
                </a>
                <a href="#" class="flex justify-center items-center flex-col gap-5">
                    <img src="{{ asset('assets/user/images/homeEcoWasteIcon.svg') }}" alt="Eco Waste" class="w-10">
                    <div class="text-lg">EcoWaste</div>
                </a>
            </div>
            <div class="px-6 py-4">
                <form action="#" class="flex justify-center items-center mt-6">
                    <div class="flex justify-center items-center gap-2 w-[600px] max-w-full rounded-2xl shadow-lg px-6 py-3 bg-white">
                        <input type="text" placeholder="Cari wisata ..." class="w-full text-lg outline-none pl-2">
                        <button><i class='bx bx-search font-bold text-lg text-primary transition rounded-xl px-4 py-1 hover:bg-primary hover:text-white'></i></button>
                    </div>
                </form>
            </div>
        </div>
    </section> -->

    <!-- Green Version -->
    <section class="py-6">
        <div class="container mx-auto rounded-lg shadow-lg py-6 bg-primary">
            <div class="flex flex-col gap-2 py-3 text-center mb-6">
                <h2 class="text-white text-3xl font-bold">Pilih sesuai kebutuhanmu!</h2>
                <p class="text-gray">
                    EcoTrip menyediakan fasilitas yang berguna untuk kamu,
                </p>
            </div>
            <div class="flex justify-center items-center gap-16 flex-wrap">
                <a href="{{ route('wisataList') }}" class="flex justify-center items-center flex-col gap-3">
                    <div class="flex items-center justify-center w-20 h-20 rounded-full bg-white">
                        <img src="{{ asset('assets/user/images/homeEcoWisataIcon.svg') }}" alt="Eco Wisata" class="w-10">
                    </div>
                    <div class="text-lg text-white">EcoWisata</div>
                </a>
                <a href="{{ route('exploreList') }}" class="flex justify-center items-center flex-col gap-3">
                    <div class="flex items-center justify-center w-20 h-20 rounded-full bg-white">
                        <img src="{{ asset('assets/user/images/homeEcoWisataIcon.svg') }}" alt="Eco Explore" class="w-10">
                    </div>
                    <div class="text-lg text-white">EcoExplore</div>
                </a>
                <a href="{{ route('wisataList') }}" class="flex justify-center items-center flex-col gap-3">
                    <div class="flex items-center justify-center w-20 h-20 rounded-full bg-white">
                        <img src="{{ asset('assets/user/images/homeEcoHotelIcon.svg') }}" alt="Eco Hotel" class="w-10">
                    </div>
                    <div class="text-lg text-white">EcoHotel</div>
                </a>
                <a href="{{ route('insightList') }}" class="flex justify-center items-center flex-col gap-3">
                    <div class="flex items-center justify-center w-20 h-20 rounded-full bg-white">
                        <img src="{{ asset('assets/user/images/homeEcoInsightIcon.svg') }}" alt="Eco Insight" class="w-10">
                    </div>
                    <div class="text-lg text-white">EcoInsight</div>
                </a>
                <a href="{{ route('viewWaste1') }}" class="flex justify-center items-center flex-col gap-3">
                    <div class="flex items-center justify-center w-20 h-20 rounded-full bg-white">
                        <img src="{{ asset('assets/user/images/homeEcoWasteIcon.svg') }}" alt="Eco Waste" class="w-10">
                    </div>
                    <div class="text-lg text-white">EcoWaste</div>
                </a>
            </div>
            <div class="px-6 py-4">
                <form action="#" class="flex justify-center items-center mt-6">
                    <div class="flex justify-center items-center gap-2 w-[600px] max-w-full rounded-2xl shadow-lg px-6 py-3 bg-white">
                        <input type="text" placeholder="Cari wisata ..." class="w-full text-lg outline-none pl-2">
                        <button><i class='bx bx-search font-bold text-lg text-primary transition rounded-xl px-4 py-1 hover:bg-primary hover:text-white'></i></button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="py-6">
        <div class="container mx-auto">
            <div class="flex justify-between items-end py-3">
                <div>
                    <h2 class="text-4xl text-primary font-bold">EcoExplore</h2>
                    <p class="text-sm text-gray mb-1">
                        Jelajahi destinasi wisata dengan pilihan open trip atau private trip sekarang!
                    </p>
                </div>
                <a href="#" class="hover:underline">Lihat semua <i class='bx bx-right-arrow-alt' ></i></a>
            </div>
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-12 my-3">
                <a href="#" class="transition hover:shadow-lg rounded-lg group">
                    <img src="{{ asset('assets/user/images/homeExplore1.png') }}" alt="Explore" class="w-full h-48 object-cover rounded-lg">
                    <div class="py-3 transition-all group-hover:px-4">
                        <div class="flex justify-between items-center">
                            <div class="flex justify-center items-center text-gray gap-4">
                                <div class="rounded-full py-1.5 px-3 bg-primary/5 text-primary text-sm">Open Trip</div>
                                <div><i class='bx bxs-star' ></i> 4.5</div>
                            </div>
                            <div class="text-gray">Malang, Jawa Timur</div>
                        </div>
                        <h3 class="text-xl font-bold mt-3">Coban Rondo</h3>
                        <p class="mb-2 text-sm">Mulai dari <strong class="text-base">Rp 15.000</strong></p>
                    </div>
                </a>
                <a href="#" class="transition hover:shadow-lg rounded-lg group">
                    <img src="{{ asset('assets/user/images/homeExplore2.png') }}" alt="Explore" class="w-full h-48 object-cover rounded-lg">
                    <div class="py-3 transition-all group-hover:px-4">
                        <div class="flex justify-between items-center">
                            <div class="flex justify-center items-center text-gray gap-4">
                                <div class="rounded-full py-1.5 px-3 bg-primary/5 text-primary text-sm">Open Trip</div>
                                <div><i class='bx bxs-star' ></i> 4.5</div>
                            </div>
                            <div class="text-gray">Malang, Jawa Timur</div>
                        </div>
                        <h3 class="text-xl font-bold mt-3">One Day Trip Bromo Tengger Semeru</h3>
                        <p class="mb-2 text-sm">Mulai dari <strong class="text-base">Rp 15.000</strong></p>
                    </div>
                </a>
                <a href="#" class="transition hover:shadow-lg rounded-lg group">
                    <img src="{{ asset('assets/user/images/homeExplore3.png') }}" alt="Explore" class="w-full h-48 object-cover rounded-lg">
                    <div class="py-3 transition-all group-hover:px-4">
                        <div class="flex justify-between items-center">
                            <div class="flex justify-center items-center text-gray gap-4">
                                <div class="rounded-full py-1.5 px-3 bg-primary/5 text-primary text-sm">Open Trip</div>
                                <div><i class='bx bxs-star' ></i> 4.5</div>
                            </div>
                            <div class="text-gray">Malang, Jawa Timur</div>
                        </div>
                        <h3 class="text-xl font-bold mt-3">One Day Trip Batu Malang</h3>
                        <p class="mb-2 text-sm">Mulai dari <strong class="text-base">Rp 15.000</strong></p>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <section class="py-6">
        <div class="container mx-auto">
            <div class="flex justify-between items-end py-3">
                <div>
                    <h2 class="text-4xl text-primary font-bold">Artikel Terkini</h2>
                    <p class="text-sm text-gray mb-1">
                        Ketahui informasi terkini melalui artikel dibawah ini!
                    </p>
                </div>
                <a href="#" class="hover:underline">Lihat semua <i class='bx bx-right-arrow-alt' ></i></a>
            </div>
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-12 my-3">
                <a href="#" class="group">
                    <img src="{{ asset('assets/user/images/homeArtikel1.png') }}" alt="Explore" class="w-full h-48 object-cover rounded-lg">
                    <div class="py-3">
                        <h3 class="text-xl mt-3 group-hover:underline text-ellipsis overflow-hidden" style="display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;">Pentingnya Peran Ekowisata Untuk Keberlanjutan Pariwisata di Indonesia</h3>
                    </div>
                </a>
                <a href="#" class="group">
                    <img src="{{ asset('assets/user/images/homeArtikel2.png') }}" alt="Explore" class="w-full h-48 object-cover rounded-lg">
                    <div class="py-3">
                        <h3 class="text-xl mt-3 group-hover:underline text-ellipsis overflow-hidden" style="display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;">Eco Hotel sudah ada di Malang loh! 5 rekomendasi Eco Hotel cocok bagi kamu para traveler yang aware terhadap keberlanjutan lingkungan</h3>
                    </div>
                </a>
                <a href="#" class="group">
                    <img src="{{ asset('assets/user/images/homeArtikel3.png') }}" alt="Explore" class="w-full h-48 object-cover rounded-lg">
                    <div class="py-3">
                        <h3 class="text-xl mt-3 group-hover:underline text-ellipsis overflow-hidden" style="display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;">Rekomendasi tempat ekowisata di Malang raya</h3>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <section class="py-16 my-6">
        <div class="container mx-auto">
            <div class="flex justify-between items-center gap-12">
                <h2 class="text-4xl text-primary max-w-lg">EcoTrip Provide<br><strong>Best Ecotourism</strong><br>Experiences Trip</h2>
                <div class="grid grid-cols-3 gap-24 mx-auto">
                    <div class="flex justify-center items-center flex-col gap-2">
                        <img src="{{ asset('assets/user/images/homeEcoWisataIcon.svg') }}" alt="Icon" class="w-10">
                        <p class="text-center text-sm text-primary">Ecotourism<br>Experiences</p>
                    </div>
                    <div class="flex justify-center items-center flex-col gap-2">
                        <img src="{{ asset('assets/user/images/homeEcoHotelIcon.svg') }}" alt="Icon" class="w-10">
                        <p class="text-center text-sm text-primary">Safe<br>Transaction</p>
                    </div>
                    <div class="flex justify-center items-center flex-col gap-2">
                        <img src="{{ asset('assets/user/images/homeEcoInsightIcon.svg') }}" alt="Icon" class="w-10">
                        <p class="text-center text-sm text-primary">Easy Access<br>Anytime and Anywhere</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12">
        <div class="container mx-auto">
            <h2 class="text-center text-4xl font-bold mb-8 text-primary">Frequently Ask Question</h2>
            <ul class="w-[900px] max-w-full mx-auto">
                <li x-data="{ open: false }" class="mb-4">
                    <div class="cursor-pointer flex justify-between items-center px-8 py-4 rounded border border-gray/25 text-primary" @click="open = ! open">
                        <div class="text-xl">Apa itu EcoWisata?</div>
                        <div class="text-2xl"><i class='bx bx-chevron-down' ></i></div>
                    </div>
                    <p class="px-8 py-4" x-show="open">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem commodi, debitis delectus dolorum ducimus, eligendi est et illo ipsum labore nisi numquam perspiciatis quaerat quas quisquam sint vero, voluptate voluptatem.
                    </p>
                </li>
                <li x-data="{ open: false }" class="mb-4">
                    <div class="cursor-pointer flex justify-between items-center px-8 py-4 rounded border border-gray/25 text-primary" @click="open = ! open">
                        <div class="text-xl">Bagaimana Cara memesan EcoExplore?</div>
                        <div class="text-2xl"><i class='bx bx-chevron-down' ></i></div>
                    </div>
                    <p class="px-8 py-4" x-show="open">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Natus tempora nesciunt rerum enim asperiores laudantium maiores sed nihil, ratione officiis vitae provident doloribus commodi velit quibusdam beatae fuga eveniet debitis.
                    </p>
                </li>
                <li x-data="{ open: false }" class="mb-4">
                    <div class="cursor-pointer flex justify-between items-center px-8 py-4 rounded border border-gray/25 text-primary" @click="open = ! open">
                        <div class="text-xl">Apa itu EcoWisata?</div>
                        <div class="text-2xl"><i class='bx bx-chevron-down' ></i></div>
                    </div>
                    <p class="px-8 py-4" x-show="open">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cupiditate doloremque, corrupti dolore saepe exercitationem magnam quod optio perspiciatis dignissimos cumque nostrum atque odit explicabo, ab dolorum quia delectus at ea.
                    </p>
                </li>
            </ul>
            <div class="flex items-center justify-center">
                <a href="/faq" class="border border-primary px-12 py-2 rounded-full text-primary mt-5 transition hover:bg-primary hover:text-white">Lihat lebih banyak</a>
            </div>
        </div>
    </section>

    <section class="py-12">
        <div class="container mx-auto">
            <div class="px-24 py-16 rounded-lg h-96 flex justify-end items-start flex-col" style="background: linear-gradient(257deg, #3B9B88 -29.89%, rgba(59, 155, 136, 0.00) 106.79%), #134B40;">
                <h2 class="text-white text-5xl font-bold mb-4">#KiniSaatnyaBijakBerwisata</h2>
                <p class="text-white mb-6">Ecotourism is The Future of Indonesia’s Travel</p>
                <a href="#" class="rounded-full text-white border border-white px-6 py-2 transition hover:bg-white hover:text-primary">Tentang Kami</a>
            </div>
        </div>
    </section>

    <a href="https://wa.me/+6281246868369" target="_blank" class="fixed bottom-8 right-8 bg-[#00D95F] w-16 h-16 flex justify-center items-center rounded-full">
        <i class='bx bxl-whatsapp text-3xl text-white'></i>
    </a>
@endsection

@section('footExtention')
    
@endsection
