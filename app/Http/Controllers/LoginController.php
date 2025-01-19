<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controlles\UserController;
use App\Models\User;


class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function authenticate(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if (Auth::attempt(['email' => $request->email,'password' => $request->password])) {
            return redirect()->route('account.dashboard');
        }else{
            return redirect()->route('account.login')->with('error','Email หรือ Password ไม่ถูกต้อง.');
        }
        
        if ($validator->passes()) {

        }else{
            return redirect()->route('account.login')
                ->withInput()
                ->withErrors($validator);
        }
    }

    public function register(){    
        return view('auth.register');
    }


    public function processRegister(Request $request){
        $validator = Validator::make($request->all(),[
            'username'=>'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        
        if ($validator->passes()) {
                $user = new User();
                $user->username = $request->username;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->role = 'user';
                $user->save();
            
                return redirect()->route('account.login')->with('success','สมัครสมาชิกสำเร็จ');

        }else{
            return redirect()->route('account.register')
                ->withInput()
                ->withErrors($validator);
        }
    }
    public function logout() {
        Auth::logout();
        return redirect()->route('home');
    }

}
