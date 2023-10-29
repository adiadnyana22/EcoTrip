<header class="bg-white py-2">
    <div class="container mx-auto">
        <nav class="flex justify-between items-center py-2">
            <div>
                <img src="{{ asset('assets/user/images/homeLogo.png') }}" alt="Logo" class="w-24">
            </div>
            <ul class="flex gap-8">
                <li class="list-none"><a href="#" class="text-gray flex justify-center items-center gap-2"><i class='bx bxs-bell text-2xl'></i></a></li>
                <li class="list-none"><a href="#" class="text-coin flex justify-center items-center gap-2"><i class='bx bx-coin text-2xl' ></i> {{ (!\Illuminate\Support\Facades\Auth::user()) ? "0" : number_format(\Illuminate\Support\Facades\Auth::user()->coin) }}</a></li>
                <li class="list-none"><a href="#" class="text-gray flex justify-center items-center gap-2"><i class='bx bxs-heart text-2xl'></i> Wishlist</a></li>
                <li class="list-none"><a href="#" class="text-gray flex justify-center items-center gap-2"><i class='bx bx-map-alt text-2xl'></i> My Trip</a></li>
                <li class="list-none"><a href="{{ route('logout') }}" class="text-gray flex justify-center items-center gap-2"><i class='bx bxs-user-circle text-2xl'></i> My Profile <i class='bx bx-chevron-down text-lg' ></i></a></li>
                @if(!\Illuminate\Support\Facades\Auth::user())
                    <li class="list-none"><a href="{{ route('login') }}" class="rounded py-2 px-4 text-white" style="background: linear-gradient(257deg, #3B9B88 -29.89%, rgba(59, 155, 136, 0.00) 106.79%), #134B40;">Register</a></li>
                @endif
            </ul>
        </nav>
    </div>
</header>
