@extends('user.component.user_template')

@section('title', 'EcoTrip')

@section('content')
    <section class="py-12">
        <div class="container mx-auto">
            <div class="flex justify-between items-center py-5 mb-4">
                <div class="flex items-center gap-16">
                    <a href="#"><i class='bx bx-chevron-left text-xl' ></i></a>
                    <h1 class="text-4xl font-bold flex items-center gap-8">
                        <img src="{{ asset('assets/user/images/homeEcoWisataIcon.svg') }}" alt="Eco Wisata" class="w-8">
                        <span>EcoWisata</span>
                    </h1>
                    <p class="text-sm text-gray max-w-sm mt-2">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus tempore dolore sunt impedit!
                    </p>
                </div>
                <div>
                    <i class='bx bx-search text-xl' ></i>
                </div>
            </div>
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-12 my-3">
                @foreach($wisataList as $wisata)
                <a href="{{ route('wisataDetail', $wisata->id) }}">
                    <img src="{{ asset('assets/user/images/wisata/'.$wisata->picture) }}" alt="Wisata" class="w-full h-48 object-cover rounded-lg">
                    <div class="py-3">
                        <div class="flex justify-between items-center">
                            <div class="flex justify-center items-center text-gray gap-4">
                                <div><i class='bx bxs-star text-star' ></i> 4.5</div>
                            </div>
                            <div class="text-gray">{{ $wisata->location }}</div>
                        </div>
                        <h3 class="text-xl font-bold mt-3">{{ $wisata->name }}</h3>
                        <p class="mb-2 text-sm">Rp {{ number_format($wisata->local_price, 2) }}</p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-24">
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
@endsection
