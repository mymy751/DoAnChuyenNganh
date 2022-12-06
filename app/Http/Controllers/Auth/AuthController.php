<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // xử lý đăng nhập

    public function index()
    {
        return view('web.pages.login.index');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back()->withErrors(['msg' => 'Đăng nhập thất bại']);
        }
    }
}
