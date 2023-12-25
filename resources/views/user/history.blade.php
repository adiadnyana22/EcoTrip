@extends('user.component.user_template')

@section('title', 'EcoTrip')

@section('content')
    <section class="min-h-screen w-screen">
        <div class="container mx-auto flex">
            <div class="w-80 mt-12">
                <ul class="sticky top-10">
                    <li><a href="{{ route('history') }}" class="block px-2 py-3 text-lg @if($type != 'order') text-gray @endif">My Orders</a></li>
                    <li><a href="{{ route('history', ['type' => 'history']) }}" class="block px-2 py-3 text-lg @if($type != 'history') text-gray @endif">My History</a></li>
                </ul>
            </div>
            <div class="w-full mt-6">
                <h1 class="text-4xl font-bold mb-6">My Trip</h1>
                @foreach ($orderWisata as $order)
                <div class="py-3" x-data="{ modelOpen: false }">
                    <div class="rounded-lg border border-gray/20 px-8 py-6 flex gap-3 justify-between w-full cursor-pointer" @click="modelOpen = true;">
                        <div>
                            <p class="text-sm mb-5">{{ \Carbon\Carbon::parse($order->date)->format('l, d M Y') }}</p>
                            <h2 class="text-xl mb-1">{{ $order->wisata->name }}</h2>
                            <span class="text-gray">{{ $order->kode_tiket }}</span>
                        </div>
                        <div class="flex flex-col justify-between items-end gap-2">
                            <div class="flex gap-2">
                                @if($order->status_code == 1)
                                    @if(Carbon\Carbon::parse($order->date)->lt(Carbon\Carbon::today()))
                                        <div class="rounded-full bg-red-500 px-4 py-2 text-white border border-red-500">Expired</div>
                                    @else
                                        <div class="rounded-full bg-yellow-400 px-4 py-2 text-white border border-yellow-400">Waiting Confirmation</div>
                                    @endif
                                @endif
                                @if($order->status_code == 2)<div class="rounded-full bg-primary px-4 py-2 text-white border border-primary">Complete</div>@endif
                            </div>
                            <div class="flex gap-3 items-end">
                                <span class="text-gray text-sm">TOTAL BIAYA</span>
                                <p class="text-2xl font-medium">Rp. {{ number_format($order->grand_total_price) }}</p>
                            </div>
                        </div>
                    </div>
                    <div x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                        <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                            <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                                    x-transition:enter="transition ease-out duration-300 transform"
                                    x-transition:enter-start="opacity-0"
                                    x-transition:enter-end="opacity-100"
                                    x-transition:leave="transition ease-in duration-200 transform"
                                    x-transition:leave-start="opacity-100"
                                    x-transition:leave-end="opacity-0"
                                    class="fixed inset-0 transition-opacity bg-gray bg-opacity-40" aria-hidden="true"
                            ></div>

                            <div x-cloak x-show="modelOpen"
                                    x-transition:enter="transition ease-out duration-300 transform"
                                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                    x-transition:leave="transition ease-in duration-200 transform"
                                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                    class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl"
                            >
                                <div class="flex items-center justify-between space-x-4">
                                    <h1 class="text-xl font-medium text-gray-800 ">My Trip</h1>

                                    <button type="button" @click="modelOpen = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </button>
                                </div>

                                <div class="mt-8"> 
                                    <span class="text-gray">{{ $order->kode_tiket }}</span>
                                    <h2 class="text-2xl font-medium py-2">{{ $order->wisata->name }}</h2>
                                    <p>{{ \Carbon\Carbon::parse($order->date)->format('l, d M Y') }}</p>
                                    <ul class="pt-6 text-gray flex flex-col gap-2">
                                        <li class="flex justify-between">
                                            <div>Tiket Masuk x {{ $order->qty }}</div>
                                            <div>Rp{{ number_format($order->total_ticket_price) }}</div>
                                        </li>
                                        @if ($order->qty_indonesia != 0)
                                        <li class="flex justify-between">
                                            <div class="ml-4">1x Indonesia</div>
                                        </li>
                                        @endif
                                        @if ($order->qty_foreign != 0)
                                        <li class="flex justify-between">
                                            <div class="ml-4">1x Foreign</div>
                                        </li>
                                        @endif
                                        @if ($order->coin != 0)
                                        <li class="flex justify-between">
                                            <div>Koin</div>
                                            <div>-Rp{{ number_format($order->coin) }}</div>
                                        </li>
                                        @endif
                                        @if ($order->voucher_id != 0)
                                        <li class="flex justify-between">
                                            <div>Voucher Discount</div>
                                            <div>-Rp{{ number_format($order->voucher_nominal) }}</div>
                                        </li>
                                        @endif
                                        <li class="flex justify-between">
                                            <div>Kode Unik</div>
                                            <div>Rp{{ number_format($order->unique_code) }}</div>
                                        </li>
                                        <li class="flex justify-between">
                                            <div class="text-lg font-bold text-black">Total Pembayaran</div>
                                            <div class="text-lg font-bold text-black">Rp{{ number_format($order->grand_total_price) }}</div>
                                        </li>
                                    </ul>
                                    <div class="pt-8">
                                        @if($order->status_code == 2 || ($order->status_code == 1 && Carbon\Carbon::parse($order->date)->gte(Carbon\Carbon::today())))
                                            <a href="{{ route('viewWaste1') }}" class="block px-4 py-3 rounded-lg bg-primary text-white text-center">Go to EcoWaste</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @foreach ($orderExplore as $order)
                <div class="py-3" x-data="{ modelOpen: false }">
                    <div class="rounded-lg border border-gray/20 px-8 py-6 flex gap-3 justify-between w-full cursor-pointer" @click="modelOpen = true;">
                        <div>
                            <p class="text-sm mb-5">{{ \Carbon\Carbon::parse($order->date)->format('l, d M Y') }}</p>
                            <h2 class="text-xl mb-1">{{ $order->explore->name }}</h2>
                            <span class="text-gray">{{ $order->kode_tiket }}</span>
                        </div>
                        <div class="flex flex-col justify-between items-end gap-2">
                            <div class="flex gap-2">
                                @if($order->explore->type == 0)<div class="rounded-full px-4 py-2 text-gray border border-gray">Private Trip</div>@endif
                                @if($order->explore->type == 1)<div class="rounded-full px-4 py-2 text-gray border border-gray">Open Trip</div>@endif
                                @if($order->status_code == 1)
                                    @if(Carbon\Carbon::parse($order->date)->lt(Carbon\Carbon::today()))
                                        <div class="rounded-full bg-red-500 px-4 py-2 text-white border border-red-500">Expired</div>
                                    @else
                                        <div class="rounded-full bg-yellow-400 px-4 py-2 text-white border border-yellow-400">Waiting Confirmation</div>
                                    @endif
                                @endif
                                @if($order->status_code == 2)<div class="rounded-full bg-primary px-4 py-2 text-white border border-primary">Complete</div>@endif
                            </div>
                            <div class="flex gap-3 items-end">
                                <span class="text-gray text-sm">TOTAL BIAYA</span>
                                <p class="text-2xl font-medium">Rp. {{ number_format($order->grand_total_price) }}</p>
                            </div>
                        </div>
                    </div>
                    <div x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                        <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                            <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                                    x-transition:enter="transition ease-out duration-300 transform"
                                    x-transition:enter-start="opacity-0"
                                    x-transition:enter-end="opacity-100"
                                    x-transition:leave="transition ease-in duration-200 transform"
                                    x-transition:leave-start="opacity-100"
                                    x-transition:leave-end="opacity-0"
                                    class="fixed inset-0 transition-opacity bg-gray bg-opacity-40" aria-hidden="true"
                            ></div>

                            <div x-cloak x-show="modelOpen"
                                    x-transition:enter="transition ease-out duration-300 transform"
                                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                    x-transition:leave="transition ease-in duration-200 transform"
                                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                    class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl"
                            >
                                <div class="flex items-center justify-between space-x-4">
                                    <h1 class="text-xl font-medium text-gray-800 ">My Trip</h1>

                                    <button type="button" @click="modelOpen = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </button>
                                </div>

                                <div class="mt-8"> 
                                    <span class="text-gray">{{ $order->kode_tiket }}</span>
                                    <h2 class="text-2xl font-medium py-2">{{ $order->explore->name }}</h2>
                                    <p>{{ \Carbon\Carbon::parse($order->date)->format('l, d M Y') }}</p>
                                    <ul class="pt-6 text-gray flex flex-col gap-2">
                                        <li class="flex justify-between">
                                            <div>Tiket Masuk x {{ $order->qty }}</div>
                                            <div>Rp{{ number_format($order->total_ticket_price) }}</div>
                                        </li>
                                        @if ($order->qty_indonesia != 0)
                                        <li class="flex justify-between">
                                            <div class="ml-4">1x Indonesia</div>
                                        </li>
                                        @endif
                                        @if ($order->qty_foreign != 0)
                                        <li class="flex justify-between">
                                            <div class="ml-4">1x Foreign</div>
                                        </li>
                                        @endif
                                        @if ($order->coin != 0)
                                        <li class="flex justify-between">
                                            <div>Koin</div>
                                            <div>-Rp{{ number_format($order->coin) }}</div>
                                        </li>
                                        @endif
                                        @if ($order->voucher_id != 0)
                                        <li class="flex justify-between">
                                            <div>Voucher Discount</div>
                                            <div>-Rp{{ number_format($order->voucher_nominal) }}</div>
                                        </li>
                                        @endif
                                        <li class="flex justify-between">
                                            <div>Kode Unik</div>
                                            <div>Rp{{ number_format($order->unique_code) }}</div>
                                        </li>
                                        <li class="flex justify-between">
                                            <div class="text-lg font-bold text-black">Total Pembayaran</div>
                                            <div class="text-lg font-bold text-black">Rp{{ number_format($order->grand_total_price) }}</div>
                                        </li>
                                    </ul>
                                    <div class="pt-8">
                                        @if($order->status_code == 2 || ($order->status_code == 1 && Carbon\Carbon::parse($order->date)->gte(Carbon\Carbon::today())))
                                            <a href="{{ route('viewWaste1') }}" class="block px-4 py-3 rounded-lg bg-primary text-white text-center">Go to EcoWaste</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <a href="https://wa.me/+6281246868369" target="_blank" class="fixed bottom-8 right-8 bg-[#00D95F] w-16 h-16 flex justify-center items-center rounded-full">
        <i class='bx bxl-whatsapp text-3xl text-white'></i>
    </a>
@endsection

@section('footExtention')
    
@endsection
