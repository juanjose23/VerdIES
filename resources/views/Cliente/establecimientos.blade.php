@extends('cliente.layouts.master')

@section('title', 'Establecimiento')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{ asset('Cliente/assets/scss/home/home.css') }}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.css">

<!-- Estilos tienda -->
<link rel="stylesheet" href="{{ asset('Cliente/assets/scss/ecotienda/ecotienda.css') }}">
<link rel="stylesheet" href="{{ asset('Cliente/assets/vendor/libs/toastr/toastr.css') }}">
<link rel="stylesheet" href="{{ asset('Cliente/assets/vendor/libs/animate-css/animate.css') }}">





<div class="card mb-6">
    <div class="card-body">
        <!-- Popular product -->
        <section class="flat-spacing-5 pt_0">
            <div class="container">
                <div class="flat-animate-tab">
                    <div class="flat-title flat-title-tab flex-row justify-content-between px-0 swiper" data-preview="3" data-tablet="3" data-mobile="1" data-space-lg="30" data-space-md="15" data-pagination="1" data-pagination-md="3" data-pagination-lg="3">
                        <div class="app-brand custom-demo">
                            <a href="/clientes/promociones" class="layout-menu-toggle menu-link text-large ms-auto">
                                <i class="bx bx-chevron-left bx-sm d-flex align-items-center justify-content-center"></i>
                            </a>
                            <img src="" class="img-fluid" alt="">

                        </div>
                        <span class="title text-nowrap fw-6 wow fadeInUp" data-wow-delay="0s">{{ $usuario-> name }}</span>
                        <ul class="widget-tab-5" role="tablist">
                            <li class="nav-tab-item" role="presentation">
                                <a href="#meat" class="active" data-bs-toggle="tab">Todo</a>
                            </li>
                            <li class="nav-tab-item" role="presentation">
                                <a href="#oils" data-bs-toggle="tab">Comidas</a>
                            </li>
                            <li class="nav-tab-item" role="presentation">
                                <a href="#fruits" data-bs-toggle="tab">Bebidas</a>
                            </li>
                            <li class="nav-tab-item" role="presentation">
                                <a href="#tomatoes" data-bs-toggle="tab">Tomatoes</a>
                            </li>
                            <li class="nav-tab-item" role="presentation">
                                <a href="#soup" data-bs-toggle="tab">Soup</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active show" id="meat" role="tabpanel">

                            <!-- card product 1 -->

                            @livewire('ProductosAliados', ['idUsuario' => $usuario->id])
                        </div>
                    </div>
                    <div class="tab-pane" id="oils" role="tabpanel">
                        <div class="tf-grid-layout tf-col-2 lg-col-4">
                            <!-- card product 1 -->
                            <div class="card-product style-9">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="lazyload img-product" data-src="images/products/vegetable1.jpg" src="images/products/vegetable1.jpg" alt="image-product">
                                        <img class="lazyload img-hover" data-src="images/products/vegetable2.jpg" src="images/products/vegetable2.jpg" alt="image-product">
                                    </a>
                                    <div class="list-product-btn absolute-2">
                                        <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-product-info">
                                    <div class="inner-info">
                                        <a href="product-detail.html" class="title link fw-6">Ocado Little Gem Lettuce</a>
                                        <span class="price fw-6">$85.00</span>
                                    </div>
                                    <div class="list-product-btn">
                                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon quick-add tf-btn-loading">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Añadir al carrito</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <!-- card product 2 -->
                            <div class="card-product style-9">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="lazyload img-product" data-src="images/products/fruits.jpg" src="images/products/fruits.jpg" alt="image-product">
                                        <img class="lazyload img-hover" data-src="images/products/fruits2.jpg" src="images/products/fruits2.jpg" alt="image-product">
                                    </a>
                                    <div class="list-product-btn absolute-2">
                                        <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-product-info">
                                    <div class="inner-info">
                                        <a href="product-detail.html" class="title link fw-6">Ocado Red Seedless Grapes</a>
                                        <span class="price fw-6">$4.00</span>
                                    </div>
                                    <div class="list-product-btn">
                                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon quick-add tf-btn-loading">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Add to cart</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <!-- card product 3 -->
                            <div class="card-product style-9">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="lazyload img-product" data-src="images/products/meat1.jpg" src="images/products/meat1.jpg" alt="image-product">
                                        <img class="lazyload img-hover" data-src="images/products/meat2.jpg" src="images/products/meat2.jpg" alt="image-product">
                                    </a>
                                    <div class="list-product-btn absolute-2">
                                        <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-product-info">
                                    <div class="inner-info">
                                        <a href="product-detail.html" class="title link fw-6">Silere Merino Lamb Boneless Leg Joint</a>
                                        <span class="price fw-6">$13.00</span>
                                    </div>
                                    <div class="list-product-btn">
                                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon quick-add tf-btn-loading">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Add to cart</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <!-- card product 4 -->
                            <div class="card-product style-9">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="lazyload img-product" data-src="images/products/fruits3.jpg" src="images/products/fruits3.jpg" alt="image-product">
                                        <img class="lazyload img-hover" data-src="images/products/fruits4.jpg" src="images/products/fruits4.jpg" alt="image-product">
                                    </a>
                                    <div class="list-product-btn absolute-2">
                                        <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-product-info">
                                    <div class="inner-info">
                                        <a href="product-detail.html" class="title link fw-6">Ocado Little Gem Lettuce</a>
                                        <span class="price fw-6">$85.00</span>
                                    </div>
                                    <div class="list-product-btn">
                                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon quick-add tf-btn-loading">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Add to cart</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <!-- card product 5 -->
                            <div class="card-product style-9">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="lazyload img-product" data-src="images/products/fruits5.jpg" src="images/products/fruits5.jpg" alt="image-product">
                                        <img class="lazyload img-hover" data-src="images/products/fruits6.jpg" src="images/products/fruits6.jpg" alt="image-product">
                                    </a>
                                    <div class="list-product-btn absolute-2">
                                        <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-product-info">
                                    <div class="inner-info">
                                        <a href="product-detail.html" class="title link fw-6">M&S Full-Bodied Greek Kalamata Olives</a>
                                        <span class="price fw-6">$7.00</span>
                                    </div>
                                    <div class="list-product-btn">
                                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon quick-add tf-btn-loading">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Add to cart</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <!-- card product 6 -->
                            <div class="card-product style-9">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="lazyload img-product" data-src="images/products/milk.jpg" src="images/products/milk.jpg" alt="image-product">
                                        <img class="lazyload img-hover" data-src="images/products/milk2.jpg" src="images/products/milk2.jpg" alt="image-product">
                                    </a>
                                    <div class="list-product-btn absolute-2">
                                        <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-product-info">
                                    <div class="inner-info">
                                        <a href="product-detail.html" class="title link fw-6">The Collective Suckies Peach & Apricot Yoghurt</a>
                                        <span class="price fw-6">$75.00</span>
                                    </div>
                                    <div class="list-product-btn">
                                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon quick-add tf-btn-loading">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Add to cart</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <!-- card product 7 -->
                            <div class="card-product style-9">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="lazyload img-product" data-src="images/products/fish.jpg" src="images/products/fish.jpg" alt="image-product">
                                        <img class="lazyload img-hover" data-src="images/products/fish2.jpg" src="images/products/fish2.jpg" alt="image-product">
                                    </a>
                                    <div class="list-product-btn absolute-2">
                                        <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-product-info">
                                    <div class="inner-info">
                                        <a href="product-detail.html" class="title link fw-6">Fish Said Fred Sea Bass Fillets</a>
                                        <span class="price fw-6">$6.00</span>
                                    </div>
                                    <div class="list-product-btn">
                                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon quick-add tf-btn-loading">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Add to cart</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <!-- card product 8 -->
                            <div class="card-product style-9">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="lazyload img-product" data-src="images/products/vegetable3.jpg" src="images/products/vegetable3.jpg" alt="image-product">
                                        <img class="lazyload img-hover" data-src="images/products/vegetable4.jpg" src="images/products/vegetable4.jpg" alt="image-product">
                                    </a>
                                    <div class="list-product-btn absolute-2">
                                        <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-product-info">
                                    <div class="inner-info">
                                        <a href="product-detail.html" class="title link fw-6">Ocado British Broccoli</a>
                                        <span class="price fw-6">$72.00</span>
                                    </div>
                                    <div class="list-product-btn">
                                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon quick-add tf-btn-loading">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Add to cart</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="fruits" role="tabpanel">
                        <div class="tf-grid-layout tf-col-2 lg-col-4">
                            <!-- card product 1 -->
                            <div class="card-product style-9">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="lazyload img-product" data-src="images/products/vegetable1.jpg" src="images/products/vegetable1.jpg" alt="image-product">
                                        <img class="lazyload img-hover" data-src="images/products/vegetable2.jpg" src="images/products/vegetable2.jpg" alt="image-product">
                                    </a>
                                    <div class="list-product-btn absolute-2">
                                        <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-product-info">
                                    <div class="inner-info">
                                        <a href="product-detail.html" class="title link fw-6">Ocado Little Gem Lettuce</a>
                                        <span class="price fw-6">$85.00</span>
                                    </div>
                                    <div class="list-product-btn">
                                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon quick-add tf-btn-loading">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Add to cart</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <!-- card product 2 -->
                            <div class="card-product style-9">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="lazyload img-product" data-src="images/products/fruits.jpg" src="images/products/fruits.jpg" alt="image-product">
                                        <img class="lazyload img-hover" data-src="images/products/fruits2.jpg" src="images/products/fruits2.jpg" alt="image-product">
                                    </a>
                                    <div class="list-product-btn absolute-2">
                                        <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-product-info">
                                    <div class="inner-info">
                                        <a href="product-detail.html" class="title link fw-6">Ocado Red Seedless Grapes</a>
                                        <span class="price fw-6">$4.00</span>
                                    </div>
                                    <div class="list-product-btn">
                                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon quick-add tf-btn-loading">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Add to cart</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <!-- card product 3 -->
                            <div class="card-product style-9">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="lazyload img-product" data-src="images/products/meat1.jpg" src="images/products/meat1.jpg" alt="image-product">
                                        <img class="lazyload img-hover" data-src="images/products/meat2.jpg" src="images/products/meat2.jpg" alt="image-product">
                                    </a>
                                    <div class="list-product-btn absolute-2">
                                        <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-product-info">
                                    <div class="inner-info">
                                        <a href="product-detail.html" class="title link fw-6">Silere Merino Lamb Boneless Leg Joint</a>
                                        <span class="price fw-6">$13.00</span>
                                    </div>
                                    <div class="list-product-btn">
                                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon quick-add tf-btn-loading">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Add to cart</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <!-- card product 4 -->
                            <div class="card-product style-9">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="lazyload img-product" data-src="images/products/fruits3.jpg" src="images/products/fruits3.jpg" alt="image-product">
                                        <img class="lazyload img-hover" data-src="images/products/fruits4.jpg" src="images/products/fruits4.jpg" alt="image-product">
                                    </a>
                                    <div class="list-product-btn absolute-2">
                                        <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-product-info">
                                    <div class="inner-info">
                                        <a href="product-detail.html" class="title link fw-6">Ocado Little Gem Lettuce</a>
                                        <span class="price fw-6">$85.00</span>
                                    </div>
                                    <div class="list-product-btn">
                                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon quick-add tf-btn-loading">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Add to cart</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <!-- card product 5 -->
                            <div class="card-product style-9">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="lazyload img-product" data-src="images/products/fruits5.jpg" src="images/products/fruits5.jpg" alt="image-product">
                                        <img class="lazyload img-hover" data-src="images/products/fruits6.jpg" src="images/products/fruits6.jpg" alt="image-product">
                                    </a>
                                    <div class="list-product-btn absolute-2">
                                        <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-product-info">
                                    <div class="inner-info">
                                        <a href="product-detail.html" class="title link fw-6">M&S Full-Bodied Greek Kalamata Olives</a>
                                        <span class="price fw-6">$7.00</span>
                                    </div>
                                    <div class="list-product-btn">
                                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon quick-add tf-btn-loading">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Add to cart</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <!-- card product 6 -->
                            <div class="card-product style-9">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="lazyload img-product" data-src="images/products/milk.jpg" src="images/products/milk.jpg" alt="image-product">
                                        <img class="lazyload img-hover" data-src="images/products/milk2.jpg" src="images/products/milk2.jpg" alt="image-product">
                                    </a>
                                    <div class="list-product-btn absolute-2">
                                        <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-product-info">
                                    <div class="inner-info">
                                        <a href="product-detail.html" class="title link fw-6">The Collective Suckies Peach & Apricot Yoghurt</a>
                                        <span class="price fw-6">$75.00</span>
                                    </div>
                                    <div class="list-product-btn">
                                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon quick-add tf-btn-loading">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Add to cart</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <!-- card product 7 -->
                            <div class="card-product style-9">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="lazyload img-product" data-src="images/products/fish.jpg" src="images/products/fish.jpg" alt="image-product">
                                        <img class="lazyload img-hover" data-src="images/products/fish2.jpg" src="images/products/fish2.jpg" alt="image-product">
                                    </a>
                                    <div class="list-product-btn absolute-2">
                                        <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-product-info">
                                    <div class="inner-info">
                                        <a href="product-detail.html" class="title link fw-6">Fish Said Fred Sea Bass Fillets</a>
                                        <span class="price fw-6">$6.00</span>
                                    </div>
                                    <div class="list-product-btn">
                                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon quick-add tf-btn-loading">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Add to cart</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <!-- card product 8 -->
                            <div class="card-product style-9">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="lazyload img-product" data-src="images/products/vegetable3.jpg" src="images/products/vegetable3.jpg" alt="image-product">
                                        <img class="lazyload img-hover" data-src="images/products/vegetable4.jpg" src="images/products/vegetable4.jpg" alt="image-product">
                                    </a>
                                    <div class="list-product-btn absolute-2">
                                        <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-product-info">
                                    <div class="inner-info">
                                        <a href="product-detail.html" class="title link fw-6">Ocado British Broccoli</a>
                                        <span class="price fw-6">$72.00</span>
                                    </div>
                                    <div class="list-product-btn">
                                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon quick-add tf-btn-loading">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Add to cart</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tomatoes" role="tabpanel">
                        <div class="tf-grid-layout tf-col-2 lg-col-4">
                            <!-- card product 1 -->
                            <div class="card-product style-9">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="lazyload img-product" data-src="images/products/vegetable1.jpg" src="images/products/vegetable1.jpg" alt="image-product">
                                        <img class="lazyload img-hover" data-src="images/products/vegetable2.jpg" src="images/products/vegetable2.jpg" alt="image-product">
                                    </a>
                                    <div class="list-product-btn absolute-2">
                                        <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-product-info">
                                    <div class="inner-info">
                                        <a href="product-detail.html" class="title link fw-6">Ocado Little Gem Lettuce</a>
                                        <span class="price fw-6">$85.00</span>
                                    </div>
                                    <div class="list-product-btn">
                                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon quick-add tf-btn-loading">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Add to cart</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <!-- card product 2 -->
                            <div class="card-product style-9">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="lazyload img-product" data-src="images/products/fruits.jpg" src="images/products/fruits.jpg" alt="image-product">
                                        <img class="lazyload img-hover" data-src="images/products/fruits2.jpg" src="images/products/fruits2.jpg" alt="image-product">
                                    </a>
                                    <div class="list-product-btn absolute-2">
                                        <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-product-info">
                                    <div class="inner-info">
                                        <a href="product-detail.html" class="title link fw-6">Ocado Red Seedless Grapes</a>
                                        <span class="price fw-6">$4.00</span>
                                    </div>
                                    <div class="list-product-btn">
                                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon quick-add tf-btn-loading">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Add to cart</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <!-- card product 3 -->
                            <div class="card-product style-9">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="lazyload img-product" data-src="images/products/meat1.jpg" src="images/products/meat1.jpg" alt="image-product">
                                        <img class="lazyload img-hover" data-src="images/products/meat2.jpg" src="images/products/meat2.jpg" alt="image-product">
                                    </a>
                                    <div class="list-product-btn absolute-2">
                                        <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-product-info">
                                    <div class="inner-info">
                                        <a href="product-detail.html" class="title link fw-6">Silere Merino Lamb Boneless Leg Joint</a>
                                        <span class="price fw-6">$13.00</span>
                                    </div>
                                    <div class="list-product-btn">
                                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon quick-add tf-btn-loading">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Add to cart</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <!-- card product 4 -->
                            <div class="card-product style-9">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="lazyload img-product" data-src="images/products/fruits3.jpg" src="images/products/fruits3.jpg" alt="image-product">
                                        <img class="lazyload img-hover" data-src="images/products/fruits4.jpg" src="images/products/fruits4.jpg" alt="image-product">
                                    </a>
                                    <div class="list-product-btn absolute-2">
                                        <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-product-info">
                                    <div class="inner-info">
                                        <a href="product-detail.html" class="title link fw-6">Ocado Little Gem Lettuce</a>
                                        <span class="price fw-6">$85.00</span>
                                    </div>
                                    <div class="list-product-btn">
                                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon quick-add tf-btn-loading">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Add to cart</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <!-- card product 5 -->
                            <div class="card-product style-9">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="lazyload img-product" data-src="images/products/fruits5.jpg" src="images/products/fruits5.jpg" alt="image-product">
                                        <img class="lazyload img-hover" data-src="images/products/fruits6.jpg" src="images/products/fruits6.jpg" alt="image-product">
                                    </a>
                                    <div class="list-product-btn absolute-2">
                                        <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-product-info">
                                    <div class="inner-info">
                                        <a href="product-detail.html" class="title link fw-6">M&S Full-Bodied Greek Kalamata Olives</a>
                                        <span class="price fw-6">$7.00</span>
                                    </div>
                                    <div class="list-product-btn">
                                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon quick-add tf-btn-loading">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Add to cart</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <!-- card product 6 -->
                            <div class="card-product style-9">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="lazyload img-product" data-src="images/products/milk.jpg" src="images/products/milk.jpg" alt="image-product">
                                        <img class="lazyload img-hover" data-src="images/products/milk2.jpg" src="images/products/milk2.jpg" alt="image-product">
                                    </a>
                                    <div class="list-product-btn absolute-2">
                                        <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-product-info">
                                    <div class="inner-info">
                                        <a href="product-detail.html" class="title link fw-6">The Collective Suckies Peach & Apricot Yoghurt</a>
                                        <span class="price fw-6">$75.00</span>
                                    </div>
                                    <div class="list-product-btn">
                                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon quick-add tf-btn-loading">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Add to cart</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <!-- card product 7 -->
                            <div class="card-product style-9">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="lazyload img-product" data-src="images/products/fish.jpg" src="images/products/fish.jpg" alt="image-product">
                                        <img class="lazyload img-hover" data-src="images/products/fish2.jpg" src="images/products/fish2.jpg" alt="image-product">
                                    </a>
                                    <div class="list-product-btn absolute-2">
                                        <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-product-info">
                                    <div class="inner-info">
                                        <a href="product-detail.html" class="title link fw-6">Fish Said Fred Sea Bass Fillets</a>
                                        <span class="price fw-6">$6.00</span>
                                    </div>
                                    <div class="list-product-btn">
                                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon quick-add tf-btn-loading">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Add to cart</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <!-- card product 8 -->
                            <div class="card-product style-9">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="lazyload img-product" data-src="images/products/vegetable3.jpg" src="images/products/vegetable3.jpg" alt="image-product">
                                        <img class="lazyload img-hover" data-src="images/products/vegetable4.jpg" src="images/products/vegetable4.jpg" alt="image-product">
                                    </a>
                                    <div class="list-product-btn absolute-2">
                                        <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-product-info">
                                    <div class="inner-info">
                                        <a href="product-detail.html" class="title link fw-6">Ocado British Broccoli</a>
                                        <span class="price fw-6">$72.00</span>
                                    </div>
                                    <div class="list-product-btn">
                                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon quick-add tf-btn-loading">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Add to cart</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="soup" role="tabpanel">
                        <div class="tf-grid-layout tf-col-2 lg-col-4">
                            <!-- card product 1 -->
                            <div class="card-product style-9">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="lazyload img-product" data-src="images/products/vegetable1.jpg" src="images/products/vegetable1.jpg" alt="image-product">
                                        <img class="lazyload img-hover" data-src="images/products/vegetable2.jpg" src="images/products/vegetable2.jpg" alt="image-product">
                                    </a>
                                    <div class="list-product-btn absolute-2">
                                        <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-product-info">
                                    <div class="inner-info">
                                        <a href="product-detail.html" class="title link fw-6">Ocado Little Gem Lettuce</a>
                                        <span class="price fw-6">$85.00</span>
                                    </div>
                                    <div class="list-product-btn">
                                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon quick-add tf-btn-loading">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Add to cart</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <!-- card product 2 -->
                            <div class="card-product style-9">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="lazyload img-product" data-src="images/products/fruits.jpg" src="images/products/fruits.jpg" alt="image-product">
                                        <img class="lazyload img-hover" data-src="images/products/fruits2.jpg" src="images/products/fruits2.jpg" alt="image-product">
                                    </a>
                                    <div class="list-product-btn absolute-2">
                                        <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-product-info">
                                    <div class="inner-info">
                                        <a href="product-detail.html" class="title link fw-6">Ocado Red Seedless Grapes</a>
                                        <span class="price fw-6">$4.00</span>
                                    </div>
                                    <div class="list-product-btn">
                                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon quick-add tf-btn-loading">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Add to cart</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <!-- card product 3 -->
                            <div class="card-product style-9">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="lazyload img-product" data-src="images/products/meat1.jpg" src="images/products/meat1.jpg" alt="image-product">
                                        <img class="lazyload img-hover" data-src="images/products/meat2.jpg" src="images/products/meat2.jpg" alt="image-product">
                                    </a>
                                    <div class="list-product-btn absolute-2">
                                        <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-product-info">
                                    <div class="inner-info">
                                        <a href="product-detail.html" class="title link fw-6">Silere Merino Lamb Boneless Leg Joint</a>
                                        <span class="price fw-6">$13.00</span>
                                    </div>
                                    <div class="list-product-btn">
                                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon quick-add tf-btn-loading">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Add to cart</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <!-- card product 4 -->
                            <div class="card-product style-9">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="lazyload img-product" data-src="images/products/fruits3.jpg" src="images/products/fruits3.jpg" alt="image-product">
                                        <img class="lazyload img-hover" data-src="images/products/fruits4.jpg" src="images/products/fruits4.jpg" alt="image-product">
                                    </a>
                                    <div class="list-product-btn absolute-2">
                                        <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-product-info">
                                    <div class="inner-info">
                                        <a href="product-detail.html" class="title link fw-6">Ocado Little Gem Lettuce</a>
                                        <span class="price fw-6">$85.00</span>
                                    </div>
                                    <div class="list-product-btn">
                                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon quick-add tf-btn-loading">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Add to cart</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <!-- card product 5 -->
                            <div class="card-product style-9">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="lazyload img-product" data-src="images/products/fruits5.jpg" src="images/products/fruits5.jpg" alt="image-product">
                                        <img class="lazyload img-hover" data-src="images/products/fruits6.jpg" src="images/products/fruits6.jpg" alt="image-product">
                                    </a>
                                    <div class="list-product-btn absolute-2">
                                        <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-product-info">
                                    <div class="inner-info">
                                        <a href="product-detail.html" class="title link fw-6">M&S Full-Bodied Greek Kalamata Olives</a>
                                        <span class="price fw-6">$7.00</span>
                                    </div>
                                    <div class="list-product-btn">
                                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon quick-add tf-btn-loading">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Add to cart</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <!-- card product 6 -->
                            <div class="card-product style-9">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="lazyload img-product" data-src="images/products/milk.jpg" src="images/products/milk.jpg" alt="image-product">
                                        <img class="lazyload img-hover" data-src="images/products/milk2.jpg" src="images/products/milk2.jpg" alt="image-product">
                                    </a>
                                    <div class="list-product-btn absolute-2">
                                        <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-product-info">
                                    <div class="inner-info">
                                        <a href="product-detail.html" class="title link fw-6">The Collective Suckies Peach & Apricot Yoghurt</a>
                                        <span class="price fw-6">$75.00</span>
                                    </div>
                                    <div class="list-product-btn">
                                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon quick-add tf-btn-loading">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Add to cart</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <!-- card product 7 -->
                            <div class="card-product style-9">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="lazyload img-product" data-src="images/products/fish.jpg" src="images/products/fish.jpg" alt="image-product">
                                        <img class="lazyload img-hover" data-src="images/products/fish2.jpg" src="images/products/fish2.jpg" alt="image-product">
                                    </a>
                                    <div class="list-product-btn absolute-2">
                                        <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-product-info">
                                    <div class="inner-info">
                                        <a href="product-detail.html" class="title link fw-6">Fish Said Fred Sea Bass Fillets</a>
                                        <span class="price fw-6">$6.00</span>
                                    </div>
                                    <div class="list-product-btn">
                                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon quick-add tf-btn-loading">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Add to cart</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <!-- card product 8 -->
                            <div class="card-product style-9">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="lazyload img-product" data-src="images/products/vegetable3.jpg" src="images/products/vegetable3.jpg" alt="image-product">
                                        <img class="lazyload img-hover" data-src="images/products/vegetable4.jpg" src="images/products/vegetable4.jpg" alt="image-product">
                                    </a>
                                    <div class="list-product-btn absolute-2">
                                        <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-product-info">
                                    <div class="inner-info">
                                        <a href="product-detail.html" class="title link fw-6">Ocado British Broccoli</a>
                                        <span class="price fw-6">$72.00</span>
                                    </div>
                                    <div class="list-product-btn">
                                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon quick-add tf-btn-loading">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Add to cart</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>
    </section>
    <!-- /Popular product -->
