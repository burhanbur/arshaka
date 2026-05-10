@extends('layouts.main')

@section('title', config('app.alias') . ' | Tulis Artikel Baru')

@push('scripts')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#postContent',
        language: 'id',
        height: 450,
        menubar: false,
        plugins: 'link lists image table code wordcount autoresize',
        toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image | table | code',
        content_style: 'body { font-family: Inter, sans-serif; font-size: 15px; line-height: 1.7; }',
        setup: function(editor) {
            editor.on('change', function() { editor.save(); });
        }
    });

    // Auto-generate slug from title
    document.addEventListener('DOMContentLoaded', function () {
        const titleInput = document.getElementById('postTitle');
        const slugInput  = document.getElementById('postSlug');
        titleInput.addEventListener('input', function () {
            const slug = this.value
                .toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '')
                .trim()
                .replace(/\s+/g, '-');
            slugInput.value = slug;
        });
    });
</script>
@endpush

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        <i class="flaticon2-add-1"></i>&nbsp; Tulis Artikel Baru
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <a href="{{ route('blog.post.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>

            <div class="kt-portlet__body">
                <form method="POST" action="{{ route('blog.post.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        {{-- Main Content Column --}}
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Judul Artikel <b class="text-danger">*</b></label>
                                <input type="text" class="form-control" name="title" id="postTitle"
                                       value="{{ old('title') }}" placeholder="Masukkan judul artikel" autocomplete="off">
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Slug <b class="text-danger">*</b></label>
                                <input type="text" class="form-control" name="slug" id="postSlug"
                                       value="{{ old('slug') }}" placeholder="judul-artikel">
                                <small class="text-muted">Hanya huruf kecil, angka, dan tanda hubung (-)</small>
                                @error('slug')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Konten <b class="text-danger">*</b></label>
                                <textarea class="form-control" id="postContent" name="content" rows="15"
                                          placeholder="Tulis konten artikel di sini...">{{ old('content') }}</textarea>
                                @error('content')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- Sidebar Column --}}
                        <div class="col-md-4">
                            <div class="kt-portlet kt-portlet--bordered">
                                <div class="kt-portlet__head kt-portlet__head--sm">
                                    <div class="kt-portlet__head-label">
                                        <h4 class="kt-portlet__head-title">Pengaturan Publikasi</h4>
                                    </div>
                                </div>
                                <div class="kt-portlet__body">

                                    <div class="form-group">
                                        <label>Status <b class="text-danger">*</b></label>
                                        <select class="form-control" name="status">
                                            <option value="0" {{ old('status', 0) == 0 ? 'selected' : '' }}>Draft</option>
                                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Dipublikasikan</option>
                                        </select>
                                        @error('status')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Tanggal Publikasi</label>
                                        <input type="datetime-local" class="form-control" name="published_at"
                                               value="{{ old('published_at') }}">
                                        <small class="text-muted">Kosongkan untuk menggunakan waktu saat ini.</small>
                                        @error('published_at')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select class="form-control" name="category_id">
                                            <option value="">-- Tanpa Kategori --</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Thumbnail</label>
                                        <input type="file" class="form-control-file" name="thumbnail"
                                               accept="image/jpeg,image/png,image/webp">
                                        <small class="text-muted">Format: JPG, PNG, WEBP. Maks 2 MB.</small>
                                        @error('thumbnail')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i> Simpan Artikel
                                </button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
