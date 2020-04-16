<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
    $params = $request->validate([
        'post_id' => 'required|exists:posts,id',
        'body' => 'required|max:2000',
    ]);

    $post = Post::findOrFail($params['post_id']);
    $post->comments()->create($params);

    return redirect()->route('posts.show', ['post' => $post]);
    }
}