</div>
</div>
<!-- / Content -->





<!-- shoppingCart -->
<div class="modal fullRight fade modal-shopping-cart" id="shoppingCart">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="header_cart">
                <div class="title fw-5">Carrito</div>
                <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
            </div>
            <div class="wrap">

                <div class="tf-mini-cart-wrap">
                    <div class="tf-mini-cart-main">
                        <div class="tf-mini-cart-sroll">
                            <div class="tf-mini-cart-items">
                                <div class="tf-mini-cart-item">
                                    <div class="tf-mini-cart-image">
                                        <a href="product-detail.html">
                                            <img src="images/products/white-2.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="tf-mini-cart-info">
                                        <a class="title link" href="product-detail.html">Gallo pinto</a>
                                        <div class="meta-variant">Light gray</div>
                                        <div class="price fw-6">$25.00</div>
                                        <div class="tf-mini-cart-btns">
                                            <div class="wg-quantity small">
                                                <span class="btn-quantity minus-btn">-</span>
                                                <input type="text" name="number" value="1" disabled>
                                                <span class="btn-quantity plus-btn">+</span>
                                            </div>
                                            <div class="tf-mini-cart-remove">Eliminar</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-mini-cart-item">
                                    <div class="tf-mini-cart-image">
                                        <a href="product-detail.html">
                                            <img src="images/products/white-3.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="tf-mini-cart-info">
                                        <a class="title link" href="product-detail.html">Fresco de calala</a>
                                        <div class="price fw-6">$25.00</div>
                                        <div class="tf-mini-cart-btns">
                                            <div class="wg-quantity small">
                                                <span class="btn-quantity minus-btn">-</span>
                                                <input type="text" name="number" value="1">
                                                <span class="btn-quantity plus-btn">+</span>
                                            </div>
                                            <div class="tf-mini-cart-remove">Eliminar</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tf-mini-cart-bottom">
                        <div class="tf-mini-cart-bottom-wrap">
                            <div class="tf-cart-totals-discounts">
                                <div class="tf-cart-total">Subtotal</div>
                                <div class="tf-totals-total-value fw-6">$49.99 USD</div>
                            </div>
                            <div class="tf-cart-tax">Revisa los <a href="#">términos de pago</a></div>
                            <div class="tf-mini-cart-line"></div>
                            <div class="tf-mini-cart-view-checkout">
                                <a href="checkout.html" class="tf-btn btn-fill animate-hover-btn radius-3 w-100 justify-content-center"><span>Pagar</span></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- /shoppingCart -->

