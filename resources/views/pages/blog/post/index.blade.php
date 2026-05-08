@extends('layouts.main')

@section('title', config('app.alias') . ' | Manajemen Artikel Blog')

@push('styles')
<link href="{{ asset('assets/plugins/datatables/datatables.bundle.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
<script src="{{ asset('assets/plugins/datatables/datatables.bundle.min.js') }}" type="text/javascript"></script>
<script>
    jQuery(document).ready(function () {
        $('#myDataTables').dataTable({
            pageLength: 10,
            lengthMenu: [[10, 15, 25, -1], [10, 15, 25, "Semua"]],
            order: [[0, 'desc']],
            language: {
                search: "",
                searchPlaceholder: "Cari artikel...",
                lengthMenu: "Tampilkan _MENU_ data",
                info: "Menampilkan _START_ hingga _END_ dari _TOTAL_ entri",
                infoEmpty: "Tidak ada entri",
                zeroRecords: "Tidak ada data yang cocok",
                paginate: {
                    first: "Pertama", last: "Terakhir",
                    next: "Selanjutnya", previous: "Sebelumnya"
                }
            },
            columnDefs: [{ orderable: false, targets: [-1] }]
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
                        <i class="flaticon2-writing"></i>&nbsp; Manajemen Artikel Blog
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <a href="{{ route('blog.post.create') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i> Tulis Artikel
                    </a>
                </div>
            </div>

            {{-- Filter Bar --}}
            <div class="kt-portlet__body pb-0">
                <form method="GET" action="{{ route('blog.post.index') }}" class="form-inline mb-3">
                    <select name="category_id" class="form-control form-control-sm mr-2">
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                    <select name="status" class="form-control form-control-sm mr-2">
                        <option value="">Semua Status</option>
                        <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Draft</option>
                        <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Dipublikasikan</option>
                    </select>
                    <button type="submit" class="btn btn-secondary btn-sm mr-1">
                        <i class="fa fa-filter"></i> Filter
                    </button>
                    <a href="{{ route('blog.post.index') }}" class="btn btn-light btn-sm">Reset</a>
                </form>
            </div>

            <div class="kt-portlet__body">
                <table class="table table-hover table-bordered" id="myDataTables">
                    <thead class="thead-light">
                        <tr>
                            <th width="5%">#</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Dipublikasikan</th>
                            <th>Dibuat</th>
                            <th width="12%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($posts as $index => $post)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    @if($post->thumbnail)
                                    <img src="{{ asset('storage/' . $post->thumbnail) }}"
                                         alt="{{ $post->title }}"
                                         class="rounded mr-2"
                                         style="width:48px; height:36px; object-fit:cover;">
                                    @endif
                                    <div>
                                        <strong>{{ $post->title }}</strong><br>
                                        <small class="text-muted"><code>{{ $post->slug }}</code></small>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $post->category->name ?? '-' }}</td>
                            <td>
                                <span class="{{ $post->status_badge }}">
                                    {{ $post->status_label }}
                                </span>
                            </td>
                            <td>
                                {{ $post->published_at ? $post->published_at->format('d M Y') : '-' }}
                            </td>
                            <td>{{ $post->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('blog.post.edit', $post->id) }}"
                                   class="btn btn-warning btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('blog.post.destroy', $post->id) }}"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Hapus artikel ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">Belum ada artikel.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
