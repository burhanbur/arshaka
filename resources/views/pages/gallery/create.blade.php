@extends('layouts.main')

@section('title', config('app.alias') . ' | Tambah Foto Galeri')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        <i class="flaticon2-add-1"></i>&nbsp; Tambah Foto Galeri
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <a href="{{ route('gallery.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>

            <div class="kt-portlet__body">
                <form method="POST" action="{{ route('gallery.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Judul <b class="text-danger">*</b></label>
                        <input type="text" class="form-control" name="title"
                               value="{{ old('title') }}" placeholder="Judul foto" autocomplete="off">
                        @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="description" rows="3"
                                  placeholder="Keterangan singkat (opsional)">{{ old('description') }}</textarea>
                        @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group">
                        <label>Foto <b class="text-danger">*</b></label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image" id="imageInput"
                                   accept="image/*" onchange="previewImage(this)">
                            <label class="custom-file-label" for="imageInput">Pilih file gambar...</label>
                        </div>
                        <small class="text-muted">Format: JPG, PNG, WEBP. Maks 5 MB.</small>
                        @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                        <div id="imagePreview" class="mt-2" style="display:none;">
                            <img id="previewImg" src="" alt="Preview"
                                 style="max-height:200px;border-radius:6px;object-fit:cover;">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Urutan</label>
                                <input type="number" class="form-control" name="order"
                                       value="{{ old('order', 0) }}" min="0">
                                <small class="text-muted">Angka lebih kecil ditampilkan lebih awal.</small>
                                @error('order') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status</label>
                                <div class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success mt-1">
                                    <label>
                                        <input type="checkbox" name="is_active" value="1"
                                               {{ old('is_active', true) ? 'checked' : '' }}>
                                        <span></span>
                                        Aktif
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="kt-portlet__foot">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                        <a href="{{ route('gallery.index') }}" class="btn btn-secondary ml-2">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function previewImage(input) {
        const preview = document.getElementById('imagePreview');
        const img = document.getElementById('previewImg');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                img.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        }
        const label = input.nextElementSibling;
        if (label) label.textContent = input.files[0]?.name || 'Pilih file gambar...';
    }
</script>
@endpush
@endsection
