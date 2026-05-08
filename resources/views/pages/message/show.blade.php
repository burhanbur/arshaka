@extends('layouts.main')

@section('title', config('app.alias') . ' | Detail Pesan')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        <i class="flaticon2-mail"></i>&nbsp; Detail Pesan
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <a href="{{ route('message.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>

            <div class="kt-portlet__body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th width="20%" class="bg-light">Nama</th>
                            <td>{{ $data->name }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Email</th>
                            <td>
                                <a href="mailto:{{ $data->email }}">{{ $data->email }}</a>
                            </td>
                        </tr>
                        <tr>
                            <th class="bg-light">Telepon</th>
                            <td>{{ $data->phone ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Subjek</th>
                            <td>{{ $data->subject }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Diterima</th>
                            <td>{{ $data->created_at->format('d M Y, H:i') }} WIB</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Status</th>
                            <td>
                                @if($data->is_read)
                                    <span class="badge badge-success">Sudah Dibaca</span>
                                    <small class="text-muted ml-1">pada {{ $data->read_at?->format('d M Y H:i') }}</small>
                                @else
                                    <span class="badge badge-warning">Belum Dibaca</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="mt-3">
                    <label class="font-weight-bold">Isi Pesan:</label>
                    <div class="p-3 bg-light rounded border mt-1" style="white-space: pre-wrap; min-height: 120px;">{{ $data->body }}</div>
                </div>

                <div class="mt-4 d-flex justify-content-between">
                    <a href="mailto:{{ $data->email }}?subject=Re: {{ $data->subject }}"
                       class="btn btn-primary">
                        <i class="fa fa-reply"></i> Balas via Email
                    </a>
                    <form action="{{ route('message.destroy', $data->id) }}"
                          method="POST"
                          onsubmit="return confirm('Hapus pesan ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i> Hapus Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
