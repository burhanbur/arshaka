@extends('layouts.main')

@section('title', config('app.alias') . ' | Pesan Masuk')

@push('styles')
<link href="{{ asset('assets/plugins/datatables/datatables.bundle.min.css') }}" rel="stylesheet" type="text/css" />
<style>
    tr.unread td { font-weight: 600; }
</style>
@endpush

@push('scripts')
<script src="{{ asset('assets/plugins/datatables/datatables.bundle.min.js') }}" type="text/javascript"></script>
<script>
    jQuery(document).ready(function () {
        $('#myDataTables').dataTable({
            pageLength: 15,
            order: [[0, 'desc']],
            language: {
                search: "",
                searchPlaceholder: "Cari pesan...",
                lengthMenu: "Tampilkan _MENU_ data",
                info: "Menampilkan _START_ hingga _END_ dari _TOTAL_ entri",
                infoEmpty: "Tidak ada entri",
                zeroRecords: "Tidak ada data yang cocok",
                paginate: { first: "Pertama", last: "Terakhir", next: "Selanjutnya", previous: "Sebelumnya" }
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
                        <i class="flaticon2-mail"></i>&nbsp; Pesan Masuk
                        @if($unreadCount > 0)
                            <span class="badge badge-danger ml-1">{{ $unreadCount }} Baru</span>
                        @endif
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <a href="{{ route('message.index') }}"
                       class="btn btn-sm {{ request('filter', 'all') === 'all' ? 'btn-primary' : 'btn-outline-primary' }}">
                        Semua
                    </a>
                    <a href="{{ route('message.index', ['filter' => 'unread']) }}"
                       class="btn btn-sm ml-1 {{ request('filter') === 'unread' ? 'btn-warning' : 'btn-outline-warning' }}">
                        Belum Dibaca
                    </a>
                    <a href="{{ route('message.index', ['filter' => 'read']) }}"
                       class="btn btn-sm ml-1 {{ request('filter') === 'read' ? 'btn-secondary' : 'btn-outline-secondary' }}">
                        Sudah Dibaca
                    </a>
                </div>
            </div>

            <div class="kt-portlet__body">
                <table class="table table-hover table-bordered" id="myDataTables">
                    <thead class="thead-light">
                        <tr>
                            <th width="5%">#</th>
                            <th>Pengirim</th>
                            <th>Email</th>
                            <th>Subjek</th>
                            <th>Diterima</th>
                            <th width="10%">Status</th>
                            <th width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($messages as $index => $message)
                        <tr class="{{ !$message->is_read ? 'unread' : '' }}">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->subject }}</td>
                            <td>{{ $message->created_at->format('d M Y H:i') }}</td>
                            <td>
                                @if(!$message->is_read)
                                    <span class="badge badge-warning">Belum Dibaca</span>
                                @else
                                    <span class="badge badge-success">Sudah Dibaca</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('message.show', $message->id) }}"
                                   class="btn btn-info btn-sm">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <form action="{{ route('message.destroy', $message->id) }}"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Hapus pesan ini?')">
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
                            <td colspan="7" class="text-center text-muted">Tidak ada pesan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
