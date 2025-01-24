<?php
namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    // コンストラクタにミドルウェアを追加
    public function __construct()
    {
       // 認証が必要なメソッドに対してのみ auth ミドルウェアを適用
    //    $this->middleware('auth')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    // ブログ一覧表示
    public function index()
    {
        $blogs = Blog::all();
        return view('blogs.index', compact('blogs'));
    }

    // 新規投稿フォーム表示
    public function create()
    {
        return view('blogs.create');
    }

    // 新規投稿処理
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // 新しいブログの保存
        $blog = new Blog([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->id(), // ログインユーザーを紐づけ
        ]);

        return redirect()->route('blogs.index')->with('success', 'ブログが投稿されました！');
    }

    // ブログ詳細表示
    public function show(Blog $blog)
    {
        return view('blogs.show', compact('blog'));
    }

    // 編集フォーム表示
    public function edit(Blog $blog)
    {
        $this->authorize('update', $blog);
        return view('blogs.edit', compact('blog'));
    }

    // 更新処理
    public function update(Request $request, Blog $blog)
    {
        $this->authorize('update', $blog);

        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $blog->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('blogs.index')->with('success', 'ブログを更新しました！');
    }

    // 削除処理
    public function destroy(Blog $blog)
    {
        $this->authorize('delete', $blog);
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'ブログを削除しました！');
    }
}
