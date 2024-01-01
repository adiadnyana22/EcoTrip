@extends('user.component.user_template')

@section('title', 'EcoTrip')

@section('content')
    <section class="py-12">
        <div class="container mx-auto">
            <h1 class="text-center text-4xl mb-6">Search for <b>{{ $search }}</b></h1>
            <div class="flex justify-between items-center py-5 mb-2">
                <div class="flex items-center gap-16">
                    <div class="flex items-center gap-8">
                        <img src="{{ asset('assets/user/images/homeEcoWisataIcon.svg') }}" alt="Eco Wisata" class="w-12">
                        <div>
                            <h2 class="text-2xl font-bold">EcoWisata</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-12 my-3">
                @foreach($wisataList as $wisata)
                <a href="{{ route('wisataDetail', $wisata->id) }}">
                    <img src="{{ asset('assets/user/images/wisata/'.$wisata->picture) }}" alt="Wisata" class="w-full h-48 object-cover rounded-lg">
                    <div class="py-3">
                        <div class="flex justify-between items-center">
                            <div class="flex justify-center items-center text-gray gap-4">
                                <div><i class='bx bxs-star text-star' ></i> {{ $wisata->order == 0 ? '-' : $wisata->rating }}</div>
                            </div>
                            <div class="text-gray">{{ $wisata->location }}</div>
                        </div>
                        <h3 class="text-xl font-bold mt-3">{{ $wisata->name }}</h3>
                        <p class="mb-2 text-sm">Rp {{ number_format((Carbon\Carbon::now()->isWeekend()) ? $wisata->local_weekend_price : $wisata->local_price, 2) }}</p>
                    </div>
                </a>
                @endforeach
            </div>
            <div class="flex justify-between items-center py-5 mb-2 mt-12">
                <div class="flex items-center gap-16">
                    <div class="flex items-center gap-8">
                        <img src="{{ asset('assets/user/images/exploreTitleIcon.svg') }}" alt="Eco Wisata" class="w-12">
                        <div>
                            <h2 class="text-2xl font-bold">EcoExplore</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-12 my-3">
                @foreach($exploreList as $explore)
                <a href="{{ route('exploreDetail', $explore->id) }}">
                    <img src="{{ asset('assets/user/images/explore/'.$explore->picture) }}" alt="Explore" class="w-full h-48 object-cover rounded-lg">
                    <div class="py-3">
                        <div class="flex justify-between items-center">
                            <div class="flex justify-center items-center text-gray gap-4">
                                <div class="rounded-full py-1.5 px-3 bg-blue text-white text-sm">{{ $explore->type == 1 ? 'Open Trip' : 'Private Trip' }}</div>
                                <div><i class='bx bxs-star text-star' ></i> {{ $explore->order == 0 ? '-' : $explore->rating }}</div>
                            </div>
                            <div class="text-gray">{{ $explore->location }}</div>
                        </div>
                        <h3 class="text-xl font-bold mt-3">{{ $explore->name }}</h3>
                        <p class="mb-2 text-sm">Rp {{ number_format((Carbon\Carbon::now()->isWeekend()) ? $explore->local_weekend_price : $explore->local_price, 2) }}</p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-12">
        <div class="container mx-auto">
            <div class="px-24 py-16 rounded-lg h-96 flex justify-end items-start flex-col" style="background: linear-gradient(257deg, #3B9B88 -29.89%, rgba(59, 155, 136, 0.00) 106.79%), #134B40;">
                <h2 class="text-white text-5xl font-bold mb-4">#KiniSaatnyaBijakBerwisata</h2>
                <p class="text-white mb-6">Ecotourism is The Future of Indonesia’s Travel</p>
                <a href="https://www.instagram.com/ecotrip_id/" target="_blank" class="rounded-full text-white border border-white px-6 py-2 transition hover:bg-white hover:text-primary">Tentang Kami</a>
            </div>
        </div>
    </section>
@endsection

@section('footExtention')
    
@endsection