@extends('user.template.app')

@section('title', $barang->nm_barang)

@section('content')
    <main>
        <div class="mt-4">
            <div class="container">
                <!-- row -->
                <div class="row ">
                    <!-- col -->
                    <div class="col-12">
                        <!-- breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item">Detail Item</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <section class="mt-8 mb-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="slider slider-for">
                            <div>
                                <div class="zoom" onmousemove="zoom(event)"
                                    style="background-image: url({{asset('storage/barang/' . $barang->foto)}})">
                                    <!-- img -->
                                    <!-- img --><img src="{{ asset('storage/barang/' . $barang->foto) }}" class="img-fluid"
                                        alt="">
                                </div>
                            </div>
                        </div>
                        <div class="slider slider-nav mt-4">
                            <div>
                                <img src="{{ asset('storage/barang/' . $barang->foto) }}" alt=""
                                    class="w-100 rounded img-fluid">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <form action="{{route('beliFromDetail', $barang->id)}}" method="post">
                            @csrf
                        <div class="ps-lg-10 mt-6 mt-md-0">
                            <!-- content -->
                            <a href="#!" class="mb-4 d-block">{{ $barang->kategori->nm_kategori }}</a>
                            <!-- heading -->
                            <h1 class="mb-1">{{ $barang->nm_barang }} </h1>
                            <div class="fs-4">
                                <!-- price --><span class="fw-bold text-dark">@currency($barang->harga)</span>
                            </div>
                            <!-- hr -->
                            <hr class="my-6">
                            <div>
                                <!-- input -->
                                <div class="input-group input-spinner  ">
                                    <input type="button" value="-" class="button-minus  btn  btn-sm" id="button-minus">
                                    <input type="number" value="1" max="{{$barang->stok}}"  name="qty" id="qty" class="form-control-sm form-input">
                                    <input type="button" value="+" class="button-plus btn btn-sm " id="button-plus">
                                </div>
                            </div>
                            <div class="mt-3 row justify-content-start g-2 align-items-center">

                                <div class="col-xxl-4 col-lg-4 col-md-5 col-5 d-grid">
                                    <!-- button -->
                                    <!-- btn --> 
                                    <button type="submit" class="btn btn-primary {{ $barang->stok <= 0 ? 'disabled' : '' }}" ><i
                                            class="feather-icon icon-shopping-bag me-2"></i>Beli</button>
                                </div>

                            </div>
                            <!-- hr -->
                            <hr class="my-6">
                            <div>
                                <!-- table -->
                                <table class="table table-borderless mb-0">

                                    <tbody>
                                        <tr>
                                            <td>Stok tersedia:</td>
                                            <td>{{{ $barang->stok }}}</td>
                                        </tr>
                                        <tr>
                                            <td>Type:</td>
                                            <td>{{ $barang->kategori->nm_kategori }}</td>

                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- section -->
        <section class="my-lg-14 my-14">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-12">
                        <!-- heading -->
                        <h3>Barang terkait</h3>
                    </div>
                </div>
                <!-- row -->
                <div class="row g-4 row-cols-lg-5 row-cols-2 row-cols-md-2 mt-2">
                    <!-- col -->
                    @foreach ($barangRelated as $item)
                    <div class="col">
                        <div class="card card-product">
                            <div class="card-body">
                                <!-- badge -->

                                <div class="text-center position-relative ">
                                    <a href="{{ route('item-detail', $item->id) }}">
                                        <!-- img --><img src="{{ asset('storage/barang/' . $item->foto) }}"
                                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                                </div>
                                <!-- heading -->
                                <div class="text-small mb-1"><a href="#!"
                                        class="text-decoration-none text-muted"><small>{{$item->kategori->nm_kategori}}</small></a></div>
                                <h2 class="fs-6 d-flex justify-content-between"><a href="{{ route('item-detail', $item->id) }}" class="text-inherit text-decoration-none">{{$item->nm_barang}}</a>                                                     <span
                                    class="text-decoration-none text-muted"><small>{{ 'Stok ' . $item->stok }}</small></span>
</h2>
                                <!-- price -->
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="text-dark">@currency($item->harga)</span> 
                                    <div></div>                                    
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <div></div>                  
                                    <a href="{{ route('addKeranjang', $item->id) }}">
                                        <button class="btn btn-primary btn-sm {{ $item->stok <= 0 ? 'disabled' : '' }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-plus">
                                            <line x1="12" y1="5" x2="12" y2="19">
                                            </line>
                                            <line x1="5" y1="12" x2="19" y2="12">
                                            </line>
                                        </svg> Tambah
                                        </button>
                                        </a>              
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

    </main>

    <script>
        const angkaInput = document.getElementById('qty');
        const tambahButton = document.getElementById('button-plus');
        const kurangButton = document.getElementById('button-minus');

        console.log(angkaInput.max);

// Tambahkan event listener ke tombol Tambah
tambahButton.addEventListener('click', function() {
    // Ambil nilai dari input dan tambahkan 1

    const currentValue = parseFloat(angkaInput.value);
    if(currentValue < angkaInput.max){

        const newValue = currentValue + 1;   
        angkaInput.value = newValue;
    }
});

// Tambahkan event listener ke tombol Kurang
kurangButton.addEventListener('click', function() {
    // Ambil nilai dari input dan kurangi 1
    const currentValue = parseFloat(angkaInput.value);

    // Jika nilai saat ini lebih besar dari 0, kurangi 1 dan setel nilai input
    if (currentValue > 1) {
        const newValue = currentValue - 1;
        angkaInput.value = newValue;
    }
});
    </script>

@endsection
