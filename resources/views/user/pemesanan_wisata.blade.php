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
                <h2>{{ $wisata->name }}</h2>
                <div class="flex justify-between items-center text-gray">
                    <p>{{ $date }}</p>
                    <p>{{ $qty }} pax</p>
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
                        <div class="bg-gray w-10 h-10 text-white rounded-full flex justify-center items-center">2</div>
                        <div class="text-lg text-gray">Detail Pemesanan</div>
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
            <form action="{{ route('pemesananWisata2') }}" method="POST">
                @csrf
                <div class="mt-6 mb-4">
                    <h1 class="text-3xl font-bold">Data Diri Pemesan</h1>
                </div>
                @for($i = 1; $i <= $qty; $i++)
                <div class="bg-white rounded-lg shadow mb-5" x-data="{ open: false }">
                    <div class="flex justify-between items-center font-medium cursor-pointer px-6 py-4" @click="open = ! open"><span>Informasi Pemesan {{ $i }}</span><i class='bx bx-chevron-down' ></i></div>
                    <div x-show="open" class="px-6 py-4">
                        <div class="mb-6">
                            <label for="" class="font-medium"><span class="text-red-400">*</span>E-mail</label>
                            @if ($i == 1)
                            <div class="text-sm text-gray">*tiket akan dikirimkan melalui alamat email</div>
                            @endif
                            <input type="email" name="email{{ $i }}" placeholder="email" class="rounded border border-gray/25 px-6 py-3 block w-full mt-1">
                        </div>
                        <div class="mb-6">
                            <label for="" class="font-medium"><span class="text-red-400">*</span>Nama</label>
                            <input type="text" name="name{{ $i }}" placeholder="nama" class="rounded border border-gray/25 px-6 py-3 block w-full mt-1">
                        </div>
                        <div class="mb-6">
                            <label for="" class="font-medium"><span class="text-red-400">*</span>No Telepon</label>
                            <input type="text" name="telp{{ $i }}" placeholder="no telepon" class="rounded border border-gray/25 px-6 py-3 block w-full mt-1">
                        </div>
                        <div class="mb-6">
                            <label for="" class="font-medium"><span class="text-red-400">*</span>Jenis Kelamin</label>
                            <div class="flex items-center gap-3 ml-1">
                                <input type="radio" name="gender{{ $i }}" value="M"><label for="">Laki -laki</label>
                            </div>
                            <div class="flex items-center gap-3 ml-1">
                                <input type="radio" name="gender{{ $i }}" value="F"><label for="">Perempuan</label>
                            </div>
                        </div>
                        <div class="mt-6 mb-2">
                            <label for="" class="font-medium"><span class="text-red-400">*</span>Kewarganegaraan</label>
                            <select name="nationality{{ $i }}" class="rounded border border-gray/25 px-6 py-3 block w-full mt-1">
                                <option value="0">Indonesia</option>
                                <option value="1">Foreign</option>
                            </select>
                        </div>
                    </div>
                </div>
                @endfor
                <div class="flex justify-end">
                    <input type="hidden" name="wisata_id" value="{{ $wisata->id }}">
                    <input type="hidden" name="date" value="{{ $date }}">
                    <input type="hidden" name="qty" value="{{ $qty }}">
                    <button class="rounded-lg px-4 py-2 bg-black text-white">Selanjutnya</button>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('footExtention')
    
@endsection
