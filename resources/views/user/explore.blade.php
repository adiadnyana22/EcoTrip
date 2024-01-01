@extends('user.component.user_template')

@section('title', 'EcoTrip')

@section('content')
    <section class="py-12">
        <div class="container mx-auto">
            <div class="flex justify-between items-center py-5 mb-6">
                <div class="flex items-center gap-16">
                    <a href="{{ route('home') }}"><i class='bx bx-chevron-left text-xl' ></i></a>
                    <div class="flex items-center gap-8">
                        <img src="{{ asset('assets/user/images/exploreTitleIcon.svg') }}" alt="Eco Wisata" class="w-12">
                        <div>
                            <h1 class="text-3xl font-bold">EcoExplore</h1>
                            <p class="text-sm text-gray max-w-sm mt-2 leading-tight">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus tempore dolore sunt impedit!
                            </p>
                        </div>
                    </div>  
                    
                    <div class="flex justify-center items-center gap-4">
                        <a href="{{ route('exploreList', ['type' => 'open']) }}" class="rounded-full py-2 px-4 {{ $type == 'open' ? 'bg-blue text-white' : 'text-gray border border-gray' }}">Open Trip</a>
                        <a href="{{ route('exploreList', ['type' => 'private']) }}" class="rounded-full py-2 px-4 {{ $type == 'private' ? 'bg-blue text-white' : 'text-gray border border-gray' }}">Private Trip</a>
                    </div>
                </div>
                <form action="" method="GET" class="flex gap-2 items-center" x-data="{ open: {{ $search == null ? 'false' : 'true' }}, click: 0, search: '{{ $search }}' }">
                    <input type="text" name="search" placeholder="Cari ..." class="border-b px-2 py-1 outline-none focus:border-b-2" x-show="open" x-model="search">
                    <input type="hidden" name="type" value="{{ $type }}">
                    <button @click="open = true; click += 1" x-bind:type="click == 2 ? 'submit' : 'button'" ><i class='bx bx-search text-xl' ></i></button>
                </form>
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