<!-- modal compare -->
<div class="offcanvas offcanvas-bottom canvas-compare" id="compare">
    <div class="canvas-wrapper">
        <header class="canvas-header">
            <div class="close-popup">
                <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
            </div>
        </header>
        <div class="canvas-body">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="tf-compare-list">
                            <div class="tf-compare-head">
                                <div class="title">Compare Products</div>
                            </div>
                            <div class="tf-compare-offcanvas">
                                <div class="tf-compare-item">
                                    <div class="position-relative">
                                        <div class="icon">
                                            <i class="icon-close"></i>
                                        </div>
                                        <a href="product-detail.html">
                                            <img class="radius-3" src="images/products/orange-1.jpg" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="tf-compare-item">
                                    <div class="position-relative">
                                        <div class="icon">
                                            <i class="icon-close"></i>
                                        </div>
                                        <a href="product-detail.html">
                                            <img class="radius-3" src="images/products/pink-1.jpg" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="tf-compare-buttons">
                                <div class="tf-compare-buttons-wrap">
                                    <a href="compare.html" class="tf-btn radius-3 btn-fill justify-content-center fw-6 fs-14 flex-grow-1 animate-hover-btn ">Compare</a>
                                    <div class="tf-compapre-button-clear-all link">
                                        Clear All
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /modal compare -->

