<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('assets/user/images/homeLogo.png') }}" class="w-75">
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('adminDashboard') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Konfirmasi Transaksi
    </div>

    <!-- Nav Item -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
           aria-expanded="true" aria-controls="collapseOne">
            <i class="fas fa-fw fa-cash-register"></i>
            <span>Pemesanan</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Tipe pesanan</h6>
                <a class="collapse-item" href="{{ route('adminOrderWisata') }}">Wisata</a>
                <a class="collapse-item" href="{{ route('adminOrderExplore') }}">Explore</a>
            </div>
        </div>
    </li>

    <!-- Nav Item -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('adminWaste') }}">
            <i class="fas fa-fw fa-hand-sparkles"></i>
            <span>EcoWaste</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Kelola Konten
    </div>

    <!-- Nav Item -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('adminCarousel') }}">
            <i class="fas fa-fw fa-image"></i>
            <span>Carousel</span></a>
    </li>

    <!-- Nav Item -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('adminWisata') }}">
            <i class="fas fa-fw fa-mountain"></i>
            <span>EcoWisata</span></a>
    </li>

    <!-- Nav Item -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-umbrella-beach"></i>
            <span>EcoExplore</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kategori</h6>
                <a class="collapse-item" href="{{ route('adminExplore') }}">Explore</a>
                <a class="collapse-item" href="{{ route('adminExploreMeeting') }}">Meeting Point</a>
            </div>
        </div>
    </li>

    <!-- Nav Item -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('adminInsight') }}">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>EcoInsight</span></a>
    </li>

    <!-- Nav Item -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('adminVoucher') }}">
            <i class="fas fa-fw fa-tag"></i>
            <span>Voucher</span></a>
    </li>

    <!-- Divider -->
{{--    <hr class="sidebar-divider">--}}

    <!-- Heading -->
{{--    <div class="sidebar-heading">--}}
{{--        Admin--}}
{{--    </div>--}}

    <!-- Nav Item -->
{{--    <li class="nav-item">--}}
{{--        <a class="nav-link" href="#">--}}
{{--            <i class="fas fa-fw fa-user"></i>--}}
{{--            <span>User</span></a>--}}
{{--    </li>--}}

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
