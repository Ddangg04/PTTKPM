<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Xử lý đăng nhập
    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->route('booking.index')->with('success', 'Đăng nhập thành công!');
    }

    return back()->withErrors(['email' => 'Thông tin đăng nhập không hợp lệ.'])->withInput();
}


    // Xử lý đăng ký
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:1|confirmed',
        ]);
    
        // Lưu user vào database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Phải băm mật khẩu
        ]);
     
        if ($user) {
            return redirect()->route('login')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
        }
    
        return back()->withErrors(['error' => 'Đăng ký thất bại!']);
    }
    // Đăng xuất
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('welcome'); // Điều hướng về trang welcome
    }
}