<!-- modal quick_add -->
<div class="modal fade modalDemo" id="quick_add">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="header">
                <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
            </div>
            <div class="wrap">
                <div class="tf-product-info-item">
                    <div class="image">
                        <img id="imgProduct" src="images/products/orange-1.jpg" alt="">
                    </div>
                    <div class="content">
                        <a href="product-detail.html">Ribbed Tank Top</a>
                        <div class="tf-product-info-price">
                            <!-- <div class="price-on-sale">$8.00</div>
                                <div class="compare-at-price">$10.00</div>
                                <div class="badges-on-sale"><span>20</span>% OFF</div> -->
                            <div class="price">$18.00</div>
                        </div>
                    </div>
                </div>
                <div class="tf-product-info-variant-picker mb_15">
                    <div class="tf-product-description">
                        <p id="productDescription"></p>
                    </div>
                </div>
                <div class="tf-product-info-quantity mb_15">
                    <div class="quantity-title fw-6">Cantidad</div>
                    <div class="wg-quantity">
                        <span id="minusBtn" class="btn-quantity minus-btn">-</span>
                        <input id="quantityInput" type="text" name="number" value="1" disabled>
                        <span id="plusBtn" class="btn-quantity plus-btn">+</span>
                    </div>
                </div>
                <div class="tf-product-info-quantity mb_15">
                    <div class="quantity-title fw-6">Cantidad disponible</div>
                    <p id="quantityAvailable"></p>
                </div>
                <div class="tf-product-info-variant-picker mb_15">
                    <div class="tf-product-description">
                        <p id="yourExactlyCoin">Tu cantidad de VerdCoins: 80 </p>
                    </div>
                </div>
                <div class="tf-product-info-buy-button">
                    <form class="">
                        <a id="addToCart" href="javascript:void(0);" class="tf-btn btn-fill justify-content-center fw-6 fs-16 flex-grow-1 animate-hover-btn btn-add-to-cart"><span>Añadir al carrito -&nbsp;</span><span id="spanPriceCart" class="tf-qty-price">$18.00</span></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /modal quick_add -->

