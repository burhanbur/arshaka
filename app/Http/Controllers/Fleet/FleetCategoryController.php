<?php

namespace App\Http\Controllers\Fleet;

use App\Http\Controllers\Controller;
use App\Models\FleetCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Exception;

class FleetCategoryController extends Controller
{
    public function index()
    {
        $categories = FleetCategory::withCount('photos')->orderBy('order')->get();

        return view('pages.fleet.category.index', get_defined_vars());
    }

    public function create()
    {
        return view('pages.fleet.category.create');
    }

    public function edit($id)
    {
        $data = FleetCategory::findOrFail($id);

        return view('pages.fleet.category.edit', get_defined_vars());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'slug'        => 'required|string|max:255|unique:fleet_categories,slug',
            'description' => 'nullable|string',
            'order'       => 'nullable|integer',
            'is_active'   => 'nullable|boolean',
        ]);

        DB::beginTransaction();

        try {
            FleetCategory::create([
                'name'        => $request->name,
                'slug'        => $request->slug,
                'description' => $request->description,
                'order'       => $request->input('order', 0),
                'is_active'   => $request->boolean('is_active', true),
                'created_by'  => auth()->id(),
                'updated_by'  => auth()->id(),
            ]);

            DB::commit();
            Session::flash('notification', ['level' => 'success', 'message' => 'Kategori armada berhasil ditambahkan.']);
            return redirect()->route('fleet.category.index');
        } catch (Exception $ex) {
            DB::rollBack();
            Log::error($ex->getMessage());
            Session::flash('notification', ['level' => 'error', 'message' => 'Gagal menambahkan kategori.']);
            return redirect()->back()->withInput();
        }
    }

    public function update(Request $request, $id)
    {
        $category = FleetCategory::findOrFail($id);

        $request->validate([
            'name'        => 'required|string|max:255',
            'slug'        => 'required|string|max:255|unique:fleet_categories,slug,' . $id,
            'description' => 'nullable|string',
            'order'       => 'nullable|integer',
            'is_active'   => 'nullable|boolean',
        ]);

        DB::beginTransaction();

        try {
            $category->update([
                'name'        => $request->name,
                'slug'        => $request->slug,
                'description' => $request->description,
                'order'       => $request->input('order', 0),
                'is_active'   => $request->boolean('is_active', true),
                'updated_by'  => auth()->id(),
            ]);

            DB::commit();
            Session::flash('notification', ['level' => 'success', 'message' => 'Kategori armada berhasil diperbarui.']);
            return redirect()->route('fleet.category.index');
        } catch (Exception $ex) {
            DB::rollBack();
            Log::error($ex->getMessage());
            Session::flash('notification', ['level' => 'error', 'message' => 'Gagal memperbarui kategori.']);
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        $category = FleetCategory::findOrFail($id);

        DB::beginTransaction();

        try {
            $category->delete();

            DB::commit();
            Session::flash('notification', ['level' => 'success', 'message' => 'Kategori armada berhasil dihapus.']);
        } catch (Exception $ex) {
            DB::rollBack();
            Log::error($ex->getMessage());
            Session::flash('notification', ['level' => 'error', 'message' => 'Gagal menghapus kategori.']);
        }

        return redirect()->route('fleet.category.index');
    }
}
