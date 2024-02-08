@extends('user.component.user_template')

@section('title', 'EcoTrip')

@section('content')
    <section class="min-h-screen w-screen">
        <div class="h-64 bg-primary flex justify-center items-center mt-8">
            <strong class="text-white text-5xl">#KiniSaatnyaBijakBerwisata</strong>
        </div>
        <div class="container mx-auto">
            <div class="pt-12 pb-6 flex gap-3">
                <div class="w-1/3 flex items-center">
                    <img src="{{ asset('assets/user/images/homeLogo.png') }}" alt="EcoTrip" class="w-64">
                </div>
                <div class="w-2/3">
                    <p class="leading-8">
                        {{ $about->value }}
                    </p>
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
