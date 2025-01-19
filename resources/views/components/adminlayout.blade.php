<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
    <title>Admin page|Subkorat</title>
</head>
{{-- Top menu --}}
<body class="bg-[#f5f5f5]">
   <header >
       <nav class="combo2 relative h-[75px]" >
           <div class="pl-[40px] font-english text-[40px]">
               <a href="{{ route('admin.dashboard') }}">Subkorat</a>
            </div>
            <div class="flex justify-between w-[500px]">
                <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2">
                    <div class="combo2 border-[1px] border-current w-[250px] h-[35px] p-[5px] rounded-[40px] ">
                        <i class="fa-solid fa-magnifying-glass px-[10px]  text-[20px] "></i><input type="text" placeholder="Search" class="w-[200px] focus:outline-none appearance-none bg-[#f5f5f5]">
                    </div>
                </div>
            </div>
            <div class=" w-1/5  text-center relative grid place-items-center " x-data="{ open: false }">
                {{-- Dropdown menu button --}}
                <button x-on:click="open = !open" type="button"><i class="fa-solid fa-user text-[25px] text-black w-[37px] h-[37px] combo rounded-full bg-[#fff]" ></i>
                </button>
                {{-- Dropdown menu --}}
                <div class="bg-white shadow-lg absolute top-10 right-18 rounded-lg overflow-hidden" x-show="open"
                @click.outside="open= false">
                <p class="font-thai text-[#000] dark:text-gray-200">Hi: {{ Auth::guard('admin')->user()->username }}</p>
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button
                            class="block w-full font-thai text-left hover:bg-slate-100 text-[#000] pl-4 pr-8 py-2">Logout</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    
    {{-- middle content --}}
    <section class="flex justify-between top-[50px] ">
        <div class="flex flex-col w-[250px] ">
            <div class=" flex items-center justify-center  w-full h-[65px] ">
                <ul class="w-full h-[65px] "> 
                    <li>
                        <button id="Manageword"  class="flex items-center justify-stretch py-2 px-4 hover:bg-littleblue hover:text-white hover:rounded-[30px] w-full h-[65px] ">
                            <i class="fa-solid fa-list text-[20px] pr-4"></i> 
                            <span class="font-thai text-[13px]">จัดการคำศัพท์</span>
                            <i class="fas fa-chevron-down ml-auto"></i>
                        </button>
                        <ul id="dropdownManageword" class="space-y-2 pl-6 hidden">
                            <li>
                                <a href="{{ route('vocabularies.create') }}" class="py-4 px-10 block hover:bg-littleblue font-thai text-[13px] hover:text-[#fff] hover:rounded-[30px]">เพิ่มคำศัพท์ใหม่</a>
                            </li>
                        </ul>
                    </li>
                    <li class="flex h-[65px]">
                        <a href="#" class="flex items-center justify-start py-2 px-4 hover:bg-littleblue hover:text-white hover:rounded-[30px] w-full h-full ">
                            <i class="fa-solid fa-gamepad text-[20px] pr-4"></i> 
                            <span class="font-thai text-[13px]">มินิเกมศัพท์โคราช</span>
                        </a>
                    </li>
                    <li class="flex h-[65px]">
                        <a href="#" class="flex items-center justify-start py-2 px-4 hover:bg-littleblue hover:text-white hover:rounded-[30px] w-full h-full ">
                            <i class="fa-solid fa-comment-dots text-[20px] pr-4"></i> 
                            <span class="font-thai text-[13px]">จัดการการเสนอคำศัพท์</span>
                        </a>
                    </li>
                </div>
            </div>
            <div class="bg-[#fff] w-full rounded-[20px] h-full overflow-auto mx-4 shadow-lg">
                {{ $slot }}
            </div>
    </section>
    

    <script>
        // JavaScript to toggle dropdown menu visibility
        const manageMenuButton = document.getElementById('Manageword');
        const dropdownManageword = document.getElementById('dropdownManageword');

        manageMenuButton.addEventListener('click', () => {
            dropdownManageword.classList.toggle('hidden'); // Toggle visibility of dropdown menu
        });
    </script>
</body>
</html>