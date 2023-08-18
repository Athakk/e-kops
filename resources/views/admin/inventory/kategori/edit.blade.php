@extends('admin.template.app')

@section('title', 'Kategori')

@section('content')
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Edit Kategori</h5>
                <a href="{{ route('kategori.index') }}">
                    <button type="button" class="btn btn btn-outline-danger" fdprocessedid="g81fsj"><i
                            class='bx bxs-chevron-left'></i>&nbsp;Kembali</button>
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('kategori.update', $kategori->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="nm_kategori">Nama Kategori</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nm_kategori" name="nm_kategori"
                                value="{{ old('nm_kategori', $kategori->nm_kategori) }}" placeholder="Kategori barang"
                                required />
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
