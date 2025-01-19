<x-adminlayout>
<div class="px-8 py-8 ">
    @foreach ($words as $word)
    <div class="flex justify-between ">
        <div class="w-1/6 mr-[15px]">
            <h1 class="px-4 py-2 text-[15px] rounded-[10px] font-thai bg-gray-300">
                {{ $word->word }} {{-- ดึงข้อมูลคำศัพท์ --}}
            </h1>
            <p class="px-4 py-2 text-[15px] rounded-[10px] mt-[10px] font-thai bg-gray-300">ประเภท: {{$word->wordType->type_name}}</p>
        </div>
        <div class=" w-5/6 block h-[100px]">
            <div class="h-[100px]">
                <p class="font-thai text-[15px] mb-[10px] px-4 py-2 rounded-[10px] bg-gray-300">ความหมาย : {{ $word->meaning }}</p>
                <p class="font-thai text-[15px] px-4 py-2 rounded-[10px]  bg-gray-300">คำอ่าน : {{ $word->pronunciation }}</p>
            </div>
        </div>
        <div class=" w-[100px] ml-[20px] text-center">
            <button onclick="playAudio('{{ asset('storage/' . $word->audio_file) }}')" class="text-blue-500 hover:text-blue-700 mt-[2px] mb-[16px]">
                <i class="fa-solid fa-volume-low text-[30px] text-center" ></i>
            </button>
            <a href="#" class="block w-full rounded-[10px] text-center font-thai text-left bg-lightblue hover:bg-deepblu text-[#fff] px-4 py-2">แก้ไข</a>
        </div>
    </div>
    @endforeach
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
</x-adminlayout>    