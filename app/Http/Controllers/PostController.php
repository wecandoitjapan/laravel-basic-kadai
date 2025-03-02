<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class PostController extends Controller{
    public function index() {
        // postsテーブルからすべてのデータを取得し、変数$postsに代入する
        $posts = DB::table('posts')->get();

        // 変数$productsをproducts/index.blade.phpファイルに渡す
        return view('posts.index', compact('posts'));
    }

    public function show($id) {
        // URL'/posts/{id}'の'{id}'部分と主キー（idカラム）の値が一致するデータをpostテーブルから取得し、変数$postに代入する
        $post = Post::find($id);

        // 変数$productをproducts/show.blade.phpファイルに渡す
        return view('posts.show', compact('post'));
    }

    // 課題26
    public function create() {
        return view('posts.create');
    } 

    public function store(Request $request) {
        // バリデーションを設定する
        $request->validate([
            'title' => 'required|max:20',
            'content' => 'required|max:200'
        ]);

        // フォームの入力内容をもとに、テーブルにデータを追加する
        $posts = new Post();
        $posts->title = $request->input('title');
        $posts->content = $request->input('content');
        $posts->save();

        // リダイレクトさせる
        return redirect("/posts");
    }      
}
