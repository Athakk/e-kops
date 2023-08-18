@extends('admin.template.app')

@section('title', 'Satuan')

@section('content')
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Tambah Satuan</h5>
                <a href="{{ route('satuan.index') }}">
                    <button type="button" class="btn btn btn-outline-danger" fdprocessedid="g81fsj"><i
                            class='bx bxs-chevron-left'></i>&nbsp;Kembali</button>
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('satuan.store') }}" method="post">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="nm_satuan">Nama Satuan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nm_satuan" name="nm_satuan"
                                placeholder="Kg, M, Buah" required />
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
