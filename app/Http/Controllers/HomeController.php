<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class HomeController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->take(5)->get(); // 最新の5件を取得
        return view('welcome', compact('blogs'));
    }
}

