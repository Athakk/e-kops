@extends('user.template.app')

@section('title', 'E - Kops || Pesanan')

@section('content')

    <main>
        <!-- section -->
        <section>
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- col -->
                    <div class="col-lg-3 col-md-4 col-12 border-end d-none d-md-block">
                        <div class="pt-10 pe-lg-10">
                            <!-- nav -->
                            <ul class="nav flex-column nav-pills nav-pills-dark">
                                <!-- nav item -->
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="account-orders.html"><i
                                            class="feather-icon icon-shopping-bag me-2"></i>Detail pesanan-mu</a>
                                </li>
                                <!-- nav item -->
                                <li class="nav-item">
                                    <hr />
                                </li>
                                <!-- nav item -->
                                <li class="nav-item">
                                    <a class="nav-link" href="https://freshcart.codescandy.com/index.html"><i
                                            class="feather-icon icon-log-out me-2"></i>Log out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-12">
                        <div class="py-6 p-md-6 p-lg-10">
                            <!-- heading -->
                            <div class="d-flex justify-content-between">

                                <h2 class="mb-6">Detail pesanan milikmu</h2>

                                <a href="{{ route('pesananHistory') }}">
                                    <button type="button" class="btn btn btn-info" fdprocessedid="g81fsj"><i
                                            class='bx bxs-chevron-left'></i>&nbsp;Kembali</button>
                                </a>
                            </div>

                            <div class="table-responsive-xxl border-0">
                                <!-- Table -->
                                <table class="table mb-0 text-nowrap table-centered">
                                    <!-- Table Head -->
                                    <thead class="bg-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Barang</th>
                                            <th>Qty</th>
                                            <th>Total harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Table body -->
                                        @forelse ($pesananDetail as $item)
                                            <tr>
                                                <td class="align-middle border-top-0 w-0">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="align-middle border-top-0">
                                                    <a href="{{ route('item-detail', $item->id) }}"
                                                        class="fw-semi-bold text-inherit">
                                                        <h6 class="mb-0">{{ $item->barang->nm_barang }}</h6>
                                                    </a>
                                                </td>
                                                <td class="align-middle border-top-0">{{ $item->qty }}
                                                </td>
                                                <td class="align-middle border-top-0">@currency($item->total_harga)
                                                </td>
                                                <td>
                                                    <button
                                                        onclick="deletePesananDetail('{{ route('PesananDetail.destroy', $item->id) }}')"
                                                        class="btn btn-danger {{ $item->status == 0 ? '' : 'd-none' }}"
                                                        type="button"><i class="bi bi-trash fs-5"></i></button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6"
                                                    style="text-align: center;
                                                "
                                                    class="align-middle border-top-0">Belum ada riwayat
                                                    pesanan</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    {{-- sweetalert --}}
    <script>
        function deletePesananDetail(deleteurl) {
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
