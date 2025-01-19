<x-userlayout>
    {{-- Top content --}}
    <div class="2xl:w-full grid items-center justify-center">
        <div class=" grid items-center justify-center mt-[50px]">
            <h1 class="font-thai text-[50px] text-deepblue">
                ค้นหาคำศัพท์
            </h1>
        </div>
        <div class="flex justify-center items-center">
            <div class="flex justify-between items-center border-[1px] border-current w-[450px] p-[5px] rounded-[5px] ">
                <input type="text" placeholder="Search" class="w-[420px] focus:outline-none"><i
                    class="fa-solid fa-magnifying-glass  text-[20px] "></i>
            </div>
        </div>
    </div> 
    {{-- Middle Content --}}
    <div class="bg-deepblue p-[5px] mt-[10px] combo" onclick="">
        @foreach ($groups as $item)
        <a href="#" class="font-thai text-[#fff] p-[5px] mx-[2px] focus:text-[#00FF65]">{{$item["name"]}}</a>
        @endforeach
    </div>    
        <div class="bg-[#f5f5f5] w-full h-[500px]">

        </div> 
</x-userlayout>    