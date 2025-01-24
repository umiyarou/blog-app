<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            // ユーザーがログインしている場合、ダッシュボードを表示
            return view('dashboard');
        }

        // ログインしていない場合、ログイン画面にリダイレクト
        return redirect()->route('login');
    }

    // 新規投稿フォームを表示
    public function create()
    {
        return view('blogs.create');  // 新規投稿フォーム
    }
}