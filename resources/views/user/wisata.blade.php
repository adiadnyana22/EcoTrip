<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EcoTrip</title>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Flickity -->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

    <link rel="stylesheet" href="{{ asset('assets/user/css/root.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/style.css') }}">
</head>
<body>
<header class="bg-white py-2">
    <div class="container mx-auto">
        <nav class="flex justify-between items-center py-2">
            <div>
                <img src="{{ asset('assets/user/images/homeLogo.png') }}" alt="Logo" class="w-24">
            </div>
            <ul class="flex gap-8">
                <li class="list-none"><a href="#" class="text-gray flex justify-center items-center gap-2"><i class='bx bxs-bell text-2xl'></i></a></li>
                <li class="list-none"><a href="#" class="text-coin flex justify-center items-center gap-2"><i class='bx bx-coin text-2xl' ></i> 12.500</a></li>
                <li class="list-none"><a href="#" class="text-gray flex justify-center items-center gap-2"><i class='bx bxs-heart text-2xl'></i> Wishlist</a></li>
                <li class="list-none"><a href="#" class="text-gray flex justify-center items-center gap-2"><i class='bx bx-map-alt text-2xl'></i> My Trip</a></li>
                <li class="list-none"><a href="#" class="text-gray flex justify-center items-center gap-2"><i class='bx bxs-user-circle text-2xl'></i> My Profile <i class='bx bx-chevron-down text-lg' ></i></a></li>
                <li class="list-none"><a href="#" class="rounded py-2 px-4 text-white" style="background: linear-gradient(218deg, #71984F 0%, rgba(113, 152, 79, 0.00) 100%), #134B40;">Register</a></li>
            </ul>
        </nav>
    </div>
</header>

<section class="py-12">
    <div class="container mx-auto">
        <div class="flex justify-between py-5 mb-4">
            <div class="flex items-center gap-24">
                <a href="#"><i class='bx bx-chevron-left text-xl' ></i></a>
                <h1 class="text-4xl font-bold flex items-center gap-8">
                    <img src="{{ asset('assets/user/images/homeEcoWisataIcon.svg') }}" alt="Eco Wisata" class="w-8">
                    <span>EcoWisata</span>
                </h1>
            </div>
            <div>
                <i class='bx bx-search text-xl' ></i>
            </div>
        </div>
        <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-12 my-3">
            <a href="#">
                <img src="{{ asset('assets/user/images/homeExplore1.png') }}" alt="Explore" class="w-full h-48 object-cover rounded-lg">
                <div class="py-3">
                    <div class="flex justify-between items-center">
                        <div class="flex justify-center items-center text-gray gap-4">
                            <div><i class='bx bxs-star text-star' ></i> 4.5</div>
                        </div>
                        <div class="text-gray">Malang, Jawa Timur</div>
                    </div>
                    <h3 class="text-xl font-bold mt-3">Coban Rondo</h3>
                    <p class="mb-2 text-sm">Rp 15.000</p>
                </div>
            </a>
            <a href="#">
                <img src="{{ asset('assets/user/images/homeExplore2.png') }}" alt="Explore" class="w-full h-48 object-cover rounded-lg">
                <div class="py-3">
                    <div class="flex justify-between items-center">
                        <div class="flex justify-center items-center text-gray gap-4">
                            <div><i class='bx bxs-star text-star' ></i> 4.5</div>
                        </div>
                        <div class="text-gray">Malang, Jawa Timur</div>
                    </div>
                    <h3 class="text-xl font-bold mt-3">One Day Trip Bromo Tengger Semeru</h3>
                    <p class="mb-2 text-sm">Rp 15.000</p>
                </div>
            </a>
            <a href="#">
                <img src="{{ asset('assets/user/images/homeExplore3.png') }}" alt="Explore" class="w-full h-48 object-cover rounded-lg">
                <div class="py-3">
                    <div class="flex justify-between items-center">
                        <div class="flex justify-center items-center text-gray gap-4">
                            <div><i class='bx bxs-star text-star' ></i> 4.5</div>
                        </div>
                        <div class="text-gray">Malang, Jawa Timur</div>
                    </div>
                    <h3 class="text-xl font-bold mt-3">One Day Trip Batu Malang</h3>
                    <p class="mb-2 text-sm">Rp 15.000</p>
                </div>
            </a>
            <a href="#">
                <img src="{{ asset('assets/user/images/homeExplore1.png') }}" alt="Explore" class="w-full h-48 object-cover rounded-lg">
                <div class="py-3">
                    <div class="flex justify-between items-center">
                        <div class="flex justify-center items-center text-gray gap-4">
                            <div><i class='bx bxs-star text-star' ></i> 4.5</div>
                        </div>
                        <div class="text-gray">Malang, Jawa Timur</div>
                    </div>
                    <h3 class="text-xl font-bold mt-3">Coban Rondo</h3>
                    <p class="mb-2 text-sm">Rp 15.000</p>
                </div>
            </a>
            <a href="#">
                <img src="{{ asset('assets/user/images/homeExplore2.png') }}" alt="Explore" class="w-full h-48 object-cover rounded-lg">
                <div class="py-3">
                    <div class="flex justify-between items-center">
                        <div class="flex justify-center items-center text-gray gap-4">
                            <div><i class='bx bxs-star text-star' ></i> 4.5</div>
                        </div>
                        <div class="text-gray">Malang, Jawa Timur</div>
                    </div>
                    <h3 class="text-xl font-bold mt-3">One Day Trip Bromo Tengger Semeru</h3>
                    <p class="mb-2 text-sm">Rp 15.000</p>
                </div>
            </a>
            <a href="#">
                <img src="{{ asset('assets/user/images/homeExplore3.png') }}" alt="Explore" class="w-full h-48 object-cover rounded-lg">
                <div class="py-3">
                    <div class="flex justify-between items-center">
                        <div class="flex justify-center items-center text-gray gap-4">
                            <div><i class='bx bxs-star text-star' ></i> 4.5</div>
                        </div>
                        <div class="text-gray">Malang, Jawa Timur</div>
                    </div>
                    <h3 class="text-xl font-bold mt-3">One Day Trip Batu Malang</h3>
                    <p class="mb-2 text-sm">Rp 15.000</p>
                </div>
            </a>
            <a href="#">
                <img src="{{ asset('assets/user/images/homeExplore1.png') }}" alt="Explore" class="w-full h-48 object-cover rounded-lg">
                <div class="py-3">
                    <div class="flex justify-between items-center">
                        <div class="flex justify-center items-center text-gray gap-4">
                            <div><i class='bx bxs-star text-star' ></i> 4.5</div>
                        </div>
                        <div class="text-gray">Malang, Jawa Timur</div>
                    </div>
                    <h3 class="text-xl font-bold mt-3">Coban Rondo</h3>
                    <p class="mb-2 text-sm">Rp 15.000</p>
                </div>
            </a>
            <a href="#">
                <img src="{{ asset('assets/user/images/homeExplore2.png') }}" alt="Explore" class="w-full h-48 object-cover rounded-lg">
                <div class="py-3">
                    <div class="flex justify-between items-center">
                        <div class="flex justify-center items-center text-gray gap-4">
                            <div><i class='bx bxs-star text-star' ></i> 4.5</div>
                        </div>
                        <div class="text-gray">Malang, Jawa Timur</div>
                    </div>
                    <h3 class="text-xl font-bold mt-3">One Day Trip Bromo Tengger Semeru</h3>
                    <p class="mb-2 text-sm">Rp 15.000</p>
                </div>
            </a>
            <a href="#">
                <img src="{{ asset('assets/user/images/homeExplore3.png') }}" alt="Explore" class="w-full h-48 object-cover rounded-lg">
                <div class="py-3">
                    <div class="flex justify-between items-center">
                        <div class="flex justify-center items-center text-gray gap-4">
                            <div><i class='bx bxs-star text-star' ></i> 4.5</div>
                        </div>
                        <div class="text-gray">Malang, Jawa Timur</div>
                    </div>
                    <h3 class="text-xl font-bold mt-3">One Day Trip Batu Malang</h3>
                    <p class="mb-2 text-sm">Rp 15.000</p>
                </div>
            </a>
        </div>
    </div>
