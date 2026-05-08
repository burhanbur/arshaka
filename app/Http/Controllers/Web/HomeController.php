<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $latestPosts = Post::published()
            ->with('category')
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();

        return view('web.home', get_defined_vars());
    }
}
