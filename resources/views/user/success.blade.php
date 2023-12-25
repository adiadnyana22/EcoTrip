@extends('user.component.user_default_template')

@section('title', 'EcoTrip')

@section('content')
    <section class="h-screen w-screen">
        <div class="container mx-auto h-full flex flex-col justify-center items-center">
            <img src="{{ asset('assets/user/images/successIcon.png') }}" alt="Success" class="w-48 mb-8">
            <h1 class="text-2xl font-bold mb-2">Yeay, pembelian tiket berhasil!</h1>
            <p class="py-1">
                Detail tiket akan dikirimkan melalui e-mail yang sudah kamu masukkan.
            </p>
            <p class="py-1">
                Lapor melalui <a href="mailto:cs@ecoptrip.com" class="font-bold">cs@ecoptrip.com</a> apabila tidak menerima email di 1x24 jam
            </p>
            <a href="/" class="bg-primary rounded-full py-2 px-8 text-white mt-8 mb-2">Kembali ke beranda</a>
        </div>
    </section>
@endsection

@section('footExtention')
    
@endsection
