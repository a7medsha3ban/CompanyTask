<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Authcontroller extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function handleRegister(Request $request){
        $validated = Validator::make($request->all(),[
            'name'=>'required|max:50|min:3',
            'email'=>'required|email|max:100',
            'password'=>'required|string|max:50|min:5',
            'phone'=>'required|min:11|numeric',
        ]);
        if($validated->fails()){
            return redirect('/register')
                ->withErrors($validated)
                ->withInput();
        }
        $employee = new User();
        $employee->name=$request->name;
        $employee->email=$request->email;
        $employee->password=Hash::make($request->password);
        $employee->phone=$request->phone;
        $employee->company_id=1;
        $employee->save();
        return redirect('login');
    }

    public function login(){
        return view('auth.login');
    }

    public function handleLogin(Request $request){
        $validated=Validator::make($request->all(),[
            'email'=>'required|email|max:100',
            'password'=>'required|string|max:50|min:5',
        ]);

        if($validated->fails()){
            return redirect('/login')
                ->withErrors($validated)
                ->withInput();
        }
        $cred=Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        if($cred){
            if(Auth::user()->is_admin==0){
                return redirect('home');
            }
            else{
                return redirect('admin/dashboard');
            }
        }
        else{
            return back();
        }

    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }


}
