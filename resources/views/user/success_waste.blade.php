@extends('user.component.user_default_template')

@section('title', 'EcoTrip')

@section('content')
    <section class="h-screen w-screen">
        <div class="container mx-auto h-full flex flex-col justify-center items-center">
            <img src="{{ asset('assets/user/images/successIcon.png') }}" alt="Success" class="w-48 mb-8">
            <h1 class="text-2xl font-bold mb-2">Yeay, sampah kamu berhasil dikirim!</h1>
            <p class="py-1">
                Dengan membuang sampah ke tempat yang benar
            </p>
            <p class="py-1">
                Anda telah menjadi bagian dalam membangun perubahan dunia menjadi lebih baik
            </p>
            <a href="/" class="bg-primary rounded-full py-2 px-8 text-white mt-8 mb-2 border border-primary transition hover:bg-transparent hover:text-primary">Kembali ke beranda</a>
        </div>
    </section>
@endsection

@section('footExtention')
    
@endsection
