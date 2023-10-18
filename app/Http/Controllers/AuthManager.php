<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;


class AuthManager extends Controller
{
    function login() {
        if(Auth::check()){
            return redirect(route('home'));
        }
        return view('login');
    }

    function loginPost(Request $request){
        $request->validate([
            'id_number' => 'required',
            'password' => 'required',
        ],
        [
            'id_number.required' => 'حقل رقم الهوية مطلوب.',
            'phone.required' => 'حقل الهاتف مطلوب.',
            'password.required' => 'حقل كلمة المرور مطلوب.',
        ]);

        $credentials = $request->only('id_number', 'password');
        if (Auth::attempt($credentials)) {
            return redirect(route('home'));
        }
        else {
            return redirect(route('login'))->with('error','رقم الهوية او كلمة المرور غير صحيحة');
        }
    }

    function register(){
        return view('register');
    }

    function registerPost(Request $request){
        $request->validate([
            'name' => 'required',
            'id_number' => 'required|numeric|digits:9|unique:users',
            'phone' => 'required|numeric|digits:10',
            'email' => 'unique:users',
            'password' => 'required',
        ],
        [
            'name.required' => 'حقل الاسم مطلوب.',
            'id_number.required' => 'رقم الهوية مطلوب.',
            'id_number.numeric' => 'رقم الهوية يجب أن يحتوي على أرقام فقط.',
            'id_number.digits' => 'رقم الهوية يجب أن يتكون من 9 أرقام.',
            'id_number.unique' => 'رقم الهوية مستخدم بالفعل.',
            'phone.required' => 'حقل الهاتف مطلوب.',
            'phone.numeric' => 'رقم الهاتف يجب أن يحتوي على أرقام فقط.',
            'phone.digits' => 'رقم الهاتف يجب أن يتكون من 10 أرقام.',
            'email.unique' => 'عنوان البريد الإلكتروني مستخدم بالفعل.',
            'password.required' => 'حقل كلمة المرور مطلوب.',
        ]);

        $data['name'] = $request->name;
        $data['id_number'] = $request->id_number;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);
        if(!$user){
            return redirect(route('register'))->with('error','قم بتعبئة الحقول المطلوبة بشكل صحيح');
        }
        return redirect(route('login'))->with('success',' تم انشاء حساب بنجاح، قم بتسجيل الدخول');

    }

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}
