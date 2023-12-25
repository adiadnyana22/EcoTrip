@extends('user.component.user_template')

@section('title', 'EcoTrip')

@section('content')
    <section class="min-h-screen w-screen">
        <div class="container mx-auto flex">
            <div class="w-80 mt-12">
                <ul class=" sticky top-10">
                    <li><a href="{{ route('wishlist') }}" class="block px-2 py-3 text-lg @if($type == 'explore') text-gray @endif">EcoWisata</a></li>
                    <li><a href="{{ route('wishlist', ['type' => 'explore']) }}" class="block px-2 py-3 text-lg @if($type == 'wisata') text-gray @endif">EcoExplore</a></li>
                </ul>
            </div>
            <div class="w-full mt-6">
                <h1 class="text-4xl font-bold mb-6">Wishlist</h1>
                <div class="py-3 grid grid-cols-2 gap-x-8 gap-y-4">
                    @foreach ($list as $data)
                        @if ($type == 'explore')
                        <a href="{{ route('exploreDetail', $data->explore->id) }}">
                            <img src="{{ asset('assets/user/images/explore/'.$data->explore->picture) }}" alt="Explore" class="w-full h-48 object-cover rounded-lg">
                            <div class="py-3">
                                <div class="flex justify-between items-center">
                                    <div class="flex justify-center items-center text-gray gap-4">
                                        <div class="rounded-full py-1.5 px-3 bg-blue text-white text-sm">{{ $data->explore->type == 1 ? 'Open Trip' : 'Private Trip' }}</div>
                                        <div><i class='bx bxs-star text-star' ></i> {{ $data->explore->order == 0 ? '-' : $data->explore->rating }}</div>
                                    </div>
                                    <div class="text-gray">{{ $data->explore->location }}</div>
                                </div>
                                <h3 class="text-xl font-bold mt-3">{{ $data->explore->name }}</h3>
                                <p class="mb-2 text-sm">Rp {{ number_format((Carbon\Carbon::now()->isWeekend()) ? $data->explore->local_weekend_price : $data->explore->local_price, 2) }}</p>
                            </div>
                        </a>
                        @else
                        <a href="{{ route('wisataDetail', $data->wisata->id) }}">
                            <img src="{{ asset('assets/user/images/wisata/'.$data->wisata->picture) }}" alt="Wisata" class="w-full h-48 object-cover rounded-lg">
                            <div class="py-3">
                                <div class="flex justify-between items-center">
                                    <div class="flex justify-center items-center text-gray gap-4">
                                        <div><i class='bx bxs-star text-star' ></i> {{ $data->wisata->order == 0 ? '-' : $data->wisata->rating }}</div>
                                    </div>
                                    <div class="text-gray">{{ $data->wisata->location }}</div>
                                </div>
                                <h3 class="text-xl font-bold mt-3">{{ $data->wisata->name }}</h3>
                                <p class="mb-2 text-sm">Rp {{ number_format((Carbon\Carbon::now()->isWeekend()) ? $data->wisata->local_weekend_price : $data->wisata->local_price, 2) }}</p>
                            </div>
                        </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <a href="https://wa.me/+6281246868369" target="_blank" class="fixed bottom-8 right-8 bg-[#00D95F] w-16 h-16 flex justify-center items-center rounded-full">
        <i class='bx bxl-whatsapp text-3xl text-white'></i>
    </a>
@endsection

@section('footExtention')
    
@endsection
