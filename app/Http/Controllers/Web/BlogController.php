<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $categorySlug = $request->input('kategori');
        $search       = $request->input('q');

        $categories = Category::withCount(['publishedPosts'])->get();

        $posts = Post::published()
            ->with('category')
            ->when($categorySlug, fn($q) => $q->whereHas('category', fn($q2) => $q2->where('slug', $categorySlug)))
            ->when($search, fn($q) => $q->where('title', 'like', "%{$search}%"))
            ->orderBy('published_at', 'desc')
            ->paginate(9)
            ->withQueryString();

        return view('web.blog.index', get_defined_vars());
    }

    public function show(string $slug)
    {
        $post = Post::published()->where('slug', $slug)->with('category')->firstOrFail();

        $relatedPosts = Post::published()
            ->with('category')
            ->where('id', '!=', $post->id)
            ->where('category_id', $post->category_id)
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();

        return view('web.blog.show', get_defined_vars());
    }
}
