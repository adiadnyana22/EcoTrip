@extends('user.component.user_default_template')

@section('title', 'EcoTrip')

@section('content')
    <section class="h-screen w-screen grid grid-cols-2">
        <div class="shadow-xl max-h-screen max-w-full pl-24 pt-12 pr-16 sticky top-0 left-0">
            <div class="flex items-center gap-8">
                <a href="{{ route('viewPemesananWisata1') }}"><i class='bx bx-chevron-left text-4xl'></i></a>
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
        <div class="max-h-screen max-w-full bg-[#F4F4F4] pl-24 pt-12 pr-16 pb-16 overflow-auto" x-data="{ isTaCChecked: false }">
            <form action="{{ route('pemesananWisata3') }}" method="POST">
                @csrf
                <div class="mt-6 mb-4">
                    <h1 class="text-3xl font-bold">Data Diri Pemesan</h1>
                </div>
                <div class="bg-white rounded-lg shadow mb-5 px-6 py-4 flex flex-col gap-5">
                    @for($i = 0; $i < $qty; $i++)
                    <div>
                        <span class="text-coin text-sm">Pemesan {{ $i+1 }}</span>
                        <h4 class="text-lg font-medium">{{ $pemesan[$i]['name'] }}</h4>
                        <div class="flex justify-between items-center">
                            <span>{{ $pemesan[$i]['email'] }}</span>
                            <span>{{ $pemesan[$i]['telp'] }}</span>
                        </div>
                    </div>
                    @endfor
                </div>
                <div class="bg-white rounded-lg shadow mb-5 px-6 py-4" x-data="{ count: 0, useCoin: false, coin: {{ \Illuminate\Support\Facades\Auth::user()->coin }}, useVoucher: false, voucher: '', voucherList: {{ str_replace('"', "'", json_encode($voucher)) }}, totalPrice: @json($total_price), ticketPrice: {{ $total_price }}, get totalPay() { return this.totalPrice - ((this.useCoin) ? this.coin : 0) - ((this.useVoucher) ? this.voucherList.find((vc) => vc.id == this.voucher).actual_disc : 0) }  }">
                    <h2 class="font-medium text-xl mb-6">{{ $wisata->name }}</h2>
                    <div class="flex justify-between items-center my-2">
                        <span class="text-gray">Tiket Masuk x {{ $qty }}</span>
                        <span class="text-gray">Rp{{ number_format($total_price) }}</span>
                    </div>
                    <div class="flex justify-between items-center my-2" x-show="useCoin">
                        <span class="text-gray">Koin</span>
                        <span class="text-gray">-Rp<span x-text="new Intl.NumberFormat('en-ID').format(coin)"></span></span>
                    </div>
                    <div class="flex justify-between items-center my-2" x-show="useVoucher">
                        <span class="text-gray">Voucher Discount</span>
                        <span class="text-gray">-Rp<span x-text="(useVoucher) ? new Intl.NumberFormat('en-ID').format(voucherList.find((vc) => vc.id == voucher).actual_disc) : 0"></span></span>
                    </div>
                    <div class="flex justify-between items-center my-2">
                        <span class="font-bold text-lg">Total Pembayaran</span>
                        <span class="font-bold text-lg">Rp<span x-text="new Intl.NumberFormat('en-ID').format(totalPay)"></span></span>
                    </div>
                    <hr class="border-dotted border-gray mb-2">
                    <div class="flex gap-3 my-4 items-center" x-show="coin > 0">
                        <input type="checkbox" name="useCoin" class="w-5 h-5" value="Yes" x-model="useCoin">
                        <input type="hidden" name="coin" x-model="coin">
{{--                        <label>--}}
{{--                            <input class="sr-only peer" name="coin" type="checkbox" value="1" />--}}
{{--                            <div class="w-8 h-8 rounded-full border border-coin flex items-center justify-center text-coin peer-checked:font-semibold peer-checked:bg-coin peer-checked:text-white">--}}
{{--                                <i class='bx bx-coin' ></i>--}}
{{--                            </div>--}}
{{--                        </label>--}}
                        <label for="">Tukarkan {{ \Illuminate\Support\Facades\Auth::user()->coin }} Koin EcoTrip</label>
                    </div>
                    <div x-data="{ modelOpen: false }">
                        <div x-bind:class="(useVoucher) ? 'rounded border border-primary px-6 py-3 text-center text-primary cursor-pointer' : 'rounded border border-gray/25 px-6 py-3 text-center text-gray cursor-pointer' " @click="modelOpen =!modelOpen" x-text="(useVoucher) ? 'Voucher potongan Rp' + new Intl.NumberFormat('en-ID').format(voucherList.find((vc) => vc.id == voucher).actual_disc) + ' terpakai' : 'Voucher'">Voucher</div>
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
                                        <h1 class="text-xl font-medium text-gray-800 ">Voucher yang kamu miliki</h1>

                                        <button type="button" @click="modelOpen = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </button>
                                    </div>

                                    <div class="mt-8 flex flex-col gap-4" x-show="voucherList.length > 0">
                                        <template x-for="vc in voucherList" :key="vc.id">
                                            <label>
                                                <input class="sr-only peer" name="voucher" type="radio" :value="vc.id" x-model="voucher" x-bind:disabled="ticketPrice < vc.min_transaction_nominal" />
                                                <div class="px-4 py-2 rounded-lg text-primary peer-checked:font-semibold peer-checked:bg-primary peer-checked:text-white border border-primary" x-bind:class="ticketPrice < vc.min_transaction_nominal ? 'bg-gray' : ''">
                                                    <div class="text-xl font-bold" x-text="vc.name" x-bind:class="ticketPrice < vc.min_transaction_nominal ? 'text-black' : ''"></div>
                                                    <div class="flex justify-between">
                                                        <p class="text-sm text-gray" x-text="vc.description" x-bind:class="ticketPrice < vc.min_transaction_nominal ? 'text-black' : ''"></p>
                                                        <p class="text-sm text-gray" x-text="'min Rp ' + new Intl.NumberFormat('en-ID').format(vc.min_transaction_nominal)" x-bind:class="ticketPrice < vc.min_transaction_nominal ? 'text-black' : ''"></p>
                                                    </div>
                                                </div>
                                            </label>
                                        </template>
                                        <div class="flex justify-center gap-6 mt-4">
                                            <button type="button" class="px-4 py-2 text-gray" @click="voucher = 0; useVoucher = false">Hapus Voucher</button>
                                            <button type="button" class="px-4 py-2 bg-primary text-white rounded-lg" @click="modelOpen = false; useVoucher = ((voucher == 0) ? false : true)">Pakai</button>
                                        </div>
                                    </div>
                                    <div class="mt-8 flex flex-col gap-4" x-show="voucherList.length == 0">
                                        <p>Tidak ada voucher yang bisa dipakai</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="total_pay" x-model="totalPay">
                    <input type="hidden" name="voucher_nominal" x-model="voucherList.find((vc) => vc.id == voucher).actual_disc">
                    <button x-bind:class="'rounded px-4 py-2 text-center text-white block w-full mt-4 mb-2 ' + ((isTaCChecked) ? 'bg-primary' : 'bg-gray')" x-bind:disabled="!isTaCChecked" @click="count = 1" x-show="count == 0">Bayar</button>
                </div>
                <div class="flex items-center gap-3 ml-1">
                    <input type="hidden" name="wisata_id" value="{{ $wisata->id }}">
                    <input type="hidden" name="date" value="{{ $date }}">
                    <input type="hidden" name="qty" value="{{ $qty }}">
                    <div x-data="{ modelOpen: false }">
                        <div class="flex items-center gap-3 ml-1">
                            <input type="checkbox" id="sk" name="sk" class="w-5 h-5" value="Yes" x-model="isTaCChecked" @click="$event.preventDefault(); modelOpen = true">
                            <label for="sk">Saya menyetujui syarat dan ketentuan</label>
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
                                        <h1 class="text-xl font-medium text-gray-800 ">Syarat dan ketentuan</h1>

                                        <button type="button" @click="modelOpen = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </button>
                                    </div>

                                    <div class="mt-8 flex flex-col gap-4">
                                        <strong>Syarat dan Ketentuan Aplikasi (General):</strong>
                                        <ol type="1" style="list-style-type: decimal" class="ml-4">
                                            <li>
                                                <span>Penggunaan Aplikasi:</span>
                                                <ol type="a" style="list-style-type: lower-alpha" class="ml-4">
                                                    <li>Aplikasi ini hanya boleh digunakan oleh individu yang berusia minimal 13 tahun atau sesuai batas usia hukum setempat.</li>
                                                    <li>Pengguna harus memiliki akses internet dan perangkat kompatibel untuk menggunakan aplikasi.</li>
                                                </ol>
                                            </li>
                                            <li>
                                                <span>Kepatuhan Hukum:</span>
                                                <ol type="a" style="list-style-type: lower-alpha" class="ml-4">
                                                    <li>Pengguna wajib mematuhi semua hukum dan peraturan yang berlaku saat menggunakan aplikasi ini.</li>
                                                    <li>Pengguna bertanggung jawab atas semua konten yang diunggah atau dibagikan melalui aplikasi.</li>
                                                </ol>
                                            </li>
                                            <li>
                                                <span>Privasi dan Data Pengguna:</span>
                                                <ol type="a" style="list-style-type: lower-alpha" class="ml-4">
                                                    <li>Aplikasi akan mengumpulkan dan menggunakan data pengguna sesuai dengan Kebijakan Privasi yang berlaku.</li>
                                                    <li>Pengguna harus menyediakan data yang akurat dan bersedia untuk data tersebut digunakan sesuai dengan Kebijakan Privasi.</li>
                                                </ol>
                                            </li>
                                            <li>
                                                <span>Konten Aplikasi:</span>
                                                <ol type="a" style="list-style-type: lower-alpha" class="ml-4">
                                                    <li>Pengguna tidak diperbolehkan mengunggah, membagikan, atau menyebarkan konten yang ilegal, berbahaya, mengandung unsur kekerasan, atau melanggar hak kekayaan intelektual pihak ketiga.</li>
                                                    <li>Pengguna tidak diperbolehkan menggunakan aplikasi untuk tujuan yang melanggar hukum atau merugikan pihak lain.</li>
                                                </ol>
                                            </li>
                                            <li>
                                                <span>Keamanan Akun Pengguna:</span>
                                                <ol type="a" style="list-style-type: lower-alpha" class="ml-4">
                                                    <li>Pengguna bertanggung jawab atas menjaga kerahasiaan informasi akun mereka dan harus segera memberitahukan jika ada pelanggaran keamanan.</li>
                                                </ol>
                                            </li>
                                            <li>
                                                <span>Perubahan dan Penyimpangan:</span>
                                                <ol type="a" style="list-style-type: lower-alpha" class="ml-4">
                                                    <li>Pengembang berhak untuk mengubah, memperbarui, atau menambahkan fitur aplikasi tanpa pemberitahuan sebelumnya.</li>
                                                    <li>Penggunaan aplikasi setelah perubahan berarti penerimaan atas perubahan tersebut.</li>
                                                </ol>
                                            </li>
                                            <li>
                                                <span>Layanan Pihak Ketiga:</span>
                                                <ol type="a" style="list-style-type: lower-alpha" class="ml-4">
                                                    <li>Aplikasi dapat mengandung tautan atau mengintegrasikan layanan pihak ketiga. Syarat dan Ketentuan tersebut tidak berlaku untuk layanan pihak ketiga, dan pengguna harus membaca ketentuan masing-masing layanan pihak ketiga.</li>
                                                </ol>
                                            </li>
                                            <li>
                                                <span>Tanggung Jawab Pengembang:</span>
                                                <ol type="a" style="list-style-type: lower-alpha" class="ml-4">
                                                    <li>Aplikasi disediakan apa adanya dan pengguna menggunakannya atas risiko sendiri.</li>
                                                    <li>Pengembang tidak bertanggung jawab atas kerugian atau kerusakan yang diakibatkan oleh penggunaan aplikasi ini.</li>
                                                </ol>
                                            </li>
                                            <li>
                                                <span>Penghentian Akses:</span>
                                                <ol type="a" style="list-style-type: lower-alpha" class="ml-4">
                                                    <li>Pengembang berhak untuk menghentikan akses pengguna ke aplikasi jika pengguna melanggar Syarat dan Ketentuan atau jika diperlukan oleh hukum.</li>
                                                </ol>
                                            </li>
                                            <li>
                                                <span>Komentar, Pertanyaan, dan Keluhan:</span>
                                                <ol type="a" style="list-style-type: lower-alpha" class="ml-4">
                                                    <li>Pengguna dapat mengirimkan komentar, pertanyaan, atau keluhan melalui kanal yang telah ditentukan oleh pengembang.</li>
                                                </ol>
                                            </li>
                                        </ol>
                                        <p>
                                            Harap dicatat bahwa syarat dan ketentuan di atas bersifat umum dan bisa disesuaikan dengan jenis aplikasi yang digunakan. Pastikan untuk menyusun syarat dan ketentuan secara lengkap, transparan, dan sesuai dengan hukum yang berlaku di wilayah pengguna aplikasi.
                                        </p>
                                        <div class="flex justify-center gap-6 mt-4">
                                            <button type="button" class="px-4 py-2 bg-primary text-white rounded-lg" @click="modelOpen = false; isTaCChecked = true">Saya mengerti dan setuju</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('footExtention')
    
@endsection
