@extends('admin.template.app')

@section('title', 'Stok Keluar')

@section('content')
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header ">
                <div class="alert alert-danger" role="alert">
                    Setelah anda menambahkan stok keluar, data tidak dapat diubah atau dihapus
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Tambah Stok Keluar</h5>
                    <a href="{{ route('stok-keluar.index') }}">
                        <button type="button" class="btn btn btn-outline-danger" fdprocessedid="g81fsj"><i
                                class='bx bxs-chevron-left'></i>&nbsp;Kembali</button>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('stok-keluar.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="barang" class="form-label">Nama barang</label>
                                <select id="barang_id" name="barang_id" class="form-select" fdprocessedid="2tnrtb"
                                    placeholder="Pilih barang">
                                    <option disabled selected value="">Pilih barang</option>
                                    @foreach ($barang as $item)
                                        <option value="{{ $item->id }}">{{ $item->nm_barang }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="stok_keluar">Stok Keluar</label>
                                <input type="number" class="form-control" id="stok_keluar" name="stok_keluar"
                                    placeholder="stok keluar" required fdprocessedid="cpen0p">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input class="form-control" type="date" id="tanggal" name="tanggal" required>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
