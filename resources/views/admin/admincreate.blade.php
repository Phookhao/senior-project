<x-adminlayout>

    <div class="container mx-auto p-6 bg-gray-100 rounded-lg">
        <h1 class="text-2xl font-bold mb-6 font-thai">เพิ่มคำศัพท์</h1>

        @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('vocabularies.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>
            <label for="word" class="block text-gray-700 font-thai">คำศัพท์ภาษาโคราช</label>
            <input type="text" name="word" id="word" class="w-full p-2 border border-gray-300 rounded" required>
        </div>

        <div>
            <label for="meaning" class="block text-gray-700">ความหมาย</label>
            <textarea name="meaning" id="meaning" class="w-full p-2 border border-gray-300 rounded" required></textarea>
        </div>

        <div>
            <label for="spelling" class="block text-gray-700">คำภาษากลาง</label>
            <input type="text" name="spelling" id="spelling" class="w-full p-2 border border-gray-300 rounded" required>
        </div>

        <div>
            <label for="pronunciation" class="block text-gray-700">คำอ่าน</label>
            <input type="text" name="pronunciation" id="pronunciation" class="w-full p-2 border border-gray-300 rounded" required>
        </div>
        
        <div>
            <label for="word_type_id" class="block text-gray-700">ชนิดคำ</label>
            <select name="word_type_id" id="word_type_id" class="w-full p-2 border border-gray-300 rounded" required>
                @foreach($wordTypes as $type)
                    <option value="{{ $type->id }}" class="text-[#000]">{{ $type->type_name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="word_category_id" class="block text-gray-700">หมวดหมู่</label>
            <select name="word_category_id" id="word_category_id" class="w-full p-2 border border-gray-300 rounded" required>
                @foreach($wordCategories  as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="audio_file" class="block text-gray-700">ไฟล์เสียง</label>
            <input type="file" name="audio_file" id="audio_file" class="w-full p-2 border border-gray-300 rounded" accept=".mp3, .wav">
        </div>

        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                บันทึก
            </button>
        </div>
    </form>
</div>   
    
</x-adminlayout>