<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        //投稿を作成日時の降順で取得して、posts.indexにデータを渡してビューを生成します。
        $post = Post::orderBy('created_at', 'desc')->get();

        return view('posts.index', ['posts' => $posts]);
    }
}
