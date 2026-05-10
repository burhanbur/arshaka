@extends('layouts.main')

@section('title', config('app.alias') . ' | Kategori Armada')

@push('styles')
<link href="{{ asset('assets/plugins/datatables/datatables.bundle.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
<script src="{{ asset('assets/plugins/datatables/datatables.bundle.min.js') }}" type="text/javascript"></script>
<script>
    jQuery(document).ready(function () {
        $('#myDataTables').dataTable({
            pageLength: 15,
            order: [[3, 'asc']],
            language: {
                search: "",
                searchPlaceholder: "Cari kategori...",
                lengthMenu: "Tampilkan _MENU_ data",
                info: "Menampilkan _START_ hingga _END_ dari _TOTAL_ entri",
                infoEmpty: "Tidak ada entri",
                zeroRecords: "Tidak ada data yang cocok",
                paginate: { first: "Pertama", last: "Terakhir", next: "Selanjutnya", previous: "Sebelumnya" }
            },
            columnDefs: [{ orderable: false, targets: [-1] }]
        });
    });

    function confirmDelete(id) {
        if (confirm('Hapus kategori ini? Semua foto terkait juga akan dihapus.')) {
            document.getElementById('delete-form-' + id).submit();
        }
    }
</script>
@endpush

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        <i class="flaticon2-delivery-truck"></i>&nbsp; Kategori Armada
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <a href="{{ route('fleet.photo.index') }}" class="btn btn-info btn-sm mr-2">
                        <i class="fa fa-images"></i> Kelola Foto Armada
                    </a>
                    <a href="{{ route('fleet.category.create') }}" class="btn btn-primary btn-sm">
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
                            <th width="8%">Urutan</th>
                            <th width="8%">Foto</th>
                            <th width="10%">Status</th>
                            <th width="12%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><strong>{{ $item->name }}</strong></td>
                            <td><code>{{ $item->slug }}</code></td>
                            <td class="text-center">{{ $item->order }}</td>
                            <td class="text-center">
                                <a href="{{ route('fleet.photo.index', ['fleet_category_id' => $item->id]) }}"
                                   class="badge badge-info">
                                    {{ $item->photos_count }} foto
                                </a>
                            </td>
                            <td class="text-center">
                                @if($item->is_active)
                                    <span class="badge badge-success">Aktif</span>
                                @else
                                    <span class="badge badge-secondary">Non-aktif</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('fleet.category.edit', $item->id) }}"
                                   class="btn btn-warning btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form id="delete-form-{{ $item->id }}"
                                      action="{{ route('fleet.category.destroy', $item->id) }}" method="POST"
                                      style="display:inline-block;">
                                    @csrf @method('DELETE')
                                </form>
                                <button class="btn btn-danger btn-sm"
                                        onclick="confirmDelete('{{ $item->id }}')">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">Belum ada kategori armada.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
