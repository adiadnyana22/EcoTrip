@extends('user.component.user_default_template')

@section('title', 'EcoTrip')

@section('content')
    <section class="w-screen h-screen bg-[#F4F4F4] flex justify-center items-center relative">
        <div class="w-4/6 h-4/6 rounded-lg flex justify-between items-center bg-white relative" style="z-index: 1">
            <div
                class="basis-7/12 bg-[url('/assets/user/images/login.png')] bg-cover h-full w-full rounded-lg p-12 flex flex-col justify-between text-white">
                <a href="#" class="flex items-center gap-3"><i class='bx bx-chevron-left'></i> Back</a>
                <div>
                    <h2 class="font-bold text-3xl mb-2">#KiniSaatnyaBijakBerwisata</h2>
                    <p>Ecotourism is The Future of Indonesia’s Travel</p>
                </div>
            </div>
            <div class="basis-5/12 h-full w-full px-8 py-12">
                <img src="{{ asset('assets/user/images/homeLogo.png') }}" alt="Logo" class="w-32">
                <h1 class="my-8 text-2xl font-bold text-primary leading-6">Daftar kedalam EcoTrip<br>Gratis. Sekarang.
                </h1>
                <form action="#">
                    <div class="mb-3">
                        <label for="" class="block mb-3">Masukkan e-mail</label>
                        <input type="email" class="block px-6 py-3 rounded-lg border border-gray/25 w-full"
                               placeholder="email">
                    </div>
                    <div class="my-3">
                        <button class="block w-full px-6 py-3 rounded-lg text-white"
                                style="background: linear-gradient(218deg, #71984F 0%, rgba(113, 152, 79, 0.00) 100%), #134B40;">
                            Daftar
                        </button>
                    </div>
                </form>
                <div class="text-gray flex items-center gap-3 mt-6">Sudah memiliki akun? <a href="#"
                                                                                            class="text-primary underline">Masuk</a>
                </div>
            </div>
        </div>
        <div
            style="width: 75vw; height: 75vw; border-radius: 50%; position: absolute; right: 5%; bottom: -40%; background: linear-gradient(170deg, rgba(19, 75, 64, 0.05) 0%, rgba(19, 75, 64, 0.00) 100%); z-index: 0;"></div>
    </section>
@endsection
