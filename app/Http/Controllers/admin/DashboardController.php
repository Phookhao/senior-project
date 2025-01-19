<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\admin\AdminWord;

class DashboardController extends Controller
{
    public function index(){

        $words = AdminWord::with('wordType')->get(); // ดึงข้อมูลทั้งหมดจากตาราง words
        
        return view('admin.dashboard', compact('words')); //ส่งข้อมูลไปหน้า Admin.dashboard   
    }
    
}


