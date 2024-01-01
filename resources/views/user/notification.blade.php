@extends('user.component.user_template')

@section('title', 'EcoTrip')

@section('content')
    <section class="min-h-screen w-screen">
        <div class="container mx-auto flex justify-center">
            <div class="max-w-4xl">
                <div>
                    <div class="sticky top-0 bg-white w-[750px]">
                        <h1 class="text-4xl font-bold pt-10">Notification</h1>
                        <ul class="flex gap-5 pb-2 mt-4">
                            <li class="{{ $type == 'all' ? 'text-black' : 'text-gray' }}"><a href="{{ route('notification') }}">Semua</a></li>
                            <li class="{{ $type == 'transaksi' ? 'text-black' : 'text-gray' }}"><a href="{{ route('notification', ['type' => 'transaksi']) }}">Transaksi</a></li>
                            <li class="{{ $type == 'promo' ? 'text-black' : 'text-gray' }}"><a href="{{ route('notification', ['type' => 'promo']) }}">Promo</a></li>
                            <li class="{{ $type == 'koin' ? 'text-black' : 'text-gray' }}"><a href="{{ route('notification', ['type' => 'koin']) }}">Koin</a></li>
                        </ul>
                    </div>
                    <ul class="mt-4 flex flex-col gap-4">
                        @foreach ($list as $notif)
                        <a href="@if($notif->type == 0) {{ route('history') }} @elseif($notif->type == 1) {{ route('voucher') }} @elseif($notif->type == 2) {{ route('coin') }} @endif" class="flex justify-between items-center gap-2 rounded-lg border border-gray/25 px-6 py-4 w-[750px] max-w-full">
                            <div class="flex gap-8 items-center">
                                <i class='bx bx-bell text-primary bg-primary/5 px-4 py-3 rounded-full text-2xl'></i>
                                <div>
                                    <p>{{ $notif->title }}</p>
                                    <span class="text-sm text-gray">{{ date("d/m/Y H:i:s", strtotime($notif->date)) }}</span>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </ul>
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
