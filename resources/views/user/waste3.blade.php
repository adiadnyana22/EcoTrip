@extends('user.component.user_default_template')

@section('title', 'EcoTrip')

@section('content')
    <section class="h-screen w-screen grid grid-cols-2">
        <div class="shadow-xl max-h-screen max-w-full pl-24 pt-12 pr-16 sticky top-0 left-0" x-data="{ modelOpen: false }">
            <div class="flex items-center gap-8">
                <i class='bx bx-chevron-left text-4xl'></i>
                <img src="{{ asset('assets/user/images/homeLogo.png') }}" alt="Logo" class="w-32">
            </div>
            <a href="#" class="my-12 shadow px-6 py-4 rounded-xl block" @click="modelOpen = true">
                <h2>Apa itu EcoWaste?</h2>
                <div class="flex justify-between items-center text-gray">
                    <p>Klik untuk ketahui lebih detail</p>
                </div>
            </a>
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
                            <div class="flex items-center gap-4">
                                <img src="{{ asset('assets/user/images/ecoWasteLogo.png') }}" alt="EcoWaste" class="w-14 h-14">
                                <h1 class="text-2xl font-bold text-gray-800">EcoWaste</h1>
                            </div>

                            <!-- <button type="button" @click="modelOpen = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </button> -->
                        </div>

                        <div class="mt-6 flex flex-col gap-4">
                            <p>
                                EcoWaste adalah fitur yang dapat mendukung wisatawan dalam melakukan pengelolaan sampah secara mandiri saat melakukan ekowisata.
                            </p>
                            <strong>Cara pengiriman sampah,</strong>
                            <ul class="flex flex-col gap-3">
                                <li class="flex items-center gap-3">
                                    <i class='bx bx-check flex items-center justify-center w-5 h-5 p-4 rounded-full bg-primary/10 text-primary'></i>
                                    <p>
                                        Wisatawan harus taat dan patuh dengan peraturan penerapan ekowisata yang ada di tempat wisata
                                    </p>
                                </li>
                                <li class="flex items-center gap-3">
                                    <i class='bx bx-check flex items-center justify-center w-5 h-5 p-4 rounded-full bg-primary/10 text-primary'></i>
                                    <p>
                                        Wisatawan tidak boleh membuang sampah sembarang dan harus membuang sampah pada tempatnya
                                    </p>
                                </li>
                                <li class="flex items-center gap-3">
                                    <i class='bx bx-check flex items-center justify-center w-5 h-5 p-4 rounded-full bg-primary/10 text-primary'></i>
                                    <p>
                                        Wisatawan dapat mengumpulkan sampah anorganik ke dalam plastik yang telah diberikan dan nantinya sampah akan dikumpulkan di meeting point terakhir
                                    </p>
                                </li>
                                <li class="flex items-center gap-3">
                                    <i class='bx bx-check flex items-center justify-center w-5 h-5 p-4 rounded-full bg-primary/10 text-primary'></i>
                                    <p>
                                        Wisatawan wajib melakukan pengisian informasi kode unik yang ada di tampilan e-tiket di eco waste
                                    </p>
                                </li>
                                <li class="flex items-center gap-3">
                                    <i class='bx bx-check flex items-center justify-center w-5 h-5 p-4 rounded-full bg-primary/10 text-primary'></i>
                                    <p>
                                        Wisatawan wajib melakukan upload foto terkait sampah yang sudah terkumpul
                                    </p>
                                </li>
                                <li class="flex items-center gap-3">
                                    <i class='bx bx-check flex items-center justify-center w-5 h-5 p-4 rounded-full bg-primary/10 text-primary'></i>
                                    <p>
                                        Wisatawan wajib mengunggah foto yang jelas dan terlihat semua sampah yang telah dikumpulkan dalam 1 frame foto
                                    </p>
                                </li>
                            </ul>
                            <div class="flex justify-center gap-6 mt-4">
                                <button type="button" class="px-4 py-2 bg-primary text-white rounded-lg" @click="modelOpen = false">Ya, saya mengerti</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="my-6">
                <h2 class="text-primary font-bold text-2xl">EcoWaste</h2>
                <ul class="flex flex-col gap-8 mt-6 relative">
                    <li class="flex items-center gap-8 relative z-10">
                        <div class="bg-primary w-10 h-10 text-white rounded-full flex justify-center items-center">1</div>
                        <div class="text-lg">Pilih Tiket</div>
                    </li>
                    <li class="flex items-center gap-8 relative z-10">
                        <div class="bg-primary w-10 h-10 text-white rounded-full flex justify-center items-center">2</div>
                        <div class="text-lg">Dokumentasikan Sampah</div>
                    </li>
                    <li class="flex items-center gap-8 relative z-10">
                        <div class="bg-primary w-10 h-10 text-white rounded-full flex justify-center items-center">3</div>
                        <div class="text-lg">Kirimkan Sampahmu!</div>
                    </li>
                    <div class="absolute left-5 top-4 border-l-2 border-dotted border-gray z-0" style="height: calc(100% - 2rem)"></div>
                </ul>
            </div>
        </div>
        <div class="max-h-screen max-w-full bg-[#F4F4F4] pl-24 pt-12 pr-16 pb-16 overflow-auto">
            <form action="{{ route('mtdWaste3') }}" method="POST" x-data="{ star : 0 }">
                @csrf
                <div class="mt-6 mb-4">
                    <h1 class="text-3xl font-bold">Kirimkan sampahmu,</h1>
                </div>
                <div class="bg-white rounded-lg shadow mb-5">
                    <div class="flex justify-between items-center font-medium px-6 pt-4"><span>Tulis review kamu</span></div>
                    <div class="px-6 py-4">
                        <div class="flex gap-3 text-4xl mt-2 mb-6 ml-1">
                            <label>
                                <input class="sr-only peer" name="star" type="radio" value="1" x-model="star" />
                                <div class="w-9 h-9 rounded-lg flex items-center justify-center text-gray" x-bind:class="(star >= 1) ? 'text-star' : ''">
                                    <i class='bx bxs-star' ></i>
                                </div>
                            </label>
                            <label>
                                <input class="sr-only peer" name="star" type="radio" value="2" x-model="star" />
                                <div class="w-9 h-9 rounded-lg flex items-center justify-center text-gray" x-bind:class="(star >= 2) ? 'text-star' : ''">
                                    <i class='bx bxs-star' ></i>
                                </div>
                            </label>
                            <label>
                                <input class="sr-only peer" name="star" type="radio" value="3" x-model="star" />
                                <div class="w-9 h-9 rounded-lg flex items-center justify-center text-gray" x-bind:class="(star >= 3) ? 'text-star' : ''">
                                    <i class='bx bxs-star' ></i>
                                </div>
                            </label>
                            <label>
                                <input class="sr-only peer" name="star" type="radio" value="4" x-model="star" />
                                <div class="w-9 h-9 rounded-lg flex items-center justify-center text-gray" x-bind:class="(star >= 4) ? 'text-star' : ''">
                                    <i class='bx bxs-star' ></i>
                                </div>
                            </label>
                            <label>
                                <input class="sr-only peer" name="star" type="radio" value="5" x-model="star" />
                                <div class="w-9 h-9 rounded-lg flex items-center justify-center text-gray" x-bind:class="(star >= 5) ? 'text-star' : ''">
                                    <i class='bx bxs-star' ></i>
                                </div>
                            </label>
                        </div>
                        <textarea name="review" id="review" cols="30" rows="5" placeholder="Tulis reviewmu disini!" class="w-full border border-gray/25 rounded-lg px-4 py-3"></textarea>
                    </div>
                </div>
                
                <div class="flex justify-end">
                    <input type="hidden" name="ticketId" value="{{ $ticketId }}">
                    <input type="hidden" name="images" value="{{ $images }}">
                    <button class="rounded-lg px-4 py-2 text-white" x-bind:class="(star == 0) ? 'bg-gray' : 'bg-black'" x-bind:disabled="star == 0">Selanjutnya</button>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('footExtention')
    
@endsection
