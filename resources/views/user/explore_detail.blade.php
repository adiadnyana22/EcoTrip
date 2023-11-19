@extends('user.component.user_template')

@section('title', 'EcoTrip')

@section('headExtention')
    <style>
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .flickity-button {
            background: #000 !important;
            outline: none;
        }
        .flickity-button:hover {
            background: #1a202c;
        }

        .flickity-prev-next-button {
            width: 30px;
            height: 30px;
            border-radius: 5px;
        }

        .flickity-button-icon {
            fill: white;
        }

        .flickity-prev-next-button.previous {
            left: 20px;
        }
        .flickity-prev-next-button.next {
            right: 20px;
        }
    </style>
@endsection

@section('content')
    <section class="py-12">
        <div class="container mx-auto">
            <div class="my-5">
                <img src="{{ asset('assets/user/images/wisata/'.$explore->picture) }}" alt="Wisata" class="w-full max-h-96 object-cover rounded-xl">
                @if(count($exploreImgList) > 0)
                <div class="main-carousel mt-3" data-flickity='{ "cellAlign": "left", "contain": true, "pageDots": false }'>
                    @foreach($exploreImgList as $img)
                        <div class="carousel-cell w-80 mr-3 max-h-32 object-cover">
                            <img src="{{ asset('assets/user/images/wisata/'.$img->picture) }}" alt="Banner" class="w-full rounded-xl max-h-32 object-cover">
                        </div>
                    @endforeach
                </div>
                @endif
            </div>
            <div class="flex gap-12" x-data="app()" x-init="[initDate(), getNoOfDays()]">
                <div class="basis-3/5">
                    <div class="pb-6">
                        <h1 class="text-4xl font-bold mt-6 mb-8">{{ $explore->name }}</h1>
                        <div class="flex items-center gap-8">
                            <p class="text-gray font-bold">HARGA TIKET</p>
                            <div class="relative">
                                <img src="{{ asset('assets/user/images/lokal.png') }}" alt="Lokal" class="w-52">
                                <div class="absolute top-3 right-4 text-primary font-bold text-sm" x-text="(isWeekend() ? 'Rp' + new Intl.NumberFormat('en-ID').format(weekendPrice) : 'Rp' + new Intl.NumberFormat('en-ID').format(weekdayPrice))"></div>
                            </div>
                            <div class="relative">
                                <img src="{{ asset('assets/user/images/asing.png') }}" alt="Asing" class="w-52">
                                <div class="absolute top-3 right-4 text-blue font-bold text-sm" x-text="(isWeekend() ? 'Rp' + new Intl.NumberFormat('en-ID').format(weekendForeignPrice) : 'Rp' + new Intl.NumberFormat('en-ID').format(weekdayForeignPrice))"></div>
                            </div>
                        </div>
                    </div>
                    <div class="py-6">
                        <ul class="flex items-center gap-6">
                            <li><div id="btnDeskripsi" class="cursor-pointer">Deskripsi<hr class="w-4/5 mx-auto mt-1"></div></li>
                            <li><div id="btnItinerary" class="text-gray cursor-pointer">Itinerary<hr class="w-0 mx-auto mt-1"></div></li>
                        </ul>
                        <div id="deskripsi">
                            <div class="pt-6 pb-2">
                                <h2 class="mb-3 font-bold text-gray">DESKRIPSI TEMPAT WISATA</h2>
                                <p class="text-justify mb-2">
                                    {{ $explore->description }}
                                </p>
                            </div>
                            <div class="pt-6 pb-2">
                                <h2 class="mb-3 font-bold text-gray">AKTIVITAS</h2>
                                <ul class="flex flex-wrap gap-x-8 gap-y-5 my-5">
                                    @foreach(explode(',', $explore->activity) as $activity)
                                        <li class="flex gap-2"><i class='bx bx-check text-primary bg-primary/5 p-1.5 rounded-full'></i> {{ trim($activity) }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="pt-6 pb-2">
                                <h2 class="mb-3 font-bold text-gray">AKTIVITAS</h2>
                                <ul class="my-5 flex flex-col gap-3">
                                    @foreach(explode(',', $explore->includes) as $includes)
                                        <li class="rounded border-l-4 border-l-primary border-r border-r-gray border-t border-t-gray/25 border-b border-b-gray px-6 py-3"> {{ trim($includes) }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div id="itinerary" style="display: none">
                            <div class="pt-6 pb-2">
                                <h2 class="mb-3 font-bold text-gray">ITINERARY</h2>
                                <ul class="flex my-5 flex-col gap-3 relative">
                                    @foreach(explode(',', $explore->itinerary) as $itinerary)
                                    <li class="flex gap-4 items-center"><i class='bx bx-radio-circle-marked text-secondary text-3xl'></i> {{ $itinerary }}</li>
                                    @endforeach
                                    <div class="absolute left-3.5 top-4 border-l-2 border-secondary" style="height: calc(100% - 2rem)"></div>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="basis-2/5" x-data="{ count: 1, price: @json((Carbon\Carbon::now()->isWeekend()) ? $explore->local_weekend_price : $explore->local_price) }">
                    <div class="sticky top-8">
                        <div class="mt-5">
                            <span class="rounded-full py-2.5 px-5 text-white mb-3 inline-block" style="background: linear-gradient(257deg, #3B9B88 -29.89%, rgba(59, 155, 136, 0.00) 106.79%), #134B40;">@if($explore->type == 0) {{ "Private Trip" }} @elseif($explore->type == 1) {{ "Open Trip" }} @endif</span>
                        </div>
                        <form action="{{ route('pemesananExplore1') }}" method="POST" class="p-8 w-full shadow-lg rounded-xl">
                            @csrf
                            <p class="text-gray">PEMBELIAN TIKET</p>
                            <h2 class="font-bold text-2xl my-2">{{ $explore->name }}</h2>
                            <div class="flex justify-between flex-wrap items-center my-5">
                                <label for="#">Pilih Tanggal</label>
                                <!-- Datepicker -->
                                <div x-cloak>
                                    <div class="container mx-auto cursor-pointer">
                                        <div class="w-64">
                                            <div class="relative">
                                                <input type="hidden" name="date" x-ref="date" :value="datepickerValue" />
                                                <input type="text" x-on:click="showDatepicker = !showDatepicker" x-model="datepickerValue" x-on:keydown.escape="showDatepicker = false" class="w-full pl-4 pr-10 py-3 leading-none rounded-lg shadow-sm focus:outline-none text-gray-600 font-medium focus:ring focus:ring-blue-600 focus:ring-opacity-50 cursor-pointer" placeholder="Select date" readonly />

                                                <div class="absolute top-0 right-0 px-3 py-2" x-on:click="showDatepicker = !showDatepicker">
                                                    <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                </div>

                                                <!-- <div x-text="no_of_days.length"></div>
                                                              <div x-text="32 - new Date(year, month, 32).getDate()"></div>
                                                              <div x-text="new Date(year, month).getDay()"></div> -->

                                                <div class="bg-white mt-12 rounded-lg shadow p-4 absolute top-0 left-0" style="width: 17rem" x-show.transition="showDatepicker" @click.away="showDatepicker = false">
                                                    <div class="flex justify-between items-center mb-2">
                                                        <div>
                                                            <span x-text="MONTH_NAMES[month]" class="text-lg font-bold text-gray-800"></span>
                                                            <span x-text="year" class="ml-1 text-lg text-gray-600 font-normal"></span>
                                                        </div>
                                                        <div>
                                                            <button type="button" class="focus:outline-none focus:shadow-outline transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-100 p-1 rounded-full" @click="if (month == 0) {
												year--;
												month = 12;
											} month--; getNoOfDays()">
                                                                <svg class="h-6 w-6 text-gray-400 inline-flex" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                                                </svg>
                                                            </button>
                                                            <button type="button" class="focus:outline-none focus:shadow-outline transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-100 p-1 rounded-full" @click="if (month == 11) {
												month = 0;
												year++;
											} else {
												month++;
											} getNoOfDays()">
                                                                <svg class="h-6 w-6 text-gray-400 inline-flex" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <div class="flex flex-wrap mb-3 -mx-1">
                                                        <template x-for="(day, index) in DAYS" :key="index">
                                                            <div style="width: 14.26%" class="px-0.5">
                                                                <div x-text="day" class="text-gray-800 font-medium text-center text-xs"></div>
                                                            </div>
                                                        </template>
                                                    </div>

                                                    <div class="flex flex-wrap -mx-1">
                                                        <template x-for="blankday in blankdays">
                                                            <div style="width: 14.28%" class="text-center border p-1 border-transparent text-sm"></div>
                                                        </template>
                                                        <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">
                                                            <div style="width: 14.28%" class="px-1 mb-1">
                                                                <div @click="getDateValue(date)" x-text="date" class="cursor-pointer text-center text-sm leading-none rounded-full leading-loose transition ease-in-out duration-100" :class="{
                      'border border-primary text-primary': isToday(date) == true,
                      'text-black hover:bg-primary hover:text-white': isToday(date) == false && isSelectedDate(date) == false,
                      'bg-primary/10 text-primary hover:bg-opacity-75': isSelectedDate(date) == true
                    }"></div>
                                                            </div>
                                                        </template>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Datepicker -->
                            </div>
                            <div class="flex justify-between flex-wrap items-center my-5">
                                <label for="#">Jumlah Peserta</label>
                                <div class="flex items-center gap-2">
                                    <button type="button" class="py-1 px-3 bg-black rounded text-white text-xl" x-on:click="count = Math.max(count - 1, 1)">-</button>
                                    <input type="number" x-model="count" name="qty" class="w-12 text-center outline-none text-xl">
                                    <button type="button" class="py-1 px-3 bg-black rounded text-white text-xl" x-on:click="count = Math.min(count + 1, 10)">+</button>
                                </div>
                            </div>
                            <div class="py-5 flex justify-between items-center">
                                <div class="text-gray text-xl font-bold">TOTAL HARGA</div>
                                <strong class="font-bold text-2xl">Rp <span x-text="new Intl.NumberFormat('en-ID').format(count * price)"></span></strong>
                            </div>
                            <input type="hidden" name="explore_id" value="{{ $explore->id }}">
                            <button class="w-full px-4 py-3 mt-2 rounded-xl bg-primary text-white">Pesan Sekarang</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footExtention')
    <script src="//unpkg.com/alpinejs" defer></script>
    <script>
        let btnDeskripsi = document.querySelector("#btnDeskripsi");
        let btnItinerary = document.querySelector("#btnItinerary");
        let deskripsi = document.querySelector("#deskripsi");
        let itinerary = document.querySelector("#itinerary");

        btnDeskripsi.addEventListener('click', () => {
            deskripsi.style.display = "block";
            itinerary.style.display = "none";
            document.querySelector("#btnDeskripsi").classList.remove("text-gray");
            document.querySelector("#btnDeskripsi hr").classList.add("w-4/5");
            document.querySelector("#btnDeskripsi hr").classList.remove("w-0");
            document.querySelector("#btnItinerary").classList.add("text-gray");
            document.querySelector("#btnItinerary hr").classList.remove("w-4/5");
            document.querySelector("#btnItinerary hr").classList.add("w-0");
        });

        btnItinerary.addEventListener('click', () => {
            deskripsi.style.display = "none";
            itinerary.style.display = "block";
            document.querySelector("#btnDeskripsi").classList.add("text-gray");
            document.querySelector("#btnDeskripsi hr").classList.remove("w-4/5");
            document.querySelector("#btnDeskripsi hr").classList.add("w-0");
            document.querySelector("#btnItinerary").classList.remove("text-gray");
            document.querySelector("#btnItinerary hr").classList.add("w-4/5");
            document.querySelector("#btnItinerary hr").classList.remove("w-0");
        });
    </script>
    <script>
        const MONTH_NAMES = [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December",
        ];
        const MONTH_SHORT_NAMES = [
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
            "Nov",
            "Dec",
        ];
        const DAYS = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

        function app() {
            return {
                showDatepicker: false,
                datepickerValue: "",
                dateFormat: "d MMM YYYY",
                month: "",
                year: "",
                no_of_days: [],
                blankdays: [],
                weekendPrice: {{ $explore->local_weekend_price }},
                weekdayPrice: {{ $explore->local_price }},
                weekendForeignPrice: {{ $explore->foreign_weekend_price }},
                weekdayForeignPrice: {{ $explore->foreign_price }},
                isWeekend() {
                    return (new Date(this.datepickerValue).getDay() === 6 || new Date(this.datepickerValue).getDay() === 0);
                },
                initDate() {
                    let today;
                    if (this.selectedDate) {
                        today = new Date(Date.parse(this.selectedDate));
                    } else {
                        today = new Date();
                    }
                    this.month = today.getMonth();
                    this.year = today.getFullYear();
                    this.datepickerValue = this.formatDateForDisplay(
                        today
                    );
                },
                formatDateForDisplay(date) {
                    let formattedDay = DAYS[date.getDay()];
                    let formattedDate = ("0" + date.getDate()).slice(
                        -2
                    ); // appends 0 (zero) in single digit date
                    let formattedMonth = MONTH_NAMES[date.getMonth()];
                    let formattedMonthShortName =
                        MONTH_SHORT_NAMES[date.getMonth()];
                    let formattedMonthInNumber = (
                        "0" +
                        (parseInt(date.getMonth()) + 1)
                    ).slice(-2);
                    let formattedYear = date.getFullYear();
                    if (this.dateFormat === "DD-MM-YYYY") {
                        return `${formattedDate}-${formattedMonthInNumber}-${formattedYear}`; // 02-04-2021
                    }
                    if (this.dateFormat === "YYYY-MM-DD") {
                        return `${formattedYear}-${formattedMonthInNumber}-${formattedDate}`; // 2021-04-02
                    }
                    if (this.dateFormat === "DD/MM/YYYY") {
                        return `${formattedDate}/${formattedMonthInNumber}/${formattedYear}`; // 02-04-2021
                    }
                    if (this.dateFormat === "D d M, Y") {
                        return `${formattedDay} ${formattedDate} ${formattedMonthShortName} ${formattedYear}`; // Tue 02 Mar 2021
                    }
                    if (this.dateFormat === "d MMM YYYY") {
                        return `${formattedDate} ${formattedMonthShortName} ${formattedYear}`; // Tue 02 Mar 2021
                    }
                    return `${formattedDay} ${formattedDate} ${formattedMonth} ${formattedYear}`;
                },
                isSelectedDate(date) {
                    const d = new Date(this.year, this.month, date);
                    return this.datepickerValue ===
                    this.formatDateForDisplay(d) ?
                        true :
                        false;
                },
                isToday(date) {
                    const today = new Date();
                    const d = new Date(this.year, this.month, date);
                    return today.toDateString() === d.toDateString() ?
                        true :
                        false;
                },
                getDateValue(date) {
                    let selectedDate = new Date(
                        this.year,
                        this.month,
                        date
                    );
                    this.datepickerValue = this.formatDateForDisplay(
                        selectedDate
                    );
                    // this.$refs.date.value = selectedDate.getFullYear() + "-" + ('0' + formattedMonthInNumber).slice(-2) + "-" + ('0' + selectedDate.getDate()).slice(-2);
                    this.isSelectedDate(date);
                    this.showDatepicker = false;
                },
                getNoOfDays() {
                    let daysInMonth = new Date(
                        this.year,
                        this.month + 1,
                        0
                    ).getDate();
                    // find where to start calendar day of week
                    let dayOfWeek = new Date(
                        this.year,
                        this.month
                    ).getDay();
                    let blankdaysArray = [];
                    for (var i = 1; i <= dayOfWeek; i++) {
                        blankdaysArray.push(i);
                    }
                    let daysArray = [];
                    for (var i = 1; i <= daysInMonth; i++) {
                        daysArray.push(i);
                    }
                    this.blankdays = blankdaysArray;
                    this.no_of_days = daysArray;
                },
            };
        }
    </script>
@endsection
