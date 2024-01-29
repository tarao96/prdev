<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin_users')->attempt($credentials)) {
            $request->session()->regenerate(); // セッションIDを再生成
            return redirect()->route('admin.articles');
        }
        return back()->withErrors([
            'email' => 'メールアドレスかパスワードが間違っています。',
        ]);
    }


    public function logout(Request $request)
    {
        Auth::guard('admin_users')->logout();
        $request->session()->invalidate(); // セッションを無効化
        $request->session()->regenerateToken(); // CSRFトークンを再生成
        return redirect()->route('admin.auth');
    }
}
