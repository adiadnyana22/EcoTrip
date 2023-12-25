@extends('user.component.user_template')

@section('title', 'EcoTrip')

@section('content')
    <section class="min-h-screen w-screen">
        <div class="container mx-auto flex gap-12">
            <div class="w-1/3 mt-6 sticky top-10">
                <div class="sticky top-10">
                    <div class="bg-coin px-10 py-6 rounded-lg mb-8">
                        <p class="text-white mb-4">Total Coin</p>
                        <h1 class="text-white text-4xl font-bold">{{ number_format(Auth::user()->coin) }}</h1>
                    </div>
                    <div>
                        <p class="mb-2 text-xl font-medium">Promo menarik untukmu</p>
                        <div class="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true, "prevNextButtons": false }'>
                            @foreach ($carouselList as $carousel)
                            <a href="{{ $carousel->link }}" class="carousel-cell w-full">
                                <img src="{{ asset('assets/user/images/carousel/'. $carousel->picture) }}" alt="Banner" class="w-full rounded-lg h-36 object-cover">
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-2/3 mt-6">
                <h1 class="text-4xl font-bold mb-6">Transaction History</h1>
                <div class="flex flex-col gap-4">
                    @foreach ($useCoinList as $useCoin)
                    <div class="flex items-start justify-between rounded-lg shadow px-8 py-4">
                        <div>
                            <h2 class="text-xl font-medium mb-1">{{ $useCoin->description }}</h2>
                            <p class="text-gray">{{ $useCoin->date }}</p>
                        </div>
                        @if($useCoin->type == 0) 
                            <span class="text-red-500 font-bold text-xl">-{{ $useCoin->nominal }}</span>
                        @elseif($useCoin->type == 1)
                            <span class="text-primary font-bold text-xl">+{{ $useCoin->nominal }}</span>
                        @endif
                    </div>
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
