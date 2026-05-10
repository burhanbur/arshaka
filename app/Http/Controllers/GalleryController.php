<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Exception;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $galleries = Gallery::orderBy('order')->orderBy('created_at', 'desc')->get();

        return view('pages.gallery.index', get_defined_vars());
    }

    public function create()
    {
        return view('pages.gallery.create');
    }

    public function edit($id)
    {
        $data = Gallery::findOrFail($id);

        return view('pages.gallery.edit', get_defined_vars());
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'      => 'required|string|max:255',
            'description'=> 'nullable|string',
            'image'      => 'required|image|max:5120',
            'order'      => 'nullable|integer',
            'is_active'  => 'nullable|boolean',
        ]);

        DB::beginTransaction();

        try {
            $imagePath = $request->file('image')->store('gallery', 'public');

            Gallery::create([
                'title'       => $request->title,
                'description' => $request->description,
                'image_path'  => $imagePath,
                'order'       => $request->input('order', 0),
                'is_active'   => $request->boolean('is_active', true),
                'created_by'  => auth()->id(),
                'updated_by'  => auth()->id(),
            ]);

            DB::commit();
            Session::flash('notification', ['level' => 'success', 'message' => 'Foto berhasil ditambahkan.']);
            return redirect()->route('gallery.index');
        } catch (Exception $ex) {
            DB::rollBack();
            Log::error($ex->getMessage());
            Session::flash('notification', ['level' => 'error', 'message' => 'Gagal menambahkan foto.']);
            return redirect()->back()->withInput();
        }
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        $request->validate([
            'title'      => 'required|string|max:255',
            'description'=> 'nullable|string',
            'image'      => 'nullable|image|max:5120',
            'order'      => 'nullable|integer',
            'is_active'  => 'nullable|boolean',
        ]);

        DB::beginTransaction();

        try {
            $data = [
                'title'       => $request->title,
                'description' => $request->description,
                'order'       => $request->input('order', 0),
                'is_active'   => $request->boolean('is_active', true),
                'updated_by'  => auth()->id(),
            ];

            if ($request->hasFile('image')) {
                Storage::disk('public')->delete($gallery->image_path);
                $data['image_path'] = $request->file('image')->store('gallery', 'public');
            }

            $gallery->update($data);

            DB::commit();
            Session::flash('notification', ['level' => 'success', 'message' => 'Foto berhasil diperbarui.']);
            return redirect()->route('gallery.index');
        } catch (Exception $ex) {
            DB::rollBack();
            Log::error($ex->getMessage());
            Session::flash('notification', ['level' => 'error', 'message' => 'Gagal memperbarui foto.']);
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        DB::beginTransaction();

        try {
            Storage::disk('public')->delete($gallery->image_path);
            $gallery->delete();

            DB::commit();
            Session::flash('notification', ['level' => 'success', 'message' => 'Foto berhasil dihapus.']);
        } catch (Exception $ex) {
            DB::rollBack();
            Log::error($ex->getMessage());
            Session::flash('notification', ['level' => 'error', 'message' => 'Gagal menghapus foto.']);
        }

        return redirect()->route('gallery.index');
    }
}
