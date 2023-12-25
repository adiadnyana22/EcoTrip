@extends('user.component.user_template')

@section('title', 'EcoTrip')

@section('content')
    <section class="min-h-screen w-screen">
        <div class="container mx-auto flex">
            <div class="w-80 mt-12">
                <ul class="sticky top-10">
                    <li><a href="{{ route('profile') }}" class="block px-2 py-3 text-lg text-gray">Personal Info</a></li>
                    <li><a href="{{ route('voucher') }}" class="block px-2 py-3 text-lg">Voucher</a></li>
                    <li><a href="{{ route('faq') }}" class="block px-2 py-3 text-lg text-gray">FAQ</a></li>
                    <li><a href="https://wa.me/+6281246868369" target="_blank" class="block px-2 py-3 text-lg text-gray">Customer Help</a></li>
                </ul>
            </div>
            <div class="w-full mt-6">
                <h1 class="text-4xl font-bold mb-6">Voucher List</h1>
                @foreach ($voucherList as $voucher)
                <div class="py-3" x-data="{ modelOpen: false }">
                    <div class="rounded-lg border border-gray/25 px-8 py-6 w-full flex items-center gap-8">
                        <i class='bx bx-purchase-tag text-4xl text-primary' ></i>
                        <div>
                            <h2 class="text-xl mb-1 font-bold">{{ $voucher->name }}</h2>
                            <p class="text-gray">{{ $voucher->description }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <a href="https://wa.me/+6281246868369" target="_blank" class="fixed bottom-8 right-8 bg-[#00D95F] w-16 h-16 flex justify-center items-center rounded-full">
        <i class='bx bxl-whatsapp text-3xl text-white'></i>
    </a>
@endsection

@section('footExtention')
    
@endsection
