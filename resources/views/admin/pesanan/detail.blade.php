@extends('admin.template.app')

@section('title', 'Detail Pesanan')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="d-flex gap-1 align-items-center">
                <h4 class="fw-bold m-0">Detail Pesanan</h4>
                <div class="card-subtitle text-muted">{{ $pesanan->kd_pesanan }}</div>
            </div>

            <div class="d-flex gap-1 justify-content-end align-items-center">
                <a href="{{ route('pesanan') }}">
                    <button type="button" class="btn btn-primary">
                        <span class="tf-icons bx bx-chevron-left"></span>&nbsp;Kembali</button>
                </a>
            </div>
        </div>
        <hr class="m-0 " />
        <div class="card-body">
            <div class="table-responsive text-nowrap mb-4">
                <table class="table table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Barang</th>
                            <th>Qty</th>
                            <th>Harga</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($detail as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->barang->nm_barang }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>@currency($item->barang->harga) </td>
                                <td>@currency($item->total_harga)</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
