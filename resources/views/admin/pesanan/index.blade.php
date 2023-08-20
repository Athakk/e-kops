@extends('admin.template.app')

@section('title', 'Pesanan')

@section('content')
    <div class="row">
        <div class="col-4">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-subtitle text-muted mb-3">Kode Pesanan</div>
                    <h5 class="card-title mb-3">9876545678</h5>
                    <div class="card-subtitle text-muted">Tanggal</div>
                    <h6 class="mb-3">20 Januari 2006</h6>
                    <div class="card-subtitle text-muted">Nama Pemesan</div>
                    <h6 class="mb-3">Bagas Arianto Putra</h6>
                    <div class="card-subtitle text-muted">Status</div>
                    <span class="badge bg-label-warning mb-3">Belum bayar</span>
                    <div class="d-block">
                        <a href="{{ route('pesanan.detail') }}" class="card-link"><button type="button"
                                class="btn btn-primary" fdprocessedid="h4ksrh">Lihat detail pesanan</button></a>
                        <button type="button" class="btn btn-icon btn-success" fdprocessedid="6idn9h">
                            <span class="tf-icons bx bx-check"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="divider">
        <div class="divider-text mb-3">Pesanan selesai</div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-subtitle text-muted mb-3">Kode Pesanan</div>
                    <h5 class="card-title mb-3">9876545678</h5>
                    <div class="card-subtitle text-muted">Tanggal</div>
                    <h6 class="mb-3">20 Januari 2006</h6>
                    <div class="card-subtitle text-muted">Nama Pemesan</div>
                    <h6 class="mb-3">Bagas Arianto Putra</h6>
                    <div class="card-subtitle text-muted">Status</div>
                    <span class="badge bg-label-success mb-3">Selesai</span>
                    <div class="d-block">
                        <a href="{{ route('pesanan.detail') }}" class="card-link"><button type="button"
                                class="btn btn-primary" fdprocessedid="h4ksrh">Lihat detail pesanan</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
