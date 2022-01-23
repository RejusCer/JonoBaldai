<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- font awesome --}}
    <script src="https://kit.fontawesome.com/a5ab502b29.js" crossorigin="anonymous"></script>

    <title>JonoBaldai</title>
</head>
<body>
    
    <div class="bg-primary w-2/12 fixed top-0 h-full pt-4 pl-4">
        <a href="#" class="border-r-2 border-black font-bold text-2xl pr-2 hidden md:inline">JonoBaldai</a>
        
        <div class="flex flex-col mt-8">
            <a href="#" class="sidebar-buttons"><i class="fas fa-align-justify"></i> <p class="sidebar-text">Kėdės</p></a>
            <a href="#" class="sidebar-buttons"><i class="fas fa-archive"></i> <p class="sidebar-text">Komodos</p></a>
            <a href="#" class="sidebar-buttons"><i class="fas fa-align-justify"></i> <p class="sidebar-text">Spintos</p></a>
            <a href="#" class="sidebar-buttons"><i class="fas fa-wrench"></i> <p class="sidebar-text">Įrankiai</p></a>
            <a href="#" class="sidebar-buttons"><i class="fas fa-align-justify"></i> <p class="sidebar-text">Stalai</p></a>
            <a href="#" class="sidebar-buttons"><i class="fas fa-credit-card"></i> <p class="sidebar-text">Išpardavimai</p></a>
        </div>
    </div>
    

    <div class="ml-[16.7%]">
        <nav>
            <div class="bg-secondary w-full flex justify-between items-center">
                <div class="flex">
                    <a href="#" class="top-nav-items">Susisiekime</a>
                    <a href="#" class="top-nav-items">Apie</a>
                </div>
                <div class="flex items-center">
                    <a href="#" class="top-nav-items"><i class="fas fa-sign-in-alt"></i> Prisijungti</a>
                    <a href="#" class="top-nav-items border-4 rounded-3xl border-black p-2 hover:bg-quatiary">
                        <i class="fas fa-shopping-cart"></i> Krepšelis 0
                    </a>
                    <a href="#" class="top-nav-items border-4 rounded-3xl border-black p-2 hover:bg-quatiary">
                        <i class="fas fa-heart"></i> Norai 0
                    </a>
                </div>
            </div>
        </nav>


        @yield('main')
    </div>
</body>
</html>