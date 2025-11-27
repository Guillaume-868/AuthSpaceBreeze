<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

public function publicIndex()
{
    $posts = Post::with('user')
        ->where('status', 'published')
        ->orderByDesc('published_at')
        ->paginate(4);

    return view('posts.public-index', compact('posts'));
}
}
