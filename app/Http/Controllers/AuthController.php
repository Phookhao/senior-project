<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // User register
    public function register(Request $request){
        
         $request->validate(
        [
            'username' => ['required', 'max:255'],
            'email' => ['required', 'max:255' ,'email', 'unique:users'],
            'password' => ['required', 'min:8','confirmed']
        ],
        [
            'username.required' =>'กรุณาระบุ User Name',
            'email.required' =>'กรุณาระบุ Eamil ',
            'password.required' => 'ขั้นต่ำอย่างน้อย 8 ตัว ',
            'password.confirmed' => 'รหัสผ่านไม่เหมือนกัน' ,
            'email.unique' => 'Email นี้ถูกใช้แล้ว'
        ]
    );

    $role = $request->email === 'admin@gmail.com' ? 'admin' : 'user';

        // // Register
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'usertype'=> $role,
        ]);

        // Login
        Auth::login($user);
        // Redirect
        return $role === 'admin' ? redirect()->route('admin.dashborad') : redirect()->route('home');
        
    }


    // User Login
    public function login(Request $request){
        // Validate
        $fields = $request->validate(
            [
                'email' => ['required', 'max:255' ,'email',],
                'password' => ['required',]
            ],
            [
                'email' =>'กรุณากรอก Email',
                'password' => 'กรุณากรอกรหัสผ่าน'
            ]
        );
    

        if(Auth::attempt($fields)){
            $user = Auth::user();
            return $user->usertype === 'admin' ? redirect()->route('admin.dashborad') : redirect()->route('home');
        }
            return back()->withErrors([
                'failed' => 'ลงชื่อเข้าใช้งานล้มเหลว ชื่อผู้ใช้ หรือ รหัสผ่านไม่ถูกต้อง'
            ]);

    }


    // Logout
    public function logout(Request $request){
        Auth::logout();

        $request->session() ->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');

    }
}