<!-- modal quick_view -->
<div class="modal fade modalDemo" id="quick_view">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="header">
                <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
            </div>
            <div class="wrap">
                <div class="tf-product-media-wrap">
                    <div dir="ltr" class="swiper tf-single-slide">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="item">
                                    <img src="images/products/orange-1.jpg" alt="">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="item">
                                    <img src="images/products/pink-1.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="swiper-button-next button-style-arrow single-slide-prev"></div>
                        <div class="swiper-button-prev button-style-arrow single-slide-next"></div>
                    </div>
                </div>
                <div class="tf-product-info-wrap position-relative">
                    <div class="tf-product-info-list">
                        <div class="tf-product-info-title">
                            <h5><a class="link" href="product-detail.html">Ribbed Tank Top</a></h5>
                        </div>
                        <div class="tf-product-info-badges">
                            <div class="badges text-uppercase">Best seller</div>
                            <div class="product-status-content">
                                <i class="icon-lightning"></i>
                                <p class="fw-6">Selling fast! 48 people have this in their carts.</p>
                            </div>
                        </div>
                        <div class="tf-product-info-price">
                            <div class="price">$18.00</div>
                        </div>
                        <div class="tf-product-description">
                            <p>Nunc arcu faucibus a et lorem eu a mauris adipiscing conubia ac aptent ligula facilisis a auctor habitant parturient a a.Interdum fermentum.</p>
                        </div>
                        <div class="tf-product-info-variant-picker">
                            <div class="variant-picker-item">
                                <div class="variant-picker-label">
                                    Color: <span class="fw-6 variant-picker-label-value">Orange</span>
                                </div>
                                <div class="variant-picker-values">
                                    <input id="values-orange-1" type="radio" name="color-1" checked>
                                    <label class="hover-tooltip radius-60" for="values-orange-1" data-value="Orange">
                                        <span class="btn-checkbox bg-color-orange"></span>
                                        <span class="tooltip">Orange</span>
                                    </label>
                                    <input id="values-black-1" type="radio" name="color-1">
                                    <label class=" hover-tooltip radius-60" for="values-black-1" data-value="Black">
                                        <span class="btn-checkbox bg-color-black"></span>
                                        <span class="tooltip">Black</span>
                                    </label>
                                    <input id="values-white-1" type="radio" name="color-1">
                                    <label class="hover-tooltip radius-60" for="values-white-1" data-value="White">
                                        <span class="btn-checkbox bg-color-white"></span>
                                        <span class="tooltip">White</span>
                                    </label>
                                </div>
                            </div>
                            <div class="variant-picker-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="variant-picker-label">
                                        Size: <span class="fw-6 variant-picker-label-value">S</span>
                                    </div>
                                    <div class="find-size btn-choose-size fw-6">Find your size</div>
                                </div>
                                <div class="variant-picker-values">
                                    <input type="radio" name="size-1" id="values-s-1" checked>
                                    <label class="style-text" for="values-s-1" data-value="S">
                                        <p>S</p>
                                    </label>
                                    <input type="radio" name="size-1" id="values-m-1">
                                    <label class="style-text" for="values-m-1" data-value="M">
                                        <p>M</p>
                                    </label>
                                    <input type="radio" name="size-1" id="values-l-1">
                                    <label class="style-text" for="values-l-1" data-value="L">
                                        <p>L</p>
                                    </label>
                                    <input type="radio" name="size-1" id="values-xl-1">
                                    <label class="style-text" for="values-xl-1" data-value="XL">
                                        <p>XL</p>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="tf-product-info-quantity">
                            <div class="quantity-title fw-6">Cantidad</div>
                            <div class="wg-quantity">
                                <span class="btn-quantity minus-btn">-</span>
                                <input type="text" name="number" value="1">
                                <span class="btn-quantity plus-btn">+</span>
                            </div>
                        </div>
                        <div class="tf-product-info-buy-button">
                            <form class="">
                                <a href="javascript:void(0);" class="tf-btn btn-fill justify-content-center fw-6 fs-16 flex-grow-1 animate-hover-btn btn-add-to-cart"><span>Añadir al carrito -&nbsp;</span><span class="tf-qty-price">$8.00</span></a>
                                <a href="javascript:void(0);" class="tf-product-btn-wishlist hover-tooltip box-icon bg_white wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Add to Wishlist</span>
                                    <span class="icon icon-delete"></span>
                                </a>
                                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="tf-product-btn-wishlist hover-tooltip box-icon bg_white compare btn-icon-action">
                                    <span class="icon icon-compare"></span>
                                    <span class="tooltip">Add to Compare</span>
                                    <span class="icon icon-check"></span>
                                </a>
                                <div class="w-100">
                                    <a href="#" class="btns-full">Buy with <img src="images/payments/paypal.png" alt=""></a>
                                    <a href="#" class="payment-more-option">More payment options</a>
                                </div>
                            </form>
                        </div>
                        <div>
                            <a href="product-detail.html" class="tf-btn fw-6 btn-line">View full details<i class="icon icon-arrow1-top-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /modal quick_view -->

