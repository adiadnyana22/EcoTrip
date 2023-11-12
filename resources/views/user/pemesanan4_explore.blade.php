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
                <span class="rounded-full py-2.5 px-5 text-white mb-3 inline-block" style="background: linear-gradient(257deg, #3B9B88 -29.89%, rgba(59, 155, 136, 0.00) 106.79%), #134B40;">@if($explore->type == 0) {{ "Private Trip" }} @elseif($explore->type == 1) {{ "Open Trip" }} @endif</span>
                <h2>{{ $explore->name }}</h2>
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
                        <div class="bg-primary w-10 h-10 text-white rounded-full flex justify-center items-center">2</div>
                        <div class="text-lg">Meeting Point</div>
                    </li>
                    <li class="flex items-center gap-8 relative z-10">
                        <div class="bg-primary w-10 h-10 text-white rounded-full flex justify-center items-center">3</div>
                        <div class="text-lg">Detail Pemesanan</div>
                    </li>
                    <li class="flex items-center gap-8 relative z-10">
                        <div class="bg-primary w-10 h-10 text-white rounded-full flex justify-center items-center">4</div>
                        <div class="text-lg">Konfirmasi dan Pembayaran</div>
                    </li>
                    <div class="absolute left-5 top-4 border-l-2 border-dotted border-gray z-0" style="height: calc(100% - 2rem)"></div>
                </ul>
            </div>
        </div>
        <div class="max-h-screen max-w-full bg-[#F4F4F4] pl-24 pt-12 pr-16 pb-16 overflow-auto">
            <div>
                <div class="mt-6 mb-4">
                    <h1 class="text-3xl font-bold">Konfirmasi dan Pembayaran</h1>
                </div>
                <div class="rounded-lg shadow mb-5 px-6 py-4 flex flex-col gap-3 justify-center items-center text-white" style="background: linear-gradient(136deg, rgba(255, 255, 255, 0.00) 0%, rgba(57, 200, 172, 0.40) 62.27%, rgba(255, 255, 255, 0.00) 100%), #134B40;" x-data="timer(new Date().setHours(new Date().getHours() + 3))" x-init="init();">
                    <p>Selesaikan pembayaran sebelum waktu berakhir,</p>
                    <span class="font-bold text-3xl"><span x-text="time().hours"></span>:<span x-text="time().minutes"></span>:<span x-text="time().seconds"></span></span>
                    <div class="flex gap-5 justify-between items-center border border-white rounded w-full" x-data="{ copied: false }">
                        <div class="flex flex-col px-6 py-3">
                            <span class="text-xs">Bank Central Asia</span>
                            <strong class="text-2xl" x-ref="norek">7670533471</strong>
                        </div>
                        <div>
                            <i x-show="!copied" class='bx bx-copy text-white text-3xl cursor-pointer px-6 py-3' @click="navigator.clipboard.writeText($refs.norek.innerText); copied = true"></i>
                            <span x-show="copied" class="text-white text-lg px-6 py-3">Copied</span>
                        </div>
                    </div>
                </div>
                <span class="text-gray ml-1 font-medium text-lg block mb-2 mt-8">INFORMASI TIKET</span>
                <div class="bg-white rounded-lg shadow mb-5 px-6 py-4">
                    <h2 class="font-medium text-xl mb-6">{{ $explore->name }}</h2>
                    <div class="flex justify-between items-center my-2">
                        <span class="text-gray">Tiket Masuk x {{ $qty }}</span>
                        <span class="text-gray">Rp{{ number_format($total_price) }}</span>
                    </div>
                    @if($coin && $coin != 0)
                        <div class="flex justify-between items-center my-2">
                            <span class="text-gray">Koin</span>
                            <span class="text-gray">-Rp{{ number_format($coin) }}</span>
                        </div>
                    @endif
                    @if($voucher && $voucher != 0)
                        <div class="flex justify-between items-center my-2">
                            <span class="text-gray">Voucher Discount</span>
                            <span class="text-gray">-Rp{{ number_format($voucher) }}</span>
                        </div>
                    @endif
                    <div class="flex justify-between items-center my-2">
                        <span class="text-gray">Kode Unik</span>
                        <span class="text-gray">Rp{{ number_format($kode_unik) }}</span>
                    </div>
                    <div class="flex justify-between items-center my-2">
                        <span class="font-bold text-lg">Total Pembayaran</span>
                        <span class="font-bold text-lg">Rp{{ number_format($grand_total) }}</span>
                    </div>
                    <a href="{{ route('exploreSuccess') }}" class="rounded bg-primary px-4 py-3 text-center text-white block w-full mb-2 mt-8">Saya Sudah Bayar</a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footExtention')
    <script src="//unpkg.com/alpinejs" defer></script>
    <script>
        function timer(expiry) {
            return {
                expiry: expiry,
                remaining:null,
                init() {
                    this.setRemaining()
                    setInterval(() => {
                        this.setRemaining();
                    }, 1000);
                },
                setRemaining() {
                    const diff = this.expiry - new Date().getTime();
                    this.remaining =  parseInt(diff / 1000);
                },
                days() {
                    return {
                        value:this.remaining / 86400,
                        remaining:this.remaining % 86400
                    };
                },
                hours() {
                    return {
                        value:this.days().remaining / 3600,
                        remaining:this.days().remaining % 3600
                    };
                },
                minutes() {
                    return {
                        value:this.hours().remaining / 60,
                        remaining:this.hours().remaining % 60
                    };
                },
                seconds() {
                    return {
                        value:this.minutes().remaining,
                    };
                },
                format(value) {
                    return ("0" + parseInt(value)).slice(-2)
                },
                time(){
                    return {
                        days:this.format(this.days().value),
                        hours:this.format(this.hours().value),
                        minutes:this.format(this.minutes().value),
                        seconds:this.format(this.seconds().value),
                    }
                },
            }
        }
    </script>
@endsection
