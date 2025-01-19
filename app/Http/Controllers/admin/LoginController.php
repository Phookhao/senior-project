<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; 


class LoginController extends Controller
{
    public function index(){
        return view('admin.login');
    }

    public function authenticate(Request $request){
        $validator = Validator::make($request->all(),[
            'username'=> 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if (Auth::guard('admin')->attempt(['email' => $request->email,'password' => $request->password])) {

            $user= Auth::guard('admin')->user();

            if(!$user || $user->role !== 'admin'){
                Auth::guard('admin')->logout();
                return redirect()->route('admin.login')->with('error','คุณไม่มีสิทธิ์ในการเข้าถึงหน้านี้.');
            }

            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->route('admin.login')->with('error','Email หรือ Password ไม่ถูกต้อง.');
        }
        
        if ($validator->passes()) {
        }else{
            return redirect()->route('admin.login')
                ->withInput()
                ->withErrors($validator);
        }
    }


    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