<!-- modal find_size -->
<div class="modal fade modalDemo tf-product-modal" id="find_size">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="header">
                <div class="demo-title">Size chart</div>
                <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
            </div>
            <div class="tf-rte">
                <div class="tf-table-res-df">
                    <h6>Size guide</h6>
                    <table class="tf-sizeguide-table">
                        <thead>
                            <tr>
                                <th>Size</th>
                                <th>US</th>
                                <th>Bust</th>
                                <th>Waist</th>
                                <th>Low Hip</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>XS</td>
                                <td>2</td>
                                <td>32</td>
                                <td>24 - 25</td>
                                <td>33 - 34</td>
                            </tr>
                            <tr>
                                <td>S</td>
                                <td>4</td>
                                <td>34 - 35</td>
                                <td>26 - 27</td>
                                <td>35 - 26</td>
                            </tr>
                            <tr>
                                <td>M</td>
                                <td>6</td>
                                <td>36 - 37</td>
                                <td>28 - 29</td>
                                <td>38 - 40</td>
                            </tr>
                            <tr>
                                <td>L</td>
                                <td>8</td>
                                <td>38 - 29</td>
                                <td>30 - 31</td>
                                <td>42 - 44</td>
                            </tr>
                            <tr>
                                <td>XL</td>
                                <td>10</td>
                                <td>40 - 41</td>
                                <td>32 - 33</td>
                                <td>45 - 47</td>
                            </tr>
                            <tr>
                                <td>XXL</td>
                                <td>12</td>
                                <td>42 - 43</td>
                                <td>34 - 35</td>
                                <td>48 - 50</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tf-page-size-chart-content">
                    <div>
                        <h6>Measuring Tips</h6>
                        <div class="title">Bust</div>
                        <p>Measure around the fullest part of your bust.</p>
                        <div class="title">Waist</div>
                        <p>Measure around the narrowest part of your torso.</p>
                        <div class="title">Low Hip</div>
                        <p class="mb-0">With your feet together measure around the fullest part of your hips/rear.
                        </p>
                    </div>
                    <div>
                        <img class="sizechart lazyload" data-src="images/shop/products/size_chart2.jpg" src="images/shop/products/size_chart2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /modal find_size -->


