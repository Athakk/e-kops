@extends('admin.template.app')

@section('title', 'Stok Masuk')

@section('content')
    <div class="col-xxl">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="fw-bold m-0">Stok Masuk</h4>
                <div class="d-flex gap-1 justify-content-end align-items-center">
                    <a href="{{ route('stok-masuk.create') }}">
                        <button type="button" class="btn btn-primary">
                            <span class="tf-icons bx bx-plus"></span>&nbsp;Tambah Stok Masuk</button>
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
                                <th>Stok Masuk</th>
                                <th>Tanggal</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($stok_masuk as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->barang->nm_barang }}</td>
                                    <td>{{ $item->stok_masuk . ' ' . $item->barang->satuan->nm_satuan }}</td>
                                    <td>{{ $item->tanggal }}</td>
                                    <td class="d-flex gap-1">
                                        <a href="{{ route('stok-masuk.edit', $item->id) }}">
                                            <button type="button" class="btn btn-icon btn-warning">
                                                <span class="tf-icons bx bx-edit"></span>
                                            </button>
                                        </a>
                                        <button onclick="deleteStokMasuk('{{ route('stok-masuk.destroy', $item->id) }}')"
                                            type="submit" class="btn btn-icon btn-danger btn-delete">
                                            <span class="tf-icons bx bx-trash"></span>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {{-- sweetalert --}}

    <script>
        function deleteStokMasuk(deleteurl) {
            $(document).ready(function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                swal({
                        title: "Apakah anda yakin?",
                        text: "Setelah dihapus, Anda tidak dapat memulihkan data ini lagi!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                type: "DELETE",
                                url: deleteurl,
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                },
                                success: function(response) {
                                    swal(response.status, {
                                            icon: "success",
                                        })
                                        .then((result) => {
                                            location.reload();
                                        });
                                }
                            });
                        }
                    });
            });

        }
    </script>
@endsection
