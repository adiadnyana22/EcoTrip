@extends('user.component.user_template')

@section('title', 'EcoTrip')

@section('content')
    <section class="py-12">
        <div class="container mx-auto">
            <div class="flex justify-between items-center py-5 mb-6">
                <div class="flex items-center gap-16">
                    <a href="#"><i class='bx bx-chevron-left text-xl' ></i></a>
                    <div class="flex items-center gap-8">
                        <img src="{{ asset('assets/user/images/homeEcoWisataIcon.svg') }}" alt="Eco Wisata" class="w-12">
                        <div>
                            <h1 class="text-3xl font-bold">EcoWisata</h1>
                            <p class="text-sm text-gray max-w-sm mt-2 leading-tight">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus tempore dolore sunt impedit!
                            </p>
                        </div>
                    </div>
                </div>
                <form action="" method="GET" class="flex gap-2 items-center" x-data="{ open: {{ $search == null ? 'false' : 'true' }}, click: 0, search: '{{ $search }}' }">
                    <input type="text" name="search" placeholder="Cari ..." class="border-b px-2 py-1 outline-none focus:border-b-2" x-show="open" x-model="search">
                    <button @click="open = true; click += 1" x-bind:type="click == 2 ? 'submit' : 'button'" ><i class='bx bx-search text-xl' ></i></button>
                </form>
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
                        <p class="mb-2 text-sm">Rp {{ number_format((Carbon\Carbon::now()->isWeekend()) ? $wisata->local_weekend_price : $wisata->local_price, 2) }}</p>
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
                <a href="#" class="rounded-full text-white border border-white px-6 py-2 transition hover:bg-white hover:text-primary">Tentang Kami</a>
            </div>
        </div>
    </section>
@endsection

@section('footExtention')
    <script src="//unpkg.com/alpinejs" defer></script>
@endsection