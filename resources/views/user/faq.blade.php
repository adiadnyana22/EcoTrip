@extends('user.component.user_template')

@section('title', 'EcoTrip')

@section('content')
<section class="min-h-screen w-screen">
        <div class="container mx-auto flex">
            <div class="w-80 mt-12">
            <ul class="sticky top-10">
                    <li><a href="{{ route('profile') }}" class="block px-2 py-3 text-lg text-gray">Personal Info</a></li>
                    <li><a href="{{ route('voucher') }}" class="block px-2 py-3 text-lg text-gray">Voucher</a></li>
                    <li><a href="{{ route('faq') }}" class="block px-2 py-3 text-lg">FAQ</a></li>
                    <li><a href="https://wa.me/+6281246868369" target="_blank" class="block px-2 py-3 text-lg text-gray">Customer Help</a></li>
                </ul>
            </div>
            <div class="w-full mt-6">
                <h1 class="text-4xl font-bold mb-6">Frequently Ask Question</h1>
                <ul class="w-full">
                    @foreach ($faqList as $faq)
                    <li x-data="{ open: false }" class="mb-4">
                        <div class="cursor-pointer flex justify-between items-center px-8 py-4 rounded border border-gray/25 text-primary" @click="open = ! open">
                            <div class="text-xl">{{ $faq->title }}</div>
                            <div class="text-2xl"><i class='bx bx-chevron-down' ></i></div>
                        </div>
                        <p class="px-8 py-4" x-show="open">
                            {{ $faq->description }}
                        </p>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    <a href="https://wa.me/+6281246868369" target="_blank" class="fixed bottom-8 right-8 bg-[#00D95F] w-16 h-16 flex justify-center items-center rounded-full">
        <i class='bx bxl-whatsapp text-3xl text-white'></i>
    </a>
@endsection

@section('footExtention')
    
@endsection
