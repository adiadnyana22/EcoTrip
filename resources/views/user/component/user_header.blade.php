<header class="bg-white py-2">
    <div class="container mx-auto">
        <nav class="flex justify-between items-center py-2">
            <a href="{{ route('home') }}">
                <img src="{{ asset('assets/user/images/homeLogo.png') }}" alt="Logo" class="w-24">
            </a>
            <ul class="flex gap-8">
                <li class="list-none"><a href="{{ route('notification') }}" class="text-gray flex justify-center items-center gap-2 transition hover:text-black"><i class='bx bxs-bell text-2xl'></i></a></li>
                <li class="list-none"><a href="{{ route('coin') }}" class="text-coin flex justify-center items-center gap-2"><i class='bx bx-coin text-2xl' ></i> {{ (!\Illuminate\Support\Facades\Auth::user()) ? "0" : number_format(\Illuminate\Support\Facades\Auth::user()->coin) }}</a></li>
                <li class="list-none"><a href="{{ route('wishlist') }}" class="text-gray flex justify-center items-center gap-2 transition hover:text-black"><i class='bx bxs-heart text-2xl'></i> Wishlist</a></li>
                <li class="list-none"><a href="{{ route('history') }}" class="text-gray flex justify-center items-center gap-2 transition hover:text-black"><i class='bx bx-map-alt text-2xl'></i> My Trip</a></li>
                <li class="list-none">
                    <div x-data="{dropdownMenu: false}" class="relative">
                        <!-- Dropdown toggle button -->
                        <button @click="dropdownMenu = ! dropdownMenu" class="flex items-center bg-white rounded-md">
                            <span class="text-gray flex justify-center items-center gap-2 transition hover:text-black"><i class='bx bxs-user-circle text-2xl'></i> My Profile <i class='bx bx-chevron-down text-lg' ></i></span>
                        </button>
                        <!-- Dropdown list -->
                        <div x-show="dropdownMenu" x-on:click.away="dropdownMenu = false" style="z-index: 999" class="absolute right-0 py-2 mt-2 bg-white bg-gray-100 rounded-md shadow-xl w-44">
                            <a href="{{ route('profile') }}" class="block px-4 py-2 text-gray hover:bg-gray-400 hover:text-black flex gap-2 items-center">
                                <i class='bx bxs-user-detail text-xl' ></i> Detail Profile
                            </a>
                            <a href="{{ route('voucher') }}" class="block px-4 py-2 text-gray hover:bg-gray-400 hover:text-black flex gap-2 items-center">
                                <i class='bx bxs-purchase-tag text-xl'></i> Voucher
                            </a>
                            <a href="{{ route('faq') }}" class="block px-4 py-2 text-gray hover:bg-gray-400 hover:text-black flex gap-2 items-center">
                                <i class='bx bx-question-mark text-xl'></i> FAQ
                            </a>
                            <a href="{{ route('logout') }}" class="block px-4 py-2 text-gray hover:bg-gray-400 hover:text-black flex gap-2 items-center">
                                <i class='bx bx-log-out text-xl'></i> Logout
                            </a>
                        </div>
                    </div>
                </li>
                @if(!\Illuminate\Support\Facades\Auth::user())
                    <li class="list-none"><a href="{{ route('login') }}" class="rounded py-2 px-4 text-white" style="background: linear-gradient(257deg, #3B9B88 -29.89%, rgba(59, 155, 136, 0.00) 106.79%), #134B40;">Register</a></li>
                @endif
            </ul>
        </nav>
    </div>
</header>
