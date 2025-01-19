<x-userlayout>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold font-thai mb-4">ค้นหาคำศัพท์</h1>
    
        <!-- ฟอร์มค้นหา -->
        <form method="GET" action="{{ route('search') }}" class="mb-4">
            <div class="flex">
                <input type="text" name="search" placeholder="ค้นหาคำศัพท์..." value="{{ request('search') }}"
                    class="w-full p-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit"
                    class="px-4 bg-blue-500 text-white rounded-r-lg hover:bg-blue-600">ค้นหา</button>
            </div>
        </form>
    
        <!-- ตารางแสดงผลลัพธ์ -->
        <div class="my-4">
            <table class="w-full bg-white rounded-lg overflow-hidden drop-shadow-2xl">
                <thead class="">
                    <tr class="font-thai text-[20px] text-[#fff] bg-deepblue">
                        <th class="w-1/6 px-4 py-2">คำโคราช</th>
                        <th class="w-2/6">คำอ่าน</th>
                        <th class="w-3/6">ความหมาย</th>
                        <th class="w-1/6">เสียง</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($search as $word)
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
    </div>
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