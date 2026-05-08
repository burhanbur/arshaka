<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\Blog\StorePostRequest;
use App\Http\Requests\Blog\UpdatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Exception;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $status     = $request->input('status', null);
        $categoryId = $request->input('category_id', null);

        $categories = Category::orderBy('name')->get();

        $posts = Post::with('category')
            ->when($status !== null, fn($q) => $q->where('status', $status))
            ->when($categoryId, fn($q) => $q->where('category_id', $categoryId))
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.blog.post.index', get_defined_vars());
    }

    public function create(Request $request)
    {
        $categories = Category::orderBy('name')->get();

        return view('pages.blog.post.create', get_defined_vars());
    }

    public function edit($id)
    {
        $data       = Post::findOrFail($id);
        $categories = Category::orderBy('name')->get();

        return view('pages.blog.post.edit', get_defined_vars());
    }

    public function store(StorePostRequest $request)
    {
        $data = $request->validated();

        DB::beginTransaction();

        try {
            // Handle thumbnail upload
            if ($request->hasFile('thumbnail')) {
                $data['thumbnail'] = $request->file('thumbnail')
                    ->store('blog/thumbnails', 'public');
            }

            // Auto-set published_at when status is published and no date given
            if ((int) $data['status'] === Post::STATUS_PUBLISHED && empty($data['published_at'])) {
                $data['published_at'] = now();
            }

            $data['created_by'] = auth()->user()->id;
            $data['updated_by'] = auth()->user()->id;
            Post::create($data);

            DB::commit();
            Session::flash('notification', ['level' => 'success', 'message' => 'Artikel berhasil dibuat.']);
            return redirect()->route('blog.post.index');
        } catch (Exception $ex) {
            DB::rollBack();
            Log::error($ex->getMessage());
            Session::flash('notification', ['level' => 'error', 'message' => 'Gagal membuat artikel.']);
            return redirect()->back()->withInput();
        }
    }

    public function update(UpdatePostRequest $request, $id)
    {
        $data = $request->validated();

        DB::beginTransaction();

        try {
            $post = Post::findOrFail($id);

            // Handle thumbnail upload
            if ($request->hasFile('thumbnail')) {
                // Remove old thumbnail if exists
                if ($post->thumbnail) {
                    Storage::disk('public')->delete($post->thumbnail);
                }
                $data['thumbnail'] = $request->file('thumbnail')
                    ->store('blog/thumbnails', 'public');
            }

            // Auto-set published_at when publishing for the first time
            if ((int) $data['status'] === Post::STATUS_PUBLISHED
                && $post->status !== Post::STATUS_PUBLISHED
                && empty($data['published_at'])) {
                $data['published_at'] = now();
            }

            $data['updated_by'] = auth()->user()->id;
            $post->update($data);

            DB::commit();
            Session::flash('notification', ['level' => 'success', 'message' => 'Artikel berhasil diperbarui.']);
            return redirect()->route('blog.post.index');
        } catch (Exception $ex) {
            DB::rollBack();
            Log::error($ex->getMessage());
            Session::flash('notification', ['level' => 'error', 'message' => 'Gagal memperbarui artikel.']);
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $post = Post::findOrFail($id);
            $post->update(['deleted_by' => auth()->user()->id]);
            $post->delete();

            DB::commit();
            Session::flash('notification', ['level' => 'success', 'message' => 'Artikel berhasil dihapus.']);
            return redirect()->route('blog.post.index');
        } catch (Exception $ex) {
            DB::rollBack();
            Log::error($ex->getMessage());
            Session::flash('notification', ['level' => 'error', 'message' => 'Gagal menghapus artikel.']);
            return redirect()->back();
        }
    }
}