<!-- Modal de advertencia -->
<div class="modal fade" id="exitModal" tabindex="-1" aria-labelledby="exitModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exitModalLabel">Advertencia</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Solamente se pueden tener en el carrito compras productos de un negocio por sesión. ¿Estás seguro de que deseas salir y limpiar el carrito?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Mantenerse en la página</button>
                <button type="button" id="confirmExit" class="btn btn-danger">Salir y limpiar</button>
            </div>
        </div>
    </div>
</div>




<script type="text/javascript" src="{{ asset('Cliente/assets/js/ecotienda/validator-localstorage-before-request.js') }}"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/js/swiper.min.js"></script>

<script src="{{ asset('Cliente/assets/js/home/index.js') }}"></script>
<script src="{{ asset('Cliente/assets/vendor/libs/moment/moment.js') }}"></script>
<script src="{{ asset('Cliente/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
<!-- Page JS -->
<script src="{{ asset('Cliente/assets/js/app-academy-dashboard.js') }}"></script>

<!-- CUSTOM JS -->
<!-- Javascript -->

<script type="text/javascript" src="js/swiper-bundle.min.js"></script>
<script type="text/javascript" src="js/carousel.js"></script>
<script type="text/javascript" src="js/lazysize.min.js"></script>
<script type="text/javascript" src="js/count-down.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>
<script type="text/javascript" src="{{ asset('Cliente/assets/js/ecotienda/multiple-modal.js') }}"></script>
<script type="text/javascript" src="{{ asset('Cliente/assets/js/ecotienda/main.js') }}"></script>
<script src="{{ asset('Cliente/assets/js/ui-toasts.js') }}"></script>



@endsection