@section('content')
<form method="POST" action="{{ route('blog.category.update', $data->id) }}">
    @csrf
    @method('PUT')
    <div class="modal-body">

        <div class="form-group">
            <label>Nama Kategori <b class="text-danger">*</b></label>
            <input type="text" class="form-control" name="name"
                   value="{{ old('name', $data->name) }}" placeholder="Contoh: Industri Logistik">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Slug <b class="text-danger">*</b></label>
            <input type="text" class="form-control" name="slug"
                   value="{{ old('slug', $data->slug) }}" placeholder="Contoh: industri-logistik">
            <small class="text-muted">Hanya huruf kecil, angka, dan tanda hubung (-)</small>
            @error('slug')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea class="form-control" name="description" rows="3"
                      placeholder="Deskripsi singkat kategori (opsional)">{{ old('description', $data->description) }}</textarea>
            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

    </div>
    <div class="modal-footer">
        <button class="btn btn-primary" type="submit">
            <i class="fa fa-save"></i> Simpan Perubahan
        </button>
        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">
            <i class="fa fa-undo"></i> Tutup
        </button>
    </div>
</form>