</section>

<section class="py-24">
    <div class="container mx-auto">
        <div class="px-24 py-16 rounded-lg h-96 flex justify-end flex-col" style="background: linear-gradient(213deg, rgba(113, 152, 79, 0.50) 0%, rgba(0, 0, 0, 0.00) 100%), #134B40;">
            <h2 class="text-white text-5xl font-bold mb-4">#KiniSaatnyaBijakBerwisata</h2>
            <p class="text-white mb-6">Ecotourism is The Future of Indonesia’s Travel</p>
            <ul class="list-none flex gap-5">
                <li><a href="#" class="rounded-full text-white border border-white flex justify-center items-center w-12 h-12 text-2xl"><i class='bx bxl-instagram' ></i></a></li>
                <li><a href="#" class="rounded-full text-white border border-white flex justify-center items-center w-12 h-12 text-2xl"><i class='bx bxl-twitter' ></i></a></li>
                <li><a href="#" class="rounded-full text-white border border-white flex justify-center items-center w-12 h-12 text-2xl"><i class='bx bxl-facebook' ></i></a></li>
                <li><a href="#" class="rounded-full text-white border border-white flex justify-center items-center w-12 h-12 text-2xl"><i class='bx bxl-play-store' ></i></a></li>
            </ul>
        </div>
    </div>
</section>

<footer class="py-12">
    <div class="container mx-auto">
        <div class="flex justify-between item-center">
            <div>Eco Trip &copy; 2023</div>
            <div class="flex justify-center items-center grow gap-6">
                <a href="#">Tentang Kami</a>
                <div class="border border-gray w-px h-full"></div>
                <a href="#">Kebijakan Privasi</a>
            </div>
        </div>
    </div>
</footer>

<!-- Tailwind -->
<script src="https://cdn.tailwindcss.com"></script>
<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    primary: '#134B40',
                    secondary: '#71984F',
                    star: '#FFA008',
                    coin: '#FFA008',
                    gray: '#B4B4B4',
                    black: '#000000',
                    white: '#FFFFFF',
                    blue: '#305FA6'
                }
            }
        }
    }
</script>
<!-- Flickity -->
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
</body>
</html>
