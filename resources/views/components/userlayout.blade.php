<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite('resources/css/app.css')
    <title>|SubKorat</title>
</head>

<body>

    @auth
        <nav class="flex bg-deepblue  justify-between h-[50px] items-center p-[20px] ">
            <div class="flex w-[455px] h-[50px] items-center ">
                <a href="{{ route('account.dashboard') }}" class="text-[#fff] text-[30px] font-english">SubKorat</a>
            </div>
            <div class="flex text-[#fff] justify-between  w-[700px] h-[50px] items-center pl-[140px]">
                <div class="flex w-[450px] justify-between px-[0.5px] font-thai">
                    <a href="/consonant">คำศัพท์ตามพยัญชนะ</a>
                    <a href="{{ route('accont.commnet') }}">เสนอคำศัพท์</a>
                    <a href="{{ route('account.game') }}">มินิเกมคำศัพท์โคราช</a>
                </div>

                <div class=" w-1/5  text-center relative grid py-[4px] place-items-end " x-data="{ open: false }">
                    {{-- Dropdown menu button --}}
                    <button x-on:click="open = !open" type="button"
                        class="font-thai text-[#fff] dark:text-gray-200"><i class="fa-solid fa-user text-[25px] text-black w-[37px] h-[37px] combo rounded-full bg-[#fff]" ></i></button>

                    {{-- Dropdown menu --}}
                    <div class="bg-white shadow-lg absolute top-10 right-1 rounded-lg overflow-hidden" x-show="open"
                        @click.outside="open= false">
                        <p class="font-thai text-[#000] text-[15px] pl-4 pr-8 py-2">Hi: {{ Auth::user()->username }}</p>
                        <form action="{{ route('account.logout') }}" method="POST">
                            @csrf
                            <button
                                class="block w-full font-thai text-left hover:bg-deepblue hover:text-[#fff] text-[#000] pl-4 pr-8 py-2">Logout</button>
                        </form>
                    </div>
                </div>
            @endauth
            @guest
                <nav
                    class="flex bg-deepblue  justify-between h-[50px] items-center p-[20px]">
                    <div class="flex w-[455px] h-[50px] items-center ">
                        <a href="{{ route('home') }}" class="text-[#fff] text-[30px] font-english">SubKorat</a>
                    </div>
                    <div class="flex text-[#fff] justify-between  pl-[150px] w-[700px] h-[50px] items-center">
                        <div class="flex w-[450px] justify-between px-[0.5px] font-thai">
                            <a href="/consonant">คำศัพท์ตามพยัญชนะ</a>
                            <a href="{{ route('accont.commnet') }}">เสนอคำศัพท์</a>
                            <a href="{{ route('account.game') }}">มินิเกมคำศัพท์โคราช</a>
                        </div>
                        </div>
                        <div class="flex h-[40px] w-[170px] justify-between items-center ">
                            <a href="{{ route('account.login') }}" class="font-english text-[#fff]">Login</a>
                            <a href="{{ route('account.register') }}"
                                class="bg-[#fff] text-deepblue px-[20px] py-[8px] rounded-[10px] font-english">Sign up</a>
                        </div>
                    @endguest


                </div>
            </nav>
            <main>
                {{ $slot }}
            </main>
</body>

</html>
