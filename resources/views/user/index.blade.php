@extends('user.template.app')

@section('title', 'E - Kops || Home')

@section('content')
    <main>

        <section class="mt-8">
            <div class="container">
                <div class="hero-slider ">
                    <div
                        style="background: url(assets/images/slider/hero-img-slider-1.jpg)no-repeat; background-size: cover; border-radius: .5rem; background-position: center;">
                        <div class="ps-lg-12 py-lg-16 col-xxl-5 col-lg-7 col-md-8 py-14 px-8 text-xs-center">


                            <h1 class="text-white display-5 fw-bold mt-4">E-Kops for Easier Transaction </h1>
                            <p class="lead text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Pariatur mollitia maxime dolor fugiat magnam architecto totam praesentium accusantium.
                                Magnam ea velit porro facilis, dolorem delectus labore ex quidem dolore doloribus?</p>
                            <a href="{{ route('toko') }}" class="btn btn-dark mt-3">Shop Now <i
                                    class="feather-icon icon-arrow-right ms-1"></i></a>
                        </div>

                    </div>
                    <div class=" "
                        style="background: url(assets/images/slider/hero-img-slider-2.jpg)no-repeat; background-size: cover; border-radius: .5rem; background-position: center;">
                        <div class="ps-lg-12 py-lg-16 col-xxl-5 col-lg-7  col-md-8 py-14 px-8 text-xs-center">

                            <h1 class="text-dark display-5 fw-bold mt-4">Opening Sale<br>
                                Discount up to <span class="text-primary display-6">50%</span></h1>
                            <p class="lead ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia repudiandae
                                rerum necessitatibus, sequi quaerat asperiores in alias? Itaque omnis numquam magni
                                cupiditate, fugiat qui nobis corrupti eum eos in harum?
                            </p>
                            <a href="{{ route('toko') }}" class="btn btn-dark mt-3">Shop Now <i
                                    class="feather-icon icon-arrow-right ms-1"></i></a>
                        </div>

                    </div>
                    <div class=" "
                        style="background: url(assets/images/slider/hero-img-slider-3.jpg)no-repeat; background-size: cover; border-radius: .5rem; background-position: center;">
                        <div class="ps-lg-12 py-lg-16 col-xxl-5 col-lg-7  col-md-8 py-14 px-8 text-xs-center">

                            <h1 class="text-dark display-5 fw-bold mt-4">Midnight Munch Combo </h1>
                            <p class="lead ">Snack on late-night munchies of delicious nuts & you’re guaranteed
                                happiness before you
                                doze!
                            </p>
                            <a href="{{ route('toko') }}" class="btn btn-dark mt-3">Shop Now <i
                                    class="feather-icon icon-arrow-right ms-1"></i></a>
                        </div>

                    </div>


                </div>
            </div>
        </section>


        <div class=" mt-lg-12 mb-lg-14 mb-8">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row ">
                    <!-- col -->
                    <aside class="col-xl-3 col-lg-4 col-md-4 mb-6 mb-md-0">
                        <div id="sidebar">
                            <div class="sidebar__inner">
                                <div class="offcanvas offcanvas-start offcanvas-collapse " tabindex="-1"
                                    id="offcanvasCategory" aria-labelledby="offcanvasCategoryLabel">
                                    <div class="offcanvas-header d-lg-none">
                                        <h5 class="offcanvas-title" id="offcanvasCategoryLabel">Filter</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body p-lg-0 ">
                                        <div class="mb-4">
                                            <!-- title -->
                                            <h3 class="mb-4 h5">Kategori</h3>
                                            <!-- nav -->
                                            <div class="card">
                                                <ul class="nav nav-category">
                                                    @foreach ($kategori as $item)
                                                        <li class="nav-item border-bottom w-100 collapsed px-4 py-1">
                                                            <a href="{{ route('searchItem.kategori', $item->id) }}"
                                                                class="nav-link">
                                                                <span class="d-flex align-items-center">

                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                        height="20" fill="currentColor"
                                                                        class="bi bi-mortarboard" viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5ZM8 8.46 1.758 5.965 8 3.052l6.242 2.913L8 8.46Z" />
                                                                        <path
                                                                            d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Zm-.068 1.873.22-.748 3.496 1.311a.5.5 0 0 0 .352 0l3.496-1.311.22.748L8 12.46l-3.892-1.556Z" />
                                                                    </svg>
                                                                    <span class="ms-2">{{ $item->nm_kategori }}</span>
                                                                </span><i class="feather-icon icon-chevron-right"></i></a>
                                                        </li>
                                                    @endforeach
                                            </div>
                                        </div>


                                        <div class="card mb-6">
                                            <div class="card-body d-flex align-items-center">
                                                <div class="">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        fill="var(--fc-primary)" class="bi bi-phone" viewBox="0 0 16 16">
                                                        <path
                                                            d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z" />
                                                        <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                                    </svg>

                                                </div>
                                                <div class="ms-3">
                                                    <p class="mb-0 small">Download E-Kops di Handphone mu</p>
                                                </div>
                                            </div>
                                            <div class="card-body d-flex align-items-center border-top">
                                                <div class="">

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        fill="var(--fc-primary)" class="bi bi-reply" viewBox="0 0 16 16">
                                                        <path
                                                            d="M6.598 5.013a.144.144 0 0 1 .202.134V6.3a.5.5 0 0 0 .5.5c.667 0 2.013.005 3.3.822.984.624 1.99 1.76 2.595 3.876-1.02-.983-2.185-1.516-3.205-1.799a8.74 8.74 0 0 0-1.921-.306 7.404 7.404 0 0 0-.798.008h-.013l-.005.001h-.001L7.3 9.9l-.05-.498a.5.5 0 0 0-.45.498v1.153c0 .108-.11.176-.202.134L2.614 8.254a.503.503 0 0 0-.042-.028.147.147 0 0 1 0-.252.499.499 0 0 0 .042-.028l3.984-2.933zM7.8 10.386c.068 0 .143.003.223.006.434.02 1.034.086 1.7.271 1.326.368 2.896 1.202 3.94 3.08a.5.5 0 0 0 .933-.305c-.464-3.71-1.886-5.662-3.46-6.66-1.245-.79-2.527-.942-3.336-.971v-.66a1.144 1.144 0 0 0-1.767-.96l-3.994 2.94a1.147 1.147 0 0 0 0 1.946l3.994 2.94a1.144 1.144 0 0 0 1.767-.96v-.667z" />
                                                    </svg>

                                                </div>
                                                <div class="ms-3">
                                                    <p class="mb-0 small">Return Policy customers can return a
                                                        product and ask for a refund.</p>
                                                </div>
                                            </div>
                                            <div class="card-body d-flex align-items-center border-top">
                                                <div class="">

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        fill="var(--fc-primary)" class="bi bi-bag-check"
                                                        viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                        <path
                                                            d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                                    </svg>
                                                </div>
                                                <div class="ms-3">
                                                    <p class="mb-0 small">Order now so you don t miss the
                                                        opportunities.</p>
                                                </div>
                                            </div>
                                            <div class="card-body d-flex align-items-center border-top">
                                                <div class="">

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        fill="var(--fc-primary)" class="bi bi-clock-history"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z" />
                                                        <path
                                                            d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z" />
                                                        <path
                                                            d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z" />
                                                    </svg>
                                                </div>
                                                <div class="ms-3">
                                                    <p class="mb-0 small">Your order will arrive at your door in
                                                        15 minutes.</p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <div class="col-xl-9 col-lg-8 col-md-12 mb-6 mb-md-0">
                        <div class="mb-12 product-content">
                            <div class="mb-6">
                                <h3 class="mb-0">Paling Dicari</h3>
                            </div>
                            <div class="product-slider-four-column">
                                <!-- item -->
                                @foreach ($barang_most as $item)
                                    <div class="item">
                                        <!-- card -->
                                        <div class="card card-product mb-4">
                                            <div class="card-body text-center py-8">
                                                <!-- img -->
                                                <a href="{{ route('item-detail', $item->id) }}"><img
                                                        src="{{ asset('storage/barang/' . $item->foto) }}"
                                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                                                <!-- text -->
                                            </div>
                                        </div>
                                        <div>
                                            <span
                                                class="badge bg-danger rounded-pill">{{ $item->kategori->nm_kategori }}</span>
                                            <h2 class="mt-3 fs-6"> <a href="{{ route('item-detail', $item->id) }}"
                                                    class="text-inherit">{{ $item->nm_barang }}</a></h2>
                                            <span
                                                class="text-dark fs-5 fw-bold">{{ 'Rp ' . number_format($item->harga, 0, ',', '.') }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="row align-items-center mb-6">
                                        <div class="col-xl-10 col-lg-9 col-8">
                                            <div class="mb-4 mb-lg-0">
                                                <h3 class="mb-1">Produk Baru</h3>
                                                <p class="mb-0">Produk baru ditambahkan.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row row-cols-xl-4 row-cols-lg-3 g-4">
                                        <!-- item -->
                                        @foreach ($barang_latest as $item)
                                            <div class="col">
                                                <div class="mb-6">
                                                    <!-- card -->
                                                    <div class="card card-product mb-4">
                                                        <div class="card-body text-center py-8">
                                                            <!-- img -->
                                                            <a href="{{ route('item-detail', $item->id) }}"><img
                                                                    src="{{ asset('storage/barang/' . $item->foto) }}"
                                                                    alt="Grocery Ecommerce Template"
                                                                    class="mb-3 img-fluid"></a>
                                                            <!-- text -->
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <span
                                                            class="badge bg-danger rounded-pill">{{ $item->kategori->nm_kategori }}</span>
                                                        <h2 class="mt-3 fs-6"> <a
                                                                href="{{ route('item-detail', $item->id) }}"
                                                                class="text-inherit">{{ $item->nm_barang }}</a></h2>
                                                        <span
                                                            class="text-dark fs-5 fw-bold">{{ 'Rp ' . number_format($item->harga, 0, '.', '.') }}</span>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach


                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>
    </main>

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
                                    style="
                  background-image: url(assets/images/products/product-single-img-1.jpg);
                ">
                                    <!-- img -->
                                    <img src="assets/images/products/product-single-img-1.jpg" alt="">
                                </div>
                                <div>
                                    <div class="zoom" onmousemove="zoom(event)"
                                        style="
                    background-image: url(assets/images/products/product-single-img-2.jpg);
                  ">
                                        <!-- img -->
                                        <img src="assets/images/products/product-single-img-2.jpg" alt="">
                                    </div>
                                </div>
                                <div>
                                    <div class="zoom" onmousemove="zoom(event)"
                                        style="
                    background-image: url(assets/images/products/product-single-img-3.jpg);
                  ">
                                        <!-- img -->
                                        <img src="assets/images/products/product-single-img-3.jpg" alt="">
                                    </div>
                                </div>
                                <div>
                                    <div class="zoom" onmousemove="zoom(event)"
                                        style="
                    background-image: url(assets/images/products/product-single-img-4.jpg);
                  ">
                                        <!-- img -->
                                        <img src="assets/images/products/product-single-img-4.jpg" alt="">
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
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="thumbnails-img">
                                            <!-- img -->
                                            <img src="{{ asset('assets/images/products/product-single-img-2.jpg') }}"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="thumbnails-img">
                                            <!-- img -->
                                            <img src="{{ 'assets/images/products/product-single-img-3.jpg' }}"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="thumbnails-img">
                                            <!-- img -->
                                            <img src="{{ asset('assets/images/products/product-single-img-4.jpg') }}"
                                                alt="">
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
                                <hr class="my-6">
                                <div class="mb-4">
                                    <button type="button" class="btn btn-outline-secondary">
                                        250g
                                    </button>
                                    <button type="button" class="btn btn-outline-secondary">
                                        500g
                                    </button>
                                    <button type="button" class="btn btn-outline-secondary">
                                        1kg
                                    </button>
                                </div>
                                <div>
                                    <!-- input -->
                                    <!-- input -->
                                    <div class="input-group input-spinner  ">
                                        <input type="button" value="-" class="button-minus  btn  btn-sm "
                                            data-field="quantity">
                                        <input type="number" step="1" max="10" value="1"
                                            name="quantity" class="quantity-field form-control-sm form-input   ">
                                        <input type="button" value="+" class="button-plus btn btn-sm "
                                            data-field="quantity">
                                    </div>
                                </div>
                                <div class="mt-3 row justify-content-start g-2 align-items-center">

                                    <div class="col-lg-4 col-md-5 col-6 d-grid">
                                        <!-- button -->
                                        <!-- btn -->
                                        <button type="button" class="btn btn-primary">
                                            <i class="feather-icon icon-shopping-bag me-2"></i>Add to
                                            cart
                                        </button>
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
                                <hr class="my-6">
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
