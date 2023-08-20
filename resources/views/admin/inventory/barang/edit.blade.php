@extends('admin.template.app')

@section('title', 'Barang')

@section('content')
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Edit Barang</h5>
                <a href="{{ route('barang.index') }}">
                    <button type="button" class="btn btn btn-outline-danger" fdprocessedid="g81fsj"><i
                            class='bx bxs-chevron-left'></i>&nbsp;Kembali</button>
                </a>
            </div>
            <div class="card-body">

                <form action="{{ route('barang.update', $barang->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="nm_barang">Nama Barang</label>
                                <input type="text" class="form-control" id="nm_barang" name="nm_barang"
                                    value="{{ old('nm_barang', $barang->nm_barang) }}" placeholder="nama barang" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="stok">Stok</label>
                                <input type="number" class="form-control" id="stok" name="stok" placeholder="stok"
                                    value="{{ old('stok', $barang->stok) }}" disabled fdprocessedid="cpen0p">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="satuan" class="form-label">satuan</label>
                                <select id="satuan_id" name="satuan_id" class="form-select" fdprocessedid="2tnrtb"
                                    placeholder="Pilih satuan">
                                    <option disabled selected value="">Pilih Satuan</option>
                                    @foreach ($satuan as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $barang->satuan_id == $item->id ? 'selected' : '' }}>{{ $item->nm_satuan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="harga">Harga</label>
                                <input type="text" class="form-control" id="harga" name="harga" placeholder="harga"
                                    value="{{ old('harga', $barang->harga) }}" required fdprocessedid="cpen0p"
                                    oninput="formatHarga()">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori</label>
                                <select id="kategori_id" name="kategori_id" class="form-select" fdprocessedid="2tnrtb"
                                    placeholder="Pilih kategori">
                                    <option disabled selected value="">Pilih kategori</option>
                                    @foreach ($kategori as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $barang->kategori_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->nm_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label" for="file">Foto Barang</label>
                                <input type="file" class="dropify form-control" id="file" name="file"
                                    data-max-file-size="3M"
                                    data-default-file="{{ asset('storage/barang/' . $barang->foto) }}" />
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

    <script>
        $('.dropify').dropify();

        function formatHarga() {
            const inputElement = document.getElementById('harga');
            let value = inputElement.value.replace(/\D/g, ''); // Hapus karakter non-numeric

            if (value !== "") {
                value = parseInt(value);
                const formattedValue = value.toLocaleString('id-ID');
                inputElement.value = formattedValue;
            }
        }

        formatHarga();
    </script>
@endsection
