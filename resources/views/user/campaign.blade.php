@extends('user.component.user_template')

@section('title', 'EcoTrip')

@section('content')
    <section class="mt-12 mb-6">
        <div class="container mx-auto">
            <div class="flex flex-col gap-5">
                <img src="{{ asset('assets/user/images/homeBanner.png') }}" alt="Banner" class="w-full rounded-xl">
                <img src="{{ asset('assets/user/images/wisata/bromo1.png') }}" alt="Banner" class="w-full rounded-xl">
                <img src="{{ asset('assets/user/images/wisata/coban1.png') }}" alt="Banner" class="w-full rounded-xl">
                <img src="{{ asset('assets/user/images/homeArtikel1.png') }}" alt="Banner" class="w-full rounded-xl">
                <div class="my-6 flex flex-col justify-center items-center text-center">
                    <h1 class="text-primary text-5xl font-bold mb-4">EcoWaste</h1>
                    <p class="lg:w-4/5 mx-auto">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellat, blanditiis iste id dolorum asperiores dolore esse, mollitia cumque a tempora consequuntur, enim exercitationem natus quibusdam animi suscipit nisi. Fugiat, et!
                    </p>
                    <a href="{{ route('viewWaste1') }}" class="bg-primary text-white px-24 py-3 rounded-2xl text-xl mt-4 border-2 border-primary transition hover:bg-transparent hover:text-primary">Masuk ke EcoWaste</a>
                </div>
                <img src="{{ asset('assets/user/images/homeArtikel2.png') }}" alt="Banner" class="w-full rounded-xl h-96">
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

    <a href="https://wa.me/+6281246868369" target="_blank" class="fixed bottom-8 right-8 bg-[#00D95F] w-16 h-16 flex justify-center items-center rounded-full">
        <i class='bx bxl-whatsapp text-3xl text-white'></i>
    </a>
@endsection

@section('footExtention')
    
@endsection
