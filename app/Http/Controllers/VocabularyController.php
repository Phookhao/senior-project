<?php

namespace App\Http\Controllers;

use App\Models\admin\wordtype;
use App\Models\admin\wordcategory;
use App\Models\admin\words;
use Illuminate\Http\Request;

class VocabularyController extends Controller
{
    public function create()
    {
        $wordTypes = WordType::all();
        $wordCategories = wordcategory::all();

        return view('admin.admincreate', compact('wordTypes', 'wordCategories'));
    }

    public function store(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('admin.login')->with('error', 'คุณต้องล็อกอินก่อนที่จะเพิ่มคำศัพท์');
        }

        $request->validate([
            'word' => 'required|string|max:255',
            'meaning' => 'required|string',
            'spelling' => 'required|string|max:255',
            'pronunciation' => 'required|string|max:255',
            'word_type_id' => 'required|exists:word_types,id',
            'word_category_id' => 'required|exists:word_categories,id',
            'audio_file' => 'nullable|mimes:mp3,wav|max:2048',
        ]);

        $audioFilePath = null;
        if ($request->hasFile('audio_file')) {
            $audioFilePath = $request->file('audio_file')->store('audio', 'public');
        }

        words::create([
            'word' => $request->word,
            'meaning' => $request->meaning,
            'spelling' => $request->spelling,
            'pronunciation' => $request->pronunciation,
            'word_type_id' => $request->word_type_id,
            'word_category_id' => $request->word_category_id,
            'user_id' => auth()->id(),
            'audio_file' => $audioFilePath,
        ]);

        return redirect()->route('vocabularies.create')->with('success', 'คำศัพท์ถูกเพิ่มเรียบร้อยแล้ว');
    }
}
