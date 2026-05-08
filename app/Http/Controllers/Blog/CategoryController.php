<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\Blog\StoreCategoryRequest;
use App\Http\Requests\Blog\UpdateCategoryRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Exception;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::withCount('posts')
            ->orderBy('name', 'asc')
            ->get();

        return view('pages.blog.category.index', get_defined_vars());
    }

    public function create(Request $request)
    {
        return view('pages.blog.category.create', get_defined_vars())
            ->renderSections()['content'];
    }

    public function edit($id)
    {
        $data = Category::findOrFail($id);

        return view('pages.blog.category.edit', get_defined_vars())
            ->renderSections()['content'];
    }

    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();

        DB::beginTransaction();

        try {
            $data['created_by'] = auth()->user()->id;
            $data['updated_by'] = auth()->user()->id;
            Category::create($data);

            DB::commit();
            Session::flash('notification', ['level' => 'success', 'message' => 'Kategori berhasil dibuat.']);
            return redirect()->route('blog.category.index');
        } catch (Exception $ex) {
            DB::rollBack();
            Log::error($ex->getMessage());
            Session::flash('notification', ['level' => 'error', 'message' => 'Gagal membuat kategori.']);
            return redirect()->back()->withInput();
        }
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        $data = $request->validated();

        DB::beginTransaction();

        try {
            $category = Category::findOrFail($id);
            $data['updated_by'] = auth()->user()->id;
            $category->update($data);

            DB::commit();
            Session::flash('notification', ['level' => 'success', 'message' => 'Kategori berhasil diperbarui.']);
            return redirect()->route('blog.category.index');
        } catch (Exception $ex) {
            DB::rollBack();
            Log::error($ex->getMessage());
            Session::flash('notification', ['level' => 'error', 'message' => 'Gagal memperbarui kategori.']);
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $category = Category::findOrFail($id);
            $category->update(['deleted_by' => auth()->user()->id]);
            $category->delete();

            DB::commit();
            Session::flash('notification', ['level' => 'success', 'message' => 'Kategori berhasil dihapus.']);
            return redirect()->route('blog.category.index');
        } catch (Exception $ex) {
            DB::rollBack();
            Log::error($ex->getMessage());
            Session::flash('notification', ['level' => 'error', 'message' => 'Gagal menghapus kategori.']);
            return redirect()->back();
        }
    }
}

