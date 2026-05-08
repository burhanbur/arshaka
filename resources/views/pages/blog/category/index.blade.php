@extends('layouts.main')

@section('title', config('app.alias') . ' | Manajemen Kategori Blog')

@push('scripts')
<script>
    setInterval(function(){
        $('.modalInterval').off('click').on('click', function () {
            $('#modalInterval').modal({backdrop: 'static', keyboard: false});
            $('#modalIntervalContent').load($(this).attr('value'));
            $('#modalIntervalTitle').html($(this).attr('title'));
        });
    }, 500);
</script>
@endpush

@push('modal')
<div class="modal fade" id="modalInterval" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalIntervalTitle"></h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modalError"></div>
                <div id="modalIntervalContent"></div>
            </div>
        </div>
    </div>
</div>
@endpush

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        <i class="flaticon2-layers"></i>&nbsp; Manajemen Kategori Blog
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <a href="#"
                       class="btn btn-primary btn-sm modalInterval"
                       value="{{ route('blog.category.create') }}"
                       title="Tambah Kategori">
                        <i class="fa fa-plus"></i> Tambah Kategori
                    </a>
                </div>
            </div>

            <div class="kt-portlet__body">
                <table class="table table-hover table-bordered" id="myDataTables">
                    <thead class="thead-light">
                        <tr>
                            <th width="5%">#</th>
                            <th>Nama</th>
                            <th>Slug</th>
                            <th>Deskripsi</th>
                            <th>Jumlah Artikel</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $index => $category)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $category->name }}</td>
                            <td><code>{{ $category->slug }}</code></td>
                            <td>{{ $category->description ?? '-' }}</td>
                            <td>{{ $category->posts_count }}</td>
                            <td>
                                <a href="#"
                                   class="btn btn-warning btn-sm modalInterval"
                                   value="{{ route('blog.category.edit', $category->id) }}"
                                   title="Edit Kategori">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('blog.category.destroy', $category->id) }}"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Hapus kategori ini?')">
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
                            <td colspan="6" class="text-center text-muted">Belum ada kategori.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
