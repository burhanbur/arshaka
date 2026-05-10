@extends('layouts.main')

@section('title', config('app.alias') . ' | Tambah Kategori Armada')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        <i class="flaticon2-add-1"></i>&nbsp; Tambah Kategori Armada
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <a href="{{ route('fleet.category.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>

            <div class="kt-portlet__body">
                <form method="POST" action="{{ route('fleet.category.store') }}">
                    @csrf

                    <div class="form-group">
                        <label>Nama Kategori <b class="text-danger">*</b></label>
                        <input type="text" class="form-control" name="name" id="catName"
                               value="{{ old('name') }}" placeholder="cth. Truck Engkel" autocomplete="off">
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group">
                        <label>Slug <b class="text-danger">*</b></label>
                        <input type="text" class="form-control" name="slug" id="catSlug"
                               value="{{ old('slug') }}" placeholder="truck-engkel">
                        <small class="text-muted">Dipakai sebagai anchor di halaman Layanan (cth. <code>#engkel</code>). Hanya huruf kecil, angka, tanda hubung.</small>
                        @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="description" rows="3"
                                  placeholder="Deskripsi singkat armada ini">{{ old('description') }}</textarea>
                        @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Urutan</label>
                                <input type="number" class="form-control" name="order"
                                       value="{{ old('order', 0) }}" min="0">
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
                        <a href="{{ route('fleet.category.index') }}" class="btn btn-secondary ml-2">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.getElementById('catName').addEventListener('input', function () {
        const slug = this.value.toLowerCase()
            .replace(/[^a-z0-9\s-]/g, '')
            .trim()
            .replace(/\s+/g, '-');
        document.getElementById('catSlug').value = slug;
    });
</script>
@endpush
@endsection
