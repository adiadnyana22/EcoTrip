@extends('user.component.user_default_template')

@section('title', 'EcoTrip')

@section('content')
    <section class="h-screen w-screen grid grid-cols-2">
        <div class="shadow-xl max-h-screen max-w-full pl-24 pt-12 pr-16 sticky top-0 left-0">
            <div class="flex items-center gap-8">
                <i class='bx bx-chevron-left text-4xl'></i>
                <img src="{{ asset('assets/user/images/homeLogo.png') }}" alt="Logo" class="w-32">
            </div>
            <div class="my-12 shadow px-6 py-4 rounded-xl">
                <h2>Air Terjun Coban Rondo</h2>
                <div class="flex justify-between items-center text-gray">
                    <p>12 June 2023</p>
                    <p>3 pax</p>
                </div>
            </div>
            <div class="my-6">
                <h2 class="text-primary font-bold text-2xl">Langkah-langkah pembelian</h2>
                <ul class="flex flex-col gap-8 mt-6 relative">
                    <li class="flex items-center gap-8 relative z-10">
                        <div class="bg-primary w-10 h-10 text-white rounded-full flex justify-center items-center">1</div>
                        <div class="text-lg">Data Diri Pemesan</div>
                    </li>
                    <li class="flex items-center gap-8 relative z-10">
                        <div class="bg-primary w-10 h-10 text-white rounded-full flex justify-center items-center">2</div>
                        <div class="text-lg">Detail Pemesanan</div>
                    </li>
                    <li class="flex items-center gap-8 relative z-10">
                        <div class="bg-primary w-10 h-10 text-white rounded-full flex justify-center items-center">3</div>
                        <div class="text-lg">Konfirmasi dan Pembayaran</div>
                    </li>
                    <div class="absolute left-5 top-4 border-l-2 border-dotted border-gray z-0" style="height: calc(100% - 2rem)"></div>
                </ul>
            </div>
        </div>
        <div class="max-h-screen max-w-full bg-[#F4F4F4] pl-24 pt-12 pr-16 pb-16 overflow-auto">
            <form action="">
                <div class="mt-6 mb-4">
                    <h1 class="text-3xl font-bold">Konfirmasi dan Pembayaran</h1>
                </div>
                <div class="rounded-lg shadow mb-5 px-6 py-4 flex flex-col gap-3 justify-center items-center text-white" style="background: linear-gradient(136deg, rgba(255, 255, 255, 0.00) 0%, rgba(57, 200, 172, 0.40) 62.27%, rgba(255, 255, 255, 0.00) 100%), #134B40;">
                    <p>Selesaikan pembayaran sebelum waktu berakhir,</p>
                    <span class="font-bold text-3xl">3:00:00</span>
                    <div class="flex gap-5 justify-center items-center border border-white rounded w-full px-2 py-3">
                        <img src="{{ asset('assets/user/images/logoBCA.png') }}" alt="BCA" class="bg-white rounded w-16">
                        <div class="flex flex-col">
                            <span class="text-xs">Bank Central Asia</span>
                            <strong class="text-2xl">7670533471</strong>
                        </div>
                    </div>
                </div>
                <span class="text-gray ml-1 font-medium text-lg block mb-2 mt-8">INFORMASI TIKET</span>
                <div class="bg-white rounded-lg shadow mb-5 px-6 py-4">
                    <h2 class="font-medium text-xl mb-6">Air Terjun Coban Rondo</h2>
                    <div class="flex justify-between items-center my-2">
                        <span class="text-gray">Tiket Masuk x 2</span>
                        <span class="text-gray">Rp30.000</span>
                    </div>
                    <div class="flex justify-between items-center my-2">
                        <span class="text-gray">Koin</span>
                        <span class="text-gray">-Rp1.500</span>
                    </div>
                    <div class="flex justify-between items-center my-2">
                        <span class="text-gray">Voucher Discount</span>
                        <span class="text-gray">-Rp10.000</span>
                    </div>
                    <div class="flex justify-between items-center my-2">
                        <span class="text-gray">Kode Unik</span>
                        <span class="text-gray">Rp786</span>
                    </div>
                    <div class="flex justify-between items-center my-2">
                        <span class="font-bold text-lg">Total Pembayaran</span>
                        <span class="font-bold text-lg">Rp18.786</span>
                    </div>
                    <button class="rounded bg-primary px-4 py-3 text-center text-white block w-full mb-2 mt-8">Saya Sudah Bayar</button>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('footExtention')
    <script src="//unpkg.com/alpinejs" defer></script>
@endsection
