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
    
    <div class="bg-gradient-to-r from-primary w-2/12 fixed h-full pt-4 pl-4 hidden md:block">
        <a href="{{ route('home') }}" class="border-r-2 border-black font-bold text-xl pr-2">JonoBaldai</a>
        
        {{-- iš šitos dalies reikės padaryti componentą --}}
        <div class="flex flex-col mt-8">
            <a href="{{ route('baldai', 'kedes') }}" class="sidebar-buttons">
                <i class="fas fa-align-justify"></i> <p class="sidebar-text">Kėdės</p>
            </a>
            <a href="{{ route('baldai', 'komodos') }}" class="sidebar-buttons">
                <i class="fas fa-archive"></i> <p class="sidebar-text">Komodos</p>
            </a>
            <a href="{{ route('baldai', 'spintos') }}" class="sidebar-buttons">
                <i class="fas fa-align-justify"></i> <p class="sidebar-text">Spintos</p>
            </a>
            <a href="{{ route('baldai', 'irankiai') }}" class="sidebar-buttons">
                <i class="fas fa-wrench"></i> <p class="sidebar-text">Įrankiai</p>
            </a>
            <a href="{{ route('baldai', 'stalai') }}" class="sidebar-buttons">
                <i class="fas fa-align-justify"></i> <p class="sidebar-text">Stalai</p>
            </a>
            <a href="{{ route('baldai', 'akcijos') }}" class="sidebar-buttons">
                <i class="fas fa-credit-card"></i> <p class="sidebar-text">su akcija</p>
            </a>
        </div>
    </div>
    

    <div class="md:ml-[16.7%]">
        <nav class="bg-secondary md:rounded-b-2xl mb-12 sticky top-0">
            <div class=" w-full flex flex-col sm:flex-row justify-between items-center">
                <div class="flex self-start sm:self-center">
                    <a href="#" class="border-r-2 border-black font-bold text-xl px-2 self-center inline md:hidden">JB</a>
                    @auth
                    <a href="#" class="top-nav-items">{{ auth()->user()->first_name }}</a>
                    @endauth
                </div>
                <a href="#" class="toggler absolute top-3 right-4 flex sm:hidden flex-col justify-between w-8 h-5">
                    <span class="toggle-button"></span>
                    <span class="toggle-button"></span>
                    <span class="toggle-button"></span>
                </a>
                <div class="nav-buttons hidden sm:flex items-center">
                    @auth
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="top-nav-items"><i class="fas fa-sign-in-alt"></i> <span class="hidden sm:inline">Atsijungti</span></button> 
                    </form>
                    @endauth
                    @guest
                    <a href="{{ route('login') }}" class="top-nav-items">
                        <i class="fas fa-sign-in-alt"></i> <span class="hidden sm:inline">Prisijungti</span>
                    </a>
                    @endguest
                    <a href="{{ route('cart') }}" class="top-nav-items border-4 rounded-3xl border-black p-2 hover:bg-black hover:text-secondary">
                        <i class="fas fa-shopping-cart"></i> <span class="hidden sm:inline">Krepšelis </span>
                        @auth <span>{{ auth()->user()->cart_items_count() }}</span> @endauth
                        @guest <span>{{ cartItemCount() }}</span> @endguest
                    </a>
                    <a href="{{ route('wishList') }}" class="top-nav-items border-4 rounded-3xl border-black p-2 hover:bg-black hover:text-secondary">
                        <i class="fas fa-heart"></i> <span class="hidden sm:inline">Norai </span><span>0</span>
                    </a>
                </div>
            </div>
        </nav>

        <div class="mx-4">
            @yield('main')
        </div>
    </div>

    <script>
        const toggler = document.querySelectorAll(".toggler")[0]
        const buttons = document.querySelectorAll(".nav-buttons")[0]

        toggler.addEventListener('click', () => {
            buttons.classList.toggle("hidden")
            buttons.classList.toggle("flex")
        })
    </script>

    <script>

        function uuidv4() {
        return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
            var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
            return v.toString(16);
        });
        }

        function getCookie(cookieName) {
            let cookie = {};
            document.cookie.split(';').forEach(function(el) {
                let [key,value] = el.split('=');
                cookie[key.trim()] = value;
            })
            return cookie[cookieName];
        }

        let device = getCookie('device')

        if (device == null || device == undefined)
        {
            device = uuidv4()
        }

        document.cookie = 'device=' + device
    </script>
</body>
</html>