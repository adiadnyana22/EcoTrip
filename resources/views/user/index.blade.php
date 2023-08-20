@extends('user.component.user_template')

@section('title', 'EcoTrip')

@section('content')
    <section class="mt-12 mb-6">
        <div class="container mx-auto">
            <div class="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true, "prevNextButtons": false }'>
                <div class="carousel-cell">
                    <img src="{{ asset('assets/user/images/homeBanner.png') }}" alt="Banner" class="w-full rounded-xl">
                </div>
                <div class="carousel-cell">
                    <img src="{{ asset('assets/user/images/homeBanner.png') }}" alt="Banner" class="w-full rounded-xl">
                </div>
                <div class="carousel-cell">
                    <img src="{{ asset('assets/user/images/homeBanner.png') }}" alt="Banner" class="w-full rounded-xl">
                </div>
                <div class="carousel-cell">
                    <img src="{{ asset('assets/user/images/homeBanner.png') }}" alt="Banner" class="w-full rounded-xl">
                </div>
            </div>
        </div>
    </section>

    <section class="py-6">
        <div class="container mx-auto">
            <div class="rounded-lg text-white px-12 py-8" style="background: linear-gradient(213deg, rgba(113, 152, 79, 0.50) 0%, rgba(0, 0, 0, 0.00) 100%), #134B40;">
                <h1 class="text-3xl font-bold mb-2">Apa itu Eco Trip?</h1>
                <p>
                    EcoTrip merupakan usaha berbasis digital yang bergerak dalam bidang online travel agent (OTA). Kehadiran EcoTrip berupaya sebagai pihak yang menjembatani para wisatawan dan pengelola tempat wisata untuk dapat saling berusaha menerapkan konsep ekowisata demi terciptanya pelestarian lingkungan alam dan tempat wisata yang berkelanjutan.
                </p>
            </div>
        </div>
    </section>

    <section class="py-6">
        <div class="container mx-auto">
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
                <a href="#">Lihat semua <i class='bx bx-right-arrow-alt' ></i></a>
            </div>
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-12 my-3">
                <a href="#">
                    <img src="{{ asset('assets/user/images/homeExplore1.png') }}" alt="Explore" class="w-full h-48 object-cover rounded-lg">
                    <div class="py-3">
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
                <a href="#">
                    <img src="{{ asset('assets/user/images/homeExplore2.png') }}" alt="Explore" class="w-full h-48 object-cover rounded-lg">
                    <div class="py-3">
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
                <a href="#">
                    <img src="{{ asset('assets/user/images/homeExplore3.png') }}" alt="Explore" class="w-full h-48 object-cover rounded-lg">
                    <div class="py-3">
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
                <a href="#">Lihat semua <i class='bx bx-right-arrow-alt' ></i></a>
            </div>
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-12 my-3">
                <a href="#">
                    <img src="{{ asset('assets/user/images/homeArtikel1.png') }}" alt="Explore" class="w-full h-48 object-cover rounded-lg">
                    <div class="py-3">
                        <h3 class="text-xl mt-3">Pentingnya Peran Ekowisata Untuk Keberlanjutan Pariwisata di Indonesia</h3>
                    </div>
                </a>
                <a href="#">
                    <img src="{{ asset('assets/user/images/homeArtikel2.png') }}" alt="Explore" class="w-full h-48 object-cover rounded-lg">
                    <div class="py-3">
                        <h3 class="text-xl mt-3 text-ellipsis overflow-hidden" style="display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;">Eco Hotel sudah ada di Malang loh! 5 rekomendasi Eco Hotel cocok bagi kamu para traveler yang aware terhadap keberlanjutan lingkungan</h3>
                    </div>
                </a>
                <a href="#">
                    <img src="{{ asset('assets/user/images/homeArtikel3.png') }}" alt="Explore" class="w-full h-48 object-cover rounded-lg">
                    <div class="py-3">
                        <h3 class="text-xl mt-3">Rekomendasi tempat ekowisata di Malang raya</h3>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <section class="py-12">
        <div class="container mx-auto">
            <div class="flex justify-between items-center gap-12">
                <h2 class="text-4xl">EcoTrip Provide<br><strong>Best Ecotourism</strong><br>Experiences Trip</h2>
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
            <h2 class="text-center text-5xl font-bold mb-4">FAQ</h2>
            <ul>
                <li x-data="{ open: false }">
                    <div class="cursor-pointer flex justify-between items-center px-8 py-4 bg-gray border border-black" @click="open = ! open">
                        <div class="text-xl">Apa itu EcoWisata?</div>
                        <div class="text-2xl"><i class='bx bx-chevron-down' ></i></div>
                    </div>
                    <div class="bg-gray/25 px-8 py-4" x-show="open">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem commodi, debitis delectus dolorum ducimus, eligendi est et illo ipsum labore nisi numquam perspiciatis quaerat quas quisquam sint vero, voluptate voluptatem.
                    </div>
                </li>
                <li x-data="{ open: false }">
                    <div class="cursor-pointer flex justify-between items-center px-8 py-4 bg-gray border border-black" @click="open = ! open">
                        <div class="text-xl">Bagaimana Cara memesan EcoExplore?</div>
                        <div class="text-2xl"><i class='bx bx-chevron-down' ></i></div>
                    </div>
                    <div class="bg-gray/25 px-8 py-4" x-show="open">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus alias consequatur deserunt, esse laboriosam quisquam vero? A ab culpa debitis dicta doloremque doloribus eveniet, explicabo ipsum mollitia officia quaerat vero?
                    </div>
                </li>
                <li x-data="{ open: false }">
                    <div class="cursor-pointer flex justify-between items-center px-8 py-4 bg-gray border border-black" @click="open = ! open">
                        <div class="text-xl">Apa itu EcoWisata?</div>
                        <div class="text-2xl"><i class='bx bx-chevron-down' ></i></div>
                    </div>
                    <div class="bg-gray/25 px-8 py-4" x-show="open">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, aspernatur consequatur delectus distinctio dolores facilis minima necessitatibus nihil perferendis placeat porro similique soluta vitae. Culpa deleniti expedita labore recusandae soluta!
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <section class="py-12">
        <div class="container mx-auto">
            <div class="px-24 py-16 rounded-lg h-96 flex justify-end flex-col" style="background: linear-gradient(213deg, rgba(113, 152, 79, 0.50) 0%, rgba(0, 0, 0, 0.00) 100%), #134B40;">
                <h2 class="text-white text-5xl font-bold mb-4">#KiniSaatnyaBijakBerwisata</h2>
                <p class="text-white mb-6">Ecotourism is The Future of Indonesia’s Travel</p>
                <ul class="list-none flex gap-5">
                    <li><a href="#" class="rounded-full text-white border border-white flex justify-center items-center w-12 h-12 text-2xl"><i class='bx bxl-instagram' ></i></a></li>
                    <li><a href="#" class="rounded-full text-white border border-white flex justify-center items-center w-12 h-12 text-2xl"><i class='bx bxl-twitter' ></i></a></li>
                    <li><a href="#" class="rounded-full text-white border border-white flex justify-center items-center w-12 h-12 text-2xl"><i class='bx bxl-facebook' ></i></a></li>
                    <li><a href="#" class="rounded-full text-white border border-white flex justify-center items-center w-12 h-12 text-2xl"><i class='bx bxl-play-store' ></i></a></li>
                </ul>
            </div>
        </div>
    </section>

    <a href="https://wa.me/+6281246868369" target="_blank" class="fixed bottom-8 right-8 bg-primary w-16 h-16 flex justify-center items-center rounded-full">
        <i class='bx bxl-whatsapp text-3xl text-white'></i>
    </a>
@endsection

@section('footExtention')
    <script src="//unpkg.com/alpinejs" defer></script>
@endsection
