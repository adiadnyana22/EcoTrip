<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Flickity -->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

    <link rel="stylesheet" href="{{ asset('assets/user/css/root.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/style.css') }}">
    @yield('headExtention')
</head>
<body>
    <main>
        @yield('content')
    </main>

    @yield('footExtention')

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
    <!-- Alpine -->
    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>
