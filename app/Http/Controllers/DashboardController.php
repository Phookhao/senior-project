<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin\AdminWord;
use App\Models\admin\words;


class DashboardController extends Controller
{
    // ส่งค่า คำศัพท์ ไปยังโฟลเดอร์ users ไฟลชื่อ dashboard
    public function index(){
        $words = AdminWord::all(); // ดึงข้อมูลทั้งหมดจากตาราง words
        
        return view('users.dashboard', compact('words'));
    }
    // ส่งค่า คำศัพท์ ไปยังโฟลเดอร์ posts ไฟล์ชื่อ index
    public function word(){
        $table = AdminWord::all();

        return view('posts.index', compact('table'));
    }
    // function search ไว้ใช้สำหรับค้นหาคำศัพท์หน้า users
    public function search(Request $request)
    {
        $query = Words::query();

        // ตรวจสอบว่ามีการค้นหาไหม
        if ($request->ajax()) {
            $searchTerm = $request->search;
            $words = Words::where('word', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('meaning', 'LIKE', '%' . $searchTerm . '%')
                ->get();

            return response()->json($words);
        }

        
    }

}
