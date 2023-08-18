@extends('admin.template.app')

@section('title', 'Stok Masuk')

@section('content')
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Edit Stok Masuk</h5>
                <a href="{{ route('stok-masuk.index') }}">
                    <button type="button" class="btn btn btn-outline-danger" fdprocessedid="g81fsj"><i
                            class='bx bxs-chevron-left'></i>&nbsp;Kembali</button>
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('stok-masuk.update', $stok_masuk->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="barang" class="form-label">Nama barang</label>
                                <select id="barang_id" name="barang_id" class="form-select" fdprocessedid="2tnrtb"
                                    placeholder="Pilih barang">
                                    <option disabled selected value="">Pilih barang</option>
                                    @foreach ($barang as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $stok_masuk->barang_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->nm_barang }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="stok_masuk">Stok Masuk</label>
                                <input type="number" class="form-control" id="stok_masuk" name="stok_masuk"
                                    value="{{ old('stok_masuk', $stok_masuk->stok_masuk) }}" placeholder="stok masuk"
                                    required fdprocessedid="cpen0p">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input class="form-control" type="date" id="tanggal" name="tanggal"
                                    value="{{ old('tanggal', $stok_masuk->tanggal) }}" required>
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
