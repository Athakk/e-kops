@extends('user.template.app')

@section('title', 'E - Kops || Toko')

@section('content')
    <main>
        <!-- section-->
        <div class="mt-4">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- col -->
                    <div class="col-12">
                        <!-- breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item">Shop</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- section -->
        <div class="mt-8 mb-lg-14 mb-8">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row gx-10">
                    <!-- col -->
                    <aside class="col-lg-3 col-md-4 mb-6 mb-md-0">
                        <div class="offcanvas offcanvas-start offcanvas-collapse w-md-50" tabindex="-1"
                            id="offcanvasCategory" aria-labelledby="offcanvasCategoryLabel">
                            <div class="offcanvas-header d-lg-none">
                                <h5 class="offcanvas-title" id="offcanvasCategoryLabel">Filter</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body ps-lg-2 pt-lg-0">
                                <div class="mb-8">
                                    <!-- title -->
                                    <h5 class="mb-3">Kategori</h5>
                                    <!-- nav -->
                                    <ul class="nav nav-category" id="categoryCollapseMenu">
                                        <!-- nav -->

                                        <ul class="nav flex-column ms-3">
                                            <!-- nav item -->
                                            @foreach ($kategori as $item)
                                                <li class="nav-item"><a href="{{ route('searchItem.kategori', $item->id) }}"
                                                        class="nav-link">{{ $item->nm_kategori }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <section class="col-lg-9 col-md-12">
                        <!-- card -->
                        <div class="row g-4 row-cols-xl-3 row-cols-lg-3 row-cols-2 row-cols-md-2">
                            @if (count($barang) !== 0)
                                @foreach ($barang as $item)
                                    <!-- col -->
                                    <div class="col">
                                        <!-- card -->
                                        <div class="card card-product">
                                            <div class="card-body">
                                                <!-- badge -->
                                                <div class="text-center position-relative">
                                                    <a href="{{ route('item-detail', $item->id) }}"> <!-- img --><img
                                                            src="{{ asset('storage/barang/' . $item->foto) }}"
                                                            alt="Grocery Ecommerce Template" class="mb-3 img-fluid" /></a>
                                                    <!-- action btn -->
                                                </div>
                                                <!-- heading -->
                                                <div class="text-small mb-1">
                                                    <a href="#!"
                                                        class="text-decoration-none text-muted"><small>{{ $item->kategori->nm_kategori }}</small></a>
                                                </div>
                                                <h2 class="fs-6 d-flex justify-content-between"><a
                                                        href="{{ route('item-detail', $item->id) }}"
                                                        class="text-inherit text-decoration-none">{{ $item->nm_barang }}</a>
                                                    <span
                                                        class="text-decoration-none text-muted"><small>{{ 'Stok ' . $item->stok }}</small></span>
                                                </h2>
                                                <!-- price -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <span
                                                        class="text-dark">{{ 'Rp ' . number_format($item->harga, 0, '.', '.') }}</span>
                                                    <!-- btn -->
                                                    {{-- <div>
                                                        <a href="{{ route('addKeranjang', $item->id) }}">
                                                            <button class="btn btn-primary btn-sm "
                                                                {{ $item->stok <= 0 ? 'disabled' : '' }}>

                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-plus">
                                                                    <line x1="12" y1="5" x2="12"
                                                                        y2="19"></line>
                                                                    <line x1="5" y1="12" x2="19"
                                                                        y2="12"></line>
                                                                </svg>
                                                                Tambah
                                                            </button>
                                                        </a>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                        </div>
                    @else
                        <div class="text-center">
                            <h4>Ooopsie, produk tidak ditemukan</h4>
                        </div>
                        @endif
                    </section>
                </div>
            </div>
        </div>
    </main>

    <!-- modal -->
    <!-- Modal -->
    <div class="modal fade" id="quickViewModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-8">
                    <div class="position-absolute top-0 end-0 me-3 mt-3">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- img slide -->
                            <div class="product productModal" id="productModal">
                                <div class="zoom" onmousemove="zoom(event)"
                                    style="background-image: url(../assets/images/products/product-single-img-1.jpg)">
                                    <!-- img -->
                                    <img src="{{ asset('assets/images/products/product-single-img-1.jpg') }}"
                                        alt="" />
                                </div>
                                <div>
                                    <div class="zoom" onmousemove="zoom(event)"
                                        style="background-image: url(../assets/images/products/product-single-img-2.jpg)">
                                        <!-- img -->
                                        <img src="{{ asset('assets/images/products/product-single-img-2.jpg') }}"
                                            alt="" />
                                    </div>
                                </div>
                                <div>
                                    <div class="zoom" onmousemove="zoom(event)"
                                        style="background-image: url(../assets/images/products/product-single-img-3.jpg)">
                                        <!-- img -->
                                        <img src="{{ asset('assets/images/products/product-single-img-3.jpg') }}"
                                            alt="" />
                                    </div>
                                </div>
                                <div>
                                    <div class="zoom" onmousemove="zoom(event)"
                                        style="background-image: url(../assets/images/products/product-single-img-4.jpg)">
                                        <!-- img -->
                                        <img src="{{ asset('assets/images/products/product-single-img-4.') }}jpg"
                                            alt="" />
                                    </div>
                                </div>
                            </div>
                            <!-- product tools -->
                            <div class="product-tools">
                                <div class="thumbnails row g-3" id="productModalThumbnails">
                                    <div class="col-3" class="tns-nav-active">
                                        <div class="thumbnails-img">
                                            <!-- img -->
                                            <img src="{{ asset('assets/images/products/product-single-img-1.jpg') }}"
                                                alt="" />
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="thumbnails-img">
                                            <!-- img -->
                                            <img src="{{ asset('assets/images/products/product-single-img-2.jpg') }}"
                                                alt="" />
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="thumbnails-img">
                                            <!-- img -->
                                            <img src="{{ asset('assets/images/products/product-single-img-3.jpg') }}"
                                                alt="" />
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="thumbnails-img">
                                            <!-- img -->
                                            <img src="{{ asset('assets/images/products/product-single-img-4.jpg') }}"
                                                alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="ps-lg-8 mt-6 mt-lg-0">
                                <a href="#!" class="mb-4 d-block">Bakery Biscuits</a>
                                <h2 class="mb-1 h1">Napolitanke Ljesnjak</h2>
                                <div class="mb-4">
                                    <small class="text-warning">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-half"></i></small><a href="#" class="ms-2">(30
                                        reviews)</a>
                                </div>
                                <div class="fs-4">
                                    <span class="fw-bold text-dark">$32</span>
                                    <span class="text-decoration-line-through text-muted">$35</span><span><small
                                            class="fs-6 ms-2 text-danger">26% Off</small></span>
                                </div>
                                <hr class="my-6" />
                                <div class="mb-4">
                                    <button type="button" class="btn btn-outline-secondary">250g</button>
                                    <button type="button" class="btn btn-outline-secondary">500g</button>
                                    <button type="button" class="btn btn-outline-secondary">1kg</button>
                                </div>
                                <div>
                                    <!-- input -->
                                    <!-- input -->
                                    <div class="input-group input-spinner">
                                        <input type="button" value="-" class="button-minus btn btn-sm"
                                            data-field="quantity" />
                                        <input type="number" step="1" max="10" value="1"
                                            name="quantity" class="quantity-field form-control-sm form-input" />
                                        <input type="button" value="+" class="button-plus btn btn-sm"
                                            data-field="quantity" />
                                    </div>
                                </div>
                                <div class="mt-3 row justify-content-start g-2 align-items-center">
                                    <div class="col-lg-4 col-md-5 col-6 d-grid">
                                        <!-- button -->
                                        <!-- btn -->
                                        <button type="button" class="btn btn-primary"><i
                                                class="feather-icon icon-shopping-bag me-2"></i>Add to cart</button>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <!-- btn -->
                                        <a class="btn btn-light" href="#" data-bs-toggle="tooltip"
                                            data-bs-html="true" aria-label="Compare"><i
                                                class="bi bi-arrow-left-right"></i></a>
                                        <a class="btn btn-light" href="#!" data-bs-toggle="tooltip"
                                            data-bs-html="true" aria-label="Wishlist"><i
                                                class="feather-icon icon-heart"></i></a>
                                    </div>
                                </div>
                                <hr class="my-6" />
                                <div>
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td>Product Code:</td>
                                                <td>FBB00255</td>
                                            </tr>
                                            <tr>
                                                <td>Availability:</td>
                                                <td>In Stock</td>
                                            </tr>
                                            <tr>
                                                <td>Type:</td>
                                                <td>Fruits</td>
                                            </tr>
                                            <tr>
                                                <td>Shipping:</td>
                                                <td>
                                                    <small>01 day shipping.<span class="text-muted">( Free pickup
                                                            today)</span></small>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
