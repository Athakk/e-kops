@extends('admin.template.app')

@section('title', 'Barang')

@section('content')
    <div class="col-xxl">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="fw-bold m-0">Barang</h4>
                <div class="d-flex gap-1 justify-content-end align-items-center">
                    <a href="{{ route('barang.create') }}">
                        <button type="button" class="btn btn-primary">
                            <span class="tf-icons bx bx-plus"></span>&nbsp;Tambah Barang</button>
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
                                <th>Foto</th>
                                <th>Nama Barang</th>
                                <th>Kategori</th>
                                <th>Stok</th>
                                <th>Harga</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($barang as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="{{ asset('storage/barang/' . $item->foto) }}" alt="Foto barang"></td>
                                    <td>{{ $item->nm_barang }}</td>
                                    <td>{{ $item->kategori->nm_kategori }}</td>
                                    <td>{{ $item->stok . ' ' . $item->satuan->nm_satuan }}</td>
                                    <td>{{ 'Rp. ' . $item->harga }}</td>
                                    <td class="d-flex gap-1">
                                        <a href="{{ route('barang.edit', $item->id) }}">
                                            <button type="button" class="btn btn-icon btn-warning">
                                                <span class="tf-icons bx bx-edit"></span>
                                            </button>
                                        </a>
                                        <button onclick="deleteKategori('{{ route('barang.destroy', $item->id) }}')"
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
        function deleteKategori(deleteurl) {
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
