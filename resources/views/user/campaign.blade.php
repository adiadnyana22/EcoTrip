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

    <a href="https://wa.me/+6281246868369" target="_blank" class="fixed bottom-8 right-8 bg-primary w-16 h-16 flex justify-center items-center rounded-full">
        <i class='bx bxl-whatsapp text-3xl text-white'></i>
    </a>
@endsection

@section('footExtention')
    <script src="//unpkg.com/alpinejs" defer></script>
@endsection
