@extends('user.template.app')

@section('title', 'E - Kops || Pesanan')

@section('head')
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SET_YOUR_CLIENT_KEY_HERE"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->

@endsection

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
                                            class="feather-icon icon-shopping-bag me-2"></i>Pesanan milikmu</a>
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
                            <h2 class="mb-6">Pesanan milikmu</h2>

                            <div class="table-responsive-xxl border-0">
                                <!-- Table -->
                                <table class="table mb-0 text-nowrap table-centered">
                                    <!-- Table Head -->
                                    <thead class="bg-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Kode Pesanan</th>
                                            <th>Tanggal</th>
                                            <th>Total harga</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Table body -->

                                        @forelse ($pesanan as $item)
                                            <tr>
                                                <td class="align-middle border-top-0 w-0">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="align-middle border-top-0">
                                                    <a href="#" class="fw-semi-bold text-inherit">
                                                        <h6 class="mb-0">{{ $item->kd_pesanan }}</h6>
                                                    </a>
                                                </td>
                                                <td class="align-middle border-top-0">{{ $item->tanggal }}
                                                </td>
                                                <td class="align-middle border-top-0">@currency($item->total_harga)
                                                </td>
                                                <td class="align-middle border-top-0">
                                                    @if ($item->status == 0)
                                                        <span class="badge bg-warning">
                                                            Belum bayar
                                                        </span>
                                                    @elseif($item->status == 1)
                                                        <span class="badge bg-info">
                                                            Sudah bayar
                                                        </span>
                                                    @else
                                                        <span class="badge bg-success">
                                                            Selesai
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('pesananHistory.detail', $item->id) }}">
                                                        <button class="btn btn-info" type="button"><i
                                                                class="bi bi-eye fs-5"></i></button>
                                                    </a>
                                                    <button class="btn btn-primary {{ $item->status == 0 ? '' : 'd-none' }}"
                                                        type="button" onclick="bayar('{{ $item->snapToken }}')"><i
                                                            class="bi bi-wallet fs-5"></i></button>
                                                    <button
                                                        onclick="deletePesanan('{{ route('Pesanan.destroy', $item->id) }}')"
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
            <form action="{{ route('callBack') }}" method="post" id="form_callback">
                @csrf
                <input type="hidden" value="" id="json_callback" name="json_callback">
            </form>
        </section>
    </main>
    {{-- sweetalert --}}
    <script>
        function deletePesanan(deleteurl) {
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

        function bayar(snapToken) {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay(snapToken, {
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    alert("payment success!");
                    sendResponseFor(result)
                    console.log(result);
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    alert("wating your payment!");
                    sendResponseFor(result)
                    console.log(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    sendResponseFor(result)
                    console.log(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            });

            function sendResponseFor(result) {
                document.getElementById('json_callback').value = JSON.stringify(result);
                $('#form_callback').submit();
            }
        }
    </script>
@endsection
