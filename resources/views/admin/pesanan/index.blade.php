@extends('admin.template.app')

@section('title', 'Pesanan')

@section('content')
    <div class="row">
        @foreach ($pesanan as $item)
            <div class="col-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-subtitle text-muted mb-3">Kode Pesanan</div>
                        <h5 class="card-title mb-3">{{ $item->kd_pesanan }}</h5>
                        <div class="card-subtitle text-muted">Tanggal</div>
                        <h6 class="mb-3">{{ $item->tanggal }}</h6>
                        <div class="card-subtitle text-muted">Nama Pemesan</div>
                        <h6 class="mb-3">{{ $item->user->nama }}</h6>
                        <div class="card-subtitle text-muted">Status</div>
                        @if ($item->status == 0)
                            <span class="badge bg-label-warning mb-3">
                                Belum bayar
                            </span>
                        @elseif($item->status == 1)
                            <span class="badge bg-label-info mb-3">
                                Sudah bayar
                            </span>
                        @else
                            <span class="badge bg-label-success mb-3">
                                Selesai
                            </span>
                        @endif
                        <div class="d-block">
                            <a href="{{ route('pesanan.detail', $item->id) }}" class="card-link"><button type="button"
                                    class="btn btn-primary" fdprocessedid="h4ksrh">Lihat detail pesanan</button></a>
                            <a href="{{ route('pesanan.statusDone', $item->id) }}"
                                class="{{ $item->status == 0 ? 'd-none' : '' }}">
                                <button type="button" class="btn btn-icon btn-success" fdprocessedid="6idn9h">
                                    <span class="tf-icons bx bx-check"></span>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="divider text-center my-4">
        <div class="divider-text">Pesanan Selesai</div>
    </div>

    <div class="row">
        @foreach ($pesananDone as $item)
            <div class="col-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-subtitle text-muted mb-3">Kode Pesanan</div>
                        <h5 class="card-title mb-3">{{ $item->kd_pesanan }}</h5>
                        <div class="card-subtitle text-muted">Tanggal</div>
                        <h6 class="mb-3">{{ $item->tanggal }}</h6>
                        <div class="card-subtitle text-muted">Nama Pemesan</div>
                        <h6 class="mb-3">{{ $item->user->nama }}</h6>
                        <div class="card-subtitle text-muted">Status</div>
                        <span class="badge bg-label-success mb-3">
                            Selesai
                        </span>
                        <div class="d-block">
                            <a href="{{ route('pesanan.detail', $item->id) }}" class="card-link"><button type="button"
                                    class="btn btn-primary" fdprocessedid="h4ksrh">Lihat detail pesanan</button></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
