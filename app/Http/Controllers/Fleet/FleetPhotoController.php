<?php

namespace App\Http\Controllers\Fleet;

use App\Http\Controllers\Controller;
use App\Models\FleetCategory;
use App\Models\FleetPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Exception;

class FleetPhotoController extends Controller
{
    public function index(Request $request)
    {
        $categoryId = $request->input('fleet_category_id');
        $categories = FleetCategory::orderBy('order')->get();

        $photos = FleetPhoto::with('fleetCategory')
            ->when($categoryId, fn($q) => $q->where('fleet_category_id', $categoryId))
            ->orderBy('fleet_category_id')
            ->orderBy('order')
            ->get();

        return view('pages.fleet.photo.index', get_defined_vars());
    }

    public function create(Request $request)
    {
        $categories    = FleetCategory::orderBy('order')->get();
        $selectedCatId = $request->input('fleet_category_id');

        return view('pages.fleet.photo.create', get_defined_vars());
    }

    public function edit($id)
    {
        $data       = FleetPhoto::findOrFail($id);
        $categories = FleetCategory::orderBy('order')->get();

        return view('pages.fleet.photo.edit', get_defined_vars());
    }

    public function store(Request $request)
    {
        $request->validate([
            'fleet_category_id' => 'required|exists:fleet_categories,id',
            'caption'           => 'nullable|string|max:255',
            'image'             => 'required|image|max:5120',
            'order'             => 'nullable|integer',
            'is_active'         => 'nullable|boolean',
        ]);

        DB::beginTransaction();

        try {
            $imagePath = $request->file('image')->store('fleet', 'public');

            FleetPhoto::create([
                'fleet_category_id' => $request->fleet_category_id,
                'caption'           => $request->caption,
                'image_path'        => $imagePath,
                'order'             => $request->input('order', 0),
                'is_active'         => $request->boolean('is_active', true),
                'created_by'        => auth()->id(),
                'updated_by'        => auth()->id(),
            ]);

            DB::commit();
            Session::flash('notification', ['level' => 'success', 'message' => 'Foto armada berhasil ditambahkan.']);
            return redirect()->route('fleet.photo.index');
        } catch (Exception $ex) {
            DB::rollBack();
            Log::error($ex->getMessage());
            Session::flash('notification', ['level' => 'error', 'message' => 'Gagal menambahkan foto.']);
            return redirect()->back()->withInput();
        }
    }

    public function update(Request $request, $id)
    {
        $photo = FleetPhoto::findOrFail($id);

        $request->validate([
            'fleet_category_id' => 'required|exists:fleet_categories,id',
            'caption'           => 'nullable|string|max:255',
            'image'             => 'nullable|image|max:5120',
            'order'             => 'nullable|integer',
            'is_active'         => 'nullable|boolean',
        ]);

        DB::beginTransaction();

        try {
            $data = [
                'fleet_category_id' => $request->fleet_category_id,
                'caption'           => $request->caption,
                'order'             => $request->input('order', 0),
                'is_active'         => $request->boolean('is_active', true),
                'updated_by'        => auth()->id(),
            ];

            if ($request->hasFile('image')) {
                Storage::disk('public')->delete($photo->image_path);
                $data['image_path'] = $request->file('image')->store('fleet', 'public');
            }

            $photo->update($data);

            DB::commit();
            Session::flash('notification', ['level' => 'success', 'message' => 'Foto armada berhasil diperbarui.']);
            return redirect()->route('fleet.photo.index');
        } catch (Exception $ex) {
            DB::rollBack();
            Log::error($ex->getMessage());
            Session::flash('notification', ['level' => 'error', 'message' => 'Gagal memperbarui foto.']);
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        $photo = FleetPhoto::findOrFail($id);

        DB::beginTransaction();

        try {
            Storage::disk('public')->delete($photo->image_path);
            $photo->delete();

            DB::commit();
            Session::flash('notification', ['level' => 'success', 'message' => 'Foto armada berhasil dihapus.']);
        } catch (Exception $ex) {
            DB::rollBack();
            Log::error($ex->getMessage());
            Session::flash('notification', ['level' => 'error', 'message' => 'Gagal menghapus foto.']);
        }

        return redirect()->route('fleet.photo.index');
    }
}
