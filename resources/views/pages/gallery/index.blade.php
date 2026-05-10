@extends('layouts.main')

@section('title', config('app.alias') . ' | Manajemen Galeri')

@push('styles')
<link href="{{ asset('assets/plugins/datatables/datatables.bundle.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
<script src="{{ asset('assets/plugins/datatables/datatables.bundle.min.js') }}" type="text/javascript"></script>
<script>
    jQuery(document).ready(function () {
        $('#myDataTables').dataTable({
            pageLength: 12,
            order: [[2, 'asc']],
            language: {
                search: "",
                searchPlaceholder: "Cari foto...",
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
        if (confirm('Hapus foto ini?')) {
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
                        <i class="flaticon2-photograph"></i>&nbsp; Manajemen Galeri
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <a href="{{ route('gallery.create') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i> Tambah Foto
                    </a>
                </div>
            </div>

            <div class="kt-portlet__body">
                <table class="table table-hover table-bordered" id="myDataTables">
                    <thead class="thead-light">
                        <tr>
                            <th width="5%">#</th>
                            <th width="10%">Foto</th>
                            <th>Judul</th>
                            <th width="8%">Urutan</th>
                            <th width="10%">Status</th>
                            <th width="12%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($galleries as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <img src="{{ asset(Storage::url($item->image_path)) }}"
                                     alt="{{ $item->title }}"
                                     style="width:60px;height:45px;object-fit:cover;border-radius:4px;">
                            </td>
                            <td>
                                <strong>{{ $item->title }}</strong>
                                @if($item->description)
                                    <br><small class="text-muted">{{ Str::limit($item->description, 60) }}</small>
                                @endif
                            </td>
                            <td class="text-center">{{ $item->order }}</td>
                            <td class="text-center">
                                @if($item->is_active)
                                    <span class="badge badge-success">Aktif</span>
                                @else
                                    <span class="badge badge-secondary">Non-aktif</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('gallery.edit', $item->id) }}"
                                   class="btn btn-warning btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form id="delete-form-{{ $item->id }}"
                                      action="{{ route('gallery.destroy', $item->id) }}" method="POST"
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
                            <td colspan="6" class="text-center text-muted">Belum ada foto galeri.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
