<x-userlayout>
    @auth

        <body>
            <section>
                {{-- Top content --}}
                <div class="2xl: w-full flex flex-col items-center justify-center">
                    <div class=" grid items-center justify-center mt-[50px]">
                        <h1 class="font-thai text-[50px] text-deepblue">
                            ค้นหาคำศัพท์
                        </h1>
                    </div>
                    <form method="GET" action="{{ route('search') }}" class="mb-4 w-1/2">
                        <div class="combo">
                            <input type="text" name="search" placeholder="ค้นหาคำศัพท์..." value="{{ request('search') }}"
                                class="w-full p-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <button type="submit"
                                class="h-[42px] px-2 bg-blue-500 text-white rounded-r-lg hover:bg-blue-600">ค้นหา</button>
                        </div>
                    </form>
                </div>
            </div>
                    <div class="w-full combo my-4">
                    <table class="w-[1140px]  bg-white rounded-lg overflow-hidden drop-shadow-2xl">
                        <thead class="">
                            <tr class="font-thai text-[20px] text-[#fff] bg-deepblue">
                                <th class="w-1/6 px-4 py-2">คำโคราช</th>
                                <th class="w-2/6">คำอ่าน</th>
                                <th class="w-3/6">ความหมาย</th>
                                <th class="w-1/6">เสียง</th>
                            </tr>    
                        </thead>   
                        <tbody>
                            @foreach ($words as $word)  
                            <tr class="odd:bg-[#b7daee] divide-y divide-gray-300 font-thai even:bg-white">
                                <td class="py-2 px-4 border-r-2">{{ $word->word }}</td>
                                <td class="py-2 px-4 border-r-2">{{ $word->pronunciation }}</td>
                                <td class="py-2 px-4 border-r-2">{{ $word->meaning }}</td>
                                <td class="py-2 px-4 text-center">
                                    <button onclick="playAudio('{{ asset('storage/' . $word->audio_file) }}')"
                                        class="text-deepblue  hover:text-blue-700 mt-[4px]">
                                        <i class="fa-solid fa-volume-low text-[30px] text-center"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody> 
                    </table>    
                    </div>

                {{-- middel Content --}}
                <div class="mb-[30px]">
                    <div class="font-thai text-deepblue combo h-[50px] mb-[10px]">
                        <h1 class="text-[20px] h-[50px] combo bg-deepblue text-[#fff] rounded-full w-[270px] ">
                            หมวดหมู่คำศัพท์
                        </h1>
                    </div>
                    <div class="grid grid-cols-4 gap-[10px] w-[1140px] m-auto pt-[10px]">
                        <div class="w-[300px] h-[350px] flex justify-center w-full">
                            <div class="flex flex-col justify-center items-center">
                                <a href="#"><img src={{ asset('img/animal.png') }}
                                        alt=""class="grid w-[270px] h-[270px] rounded-[10px]"></a>
                            </div>
                        </div>
                        <div class="w-[300px] h-[350px] flex justify-center w-full">
                            <div class="flex flex-col justify-center items-center">
                                <a href=""><img src={{ asset('img/movement.png') }}
                                        alt=""class="grid w-[270px] h-[270px] rounded-[10px]"></a>
                            </div>
                        </div>
                        <div class="w-[300px] h-[350px] flex justify-center w-full">
                            <div class="flex flex-col justify-center items-center">
                                <a href=""><img src={{ asset('img/mood.png') }}
                                        alt=""class="grid w-[270px] h-[270px] rounded-[10px]"></a>
                            </div>
                        </div>
                        <div class="w-[300px] h-[350px] flex justify-center w-full">
                            <div class="flex flex-col justify-center items-center">
                                <a href=""><img src={{ asset('img/place.png') }}
                                        alt=""class="grid w-[270px] h-[270px] rounded-[10px]"></a>
                            </div>
                        </div>
                        <div class="w-[300px] h-[350px] flex justify-center w-full">
                            <div class="flex flex-col justify-center items-center">
                                <a href="#"><img src={{ asset('img/food.png') }}
                                        alt=""class="grid w-[270px] h-[270px] rounded-[10px]"></a>
                            </div>
                        </div>
                        <div class="w-[300px] h-[350px] flex justify-center w-full">
                            <div class="flex flex-col justify-center items-center">
                                <a href="#"><img src={{ asset('img/time.png') }}
                                        alt=""class="grid w-[270px] h-[270px] rounded-[10px]"></a>
                            </div>
                        </div>
                        <div class="w-[300px] h-[350px] flex justify-center w-full">
                            <div class="flex flex-col justify-center items-center">
                                <a href="#"><img src={{ asset('img/nature.png') }}
                                        alt=""class="grid w-[270px] h-[270px] rounded-[10px]"></a>
                            </div>
                        </div>
                        <div class="w-[300px] h-[350px] flex justify-center w-full">
                            <div class="flex flex-col justify-center items-center">
                                <a href="#"><img src={{ asset('img/hi.png') }}
                                        alt=""class="grid w-[270px] h-[270px] rounded-[10px]"></a>
                            </div>
                        </div>
                    </div>
                    <hr class="border-[1px] border-black">
                </div>
            </section>

        </body>
    @endauth
    <x-footer></x-footer>
    <script>
        let currentAudio = null; // เก็บออบเจ็กต์เสียงที่กำลังเล่น
    
        function playAudio(audioUrl) {
            // หยุดเสียงที่เล่นอยู่ถ้ามี
            if (currentAudio) {
                currentAudio.pause();
                currentAudio.currentTime = 0; // รีเซ็ตเสียง
            }
    
            // สร้างออบเจ็กต์ Audio ใหม่
            currentAudio = new Audio(audioUrl);
            currentAudio.play();
        }
    </script>
</x-userlayout>
