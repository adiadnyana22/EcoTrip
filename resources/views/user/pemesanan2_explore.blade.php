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
                    <p>{{ \Carbon\Carbon::parse($date)->isoFormat('d MMM YYYY') }}</p>
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
                        <div class="text-lg text-gray">Meeting Point</div>
                    </li>
                    <li class="flex items-center gap-8 relative z-10">
                        <div class="bg-gray w-10 h-10 text-white rounded-full flex justify-center items-center">3</div>
                        <div class="text-lg text-gray">Detail Pemesanan</div>
                    </li>
                    <li class="flex items-center gap-8 relative z-10">
                        <div class="bg-gray w-10 h-10 text-white rounded-full flex justify-center items-center">4</div>
                        <div class="text-lg text-gray">Konfirmasi dan Pembayaran</div>
                    </li>
                    <div class="absolute left-5 top-4 border-l-2 border-dotted border-gray z-0" style="height: calc(100% - 2rem)"></div>
                </ul>
            </div>
        </div>
        <div class="max-h-screen max-w-full bg-[#F4F4F4] pl-24 pt-12 pr-16 pb-16 overflow-auto">
            <form action="{{ route('pemesananExplore3') }}" method="POST">
                @csrf
                <div class="mt-6 mb-4">
                    <h1 class="text-3xl font-bold">Meeting Point</h1>
                </div>
                <div class="bg-white rounded-lg shadow mb-5">
                    <div class="flex justify-between items-center font-medium px-6 pt-4 pb-2"><span>Meeting Point</span></div>
                    <div class="px-6 pb-4 pt-2">
                        <div class="mb-2">
                            <div x-data="{ open: false, selectMeetingPoint: false, meetingPoint: '', meetingPointList: {{ str_replace('"', "'", json_encode($meeting_point)) }} }" class="relative">
                                <button x-on:click="open = true" class="flex justify-between items-center w-full items-center bg-white rounded border border-gray/25 focus:bg-gray-400 text-gray-700 focus:text-gray-900 font-semibold rounded focus:outline-none px-6 py-3" type="button">
                                    <span x-bind:class="(selectMeetingPoint) ? 'text-black' : 'text-gray'" class="mr-1 font-normal" x-text="(selectMeetingPoint && meetingPoint) ? meetingPointList.find((mp) => mp.id == meetingPoint).title : 'Pilih meeting point'"></span>
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"  style="margin-top:3px">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                    </svg>
                                </button>
                                <ul x-show="open" x-on:click.away="open = false" class=" rounded bg-white w-full text-gray-700 rounded shadow-lg absolute mt-1" style="min-width:15rem">
                                    <template x-for="mp in meetingPointList" :key="mp.id">
                                        <li>
                                            <label @click="selectMeetingPoint = true; open = false">
                                                <input class="sr-only peer" name="meeting_point_id" type="radio" :value="mp.id" x-model="meetingPoint" />
                                                <div class="px-6 py-3 rounded text-primary peer-checked:font-semibold peer-checked:bg-primary peer-checked:text-white">
                                                    <div class="text-xl font-bold" x-text="mp.title"></div>
                                                    <p class="text-sm text-gray" x-text="mp.description"></p>
                                                </div>
                                            </label>
                                        </li>
                                    </template>
                                </ul>
                                <div x-show="selectMeetingPoint" class="mt-3">
                                    <iframe x-bind:src="(selectMeetingPoint && meetingPoint) ? meetingPointList.find((mp) => mp.id == meetingPoint).mapIframe : ''" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end">
                    <input type="hidden" name="explore_id" value="{{ $explore->id }}">
                    <input type="hidden" name="date" value="{{ $date }}">
                    <input type="hidden" name="qty" value="{{ $qty }}">
                    <button class="rounded-lg px-4 py-2 bg-black text-white">Selanjutnya</button>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('footExtention')
    <script src="//unpkg.com/alpinejs" defer></script>
@endsection
