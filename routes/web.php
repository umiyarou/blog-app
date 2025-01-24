<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardController;
use App\Models\Blog;

// トップページ（ブログ一覧を表示）
Route::get('/', function () {
    $blogs = Blog::all();  // 全てのブログデータを取得
    return view('welcome', compact('blogs'));
})->name('home');

// 認証不要のルート（ブログ一覧・詳細）
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index'); // ブログ一覧
Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blog.show'); // ブログ詳細

// 認証が必要なルート（ブログ管理機能）
Route::middleware('auth')->group(function () {
    Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create'); // 新規作成フォーム
    Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store'); // 新規投稿処理
    Route::get('/blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit'); // 編集フォーム
    Route::patch('/blogs/{blog}', [BlogController::class, 'update'])->name('blogs.update'); // 更新処理
    Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy'); // 削除処理
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); // ダッシュボード
});

// 認証関連のルート（ログイン・登録・ログアウト）
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login'); // ログインフォーム
Route::post('/login', [AuthenticatedSessionController::class, 'store']); // ログイン処理
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout'); // ログアウト処理
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register'); // 登録フォーム
Route::post('/register', [RegisteredUserController::class, 'store']); // ユーザー登録処理
