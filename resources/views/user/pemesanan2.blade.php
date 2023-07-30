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
                        <div class="bg-gray w-10 h-10 text-white rounded-full flex justify-center items-center">3</div>
                        <div class="text-lg text-gray">Konfirmasi dan Pembayaran</div>
                    </li>
                    <div class="absolute left-5 top-4 border-l-2 border-dotted border-gray z-0" style="height: calc(100% - 2rem)"></div>
                </ul>
            </div>
        </div>
        <div class="max-h-screen max-w-full bg-[#F4F4F4] pl-24 pt-12 pr-16 pb-16 overflow-auto">
            <form action="">
                <div class="mt-6 mb-4">
                    <h1 class="text-3xl font-bold">Data Diri Pemesan</h1>
                </div>
                <div class="bg-white rounded-lg shadow mb-5 px-6 py-4 flex flex-col gap-5">
                    <div>
                        <span class="text-coin text-sm">Pemesan 1</span>
                        <h4 class="text-lg font-medium">Reyhan Nur Rohmat</h4>
                        <div class="flex justify-between items-center">
                            <span>reyhan@gmail.com</span>
                            <span>+62 8312 1245 1251</span>
                        </div>
                    </div>
                    <div>
                        <span class="text-coin text-sm">Pemesan 2</span>
                        <h4 class="text-lg font-medium">Reyhan Nur Rohmat</h4>
                        <div class="flex justify-between items-center">
                            <span>reyhan@gmail.com</span>
                            <span>+62 8312 1245 1251</span>
                        </div>
                    </div>
                </div>
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
                        <span class="font-bold text-lg">Total Pembayaran</span>
                        <span class="font-bold text-lg">Rp18.000</span>
                    </div>
                    <hr class="border-dotted border-gray">
                    <div class="flex gap-3 my-4 items-center">
                        <input type="checkbox" name="coin" class="w-5 h-5">
{{--                        <label>--}}
{{--                            <input class="sr-only peer" name="coin" type="checkbox" value="1" />--}}
{{--                            <div class="w-8 h-8 rounded-full border border-coin flex items-center justify-center text-coin peer-checked:font-semibold peer-checked:bg-coin peer-checked:text-white">--}}
{{--                                <i class='bx bx-coin' ></i>--}}
{{--                            </div>--}}
{{--                        </label>--}}
                        <label for="">Tukarkan 1500 Koin EcoTrip</label>
                    </div>
                    <div class="rounded border border-gray/25 px-6 py-3 text-center text-gray cursor-pointer">Voucher</div>
                    <button class="rounded bg-gray px-4 py-2 text-center text-white block w-full mt-4 mb-2">Bayar</button>
                </div>
                <div class="flex items-center gap-3 ml-1">
                    <input type="checkbox" name="sk" class="w-5 h-5">
                    <label for="">Saya menyetujui syarat dan ketentuan</label>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('footExtention')
    <script src="//unpkg.com/alpinejs" defer></script>
@endsection
