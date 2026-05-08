@section('content')
<form method="POST" action="{{ route('blog.category.store') }}">
    @csrf
    <div class="modal-body">

        <div class="form-group">
            <label>Nama Kategori <b class="text-danger">*</b></label>
            <input type="text" class="form-control" name="name"
                   value="{{ old('name') }}" placeholder="Contoh: Industri Logistik"
                   id="categoryName" autocomplete="off">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Slug <b class="text-danger">*</b></label>
            <input type="text" class="form-control" name="slug"
                   value="{{ old('slug') }}" placeholder="Contoh: industri-logistik"
                   id="categorySlug">
            <small class="text-muted">Hanya huruf kecil, angka, dan tanda hubung (-)</small>
            @error('slug')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea class="form-control" name="description" rows="3"
                      placeholder="Deskripsi singkat kategori (opsional)">{{ old('description') }}</textarea>
            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

    </div>
    <div class="modal-footer">
        <button class="btn btn-primary" type="submit">
            <i class="fa fa-save"></i> Simpan
        </button>
        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">
            <i class="fa fa-undo"></i> Tutup
        </button>
    </div>
</form>

<script>
    // Auto-generate slug from name
    document.getElementById('categoryName').addEventListener('input', function () {
        const slug = this.value
            .toLowerCase()
            .replace(/[^a-z0-9\s-]/g, '')
            .trim()
            .replace(/\s+/g, '-');
        document.getElementById('categorySlug').value = slug;
    });
</script>
