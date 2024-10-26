@extends('cliente.layouts.master')

@section('title', 'Establecimiento')



@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{ asset('Cliente/assets/scss/home/home.css') }}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.css">

<!-- Estilos tienda -->
<link rel="stylesheet" href="{{ asset('Cliente/assets/scss/ecotienda/ecotienda.css') }}">
<link rel="stylesheet" href="{{ asset('Cliente/vendor/libs/toastr/toastr.css') }}">
<link rel="stylesheet" href="{{ asset('Cliente/vendor/libs/animate-css/animate.css') }}">



<div class="card mb-6">
    <div class="card-body">
        <!-- Popular product -->
        <section class="flat-spacing-5 pt_0">
            <div class="container">
                <div class="flat-animate-tab">
                    <div class="flat-title flat-title-tab flex-row justify-content-between px-0 swiper" data-preview="3" data-tablet="3" data-mobile="1" data-space-lg="30" data-space-md="15" data-pagination="1" data-pagination-md="3" data-pagination-lg="3">
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


<div class="toolbar-item">
    <a href="#shoppingCart" data-bs-toggle="modal">
        <div class="toolbar-icon">
            <i class="icon-bag"></i>
            <div class="toolbar-count">1</div>
        </div>
        <div class="toolbar-label">Cart</div>
    </a>
</div>


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
                                                <input type="text" name="number" value="1">
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
                    <div class="tf-mini-cart-tool-openable add-note">
                        <div class="overplay tf-mini-cart-tool-close"></div>
                        <div class="tf-mini-cart-tool-content">
                            <label for="Cart-note" class="tf-mini-cart-tool-text">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" viewBox="0 0 16 18" fill="currentColor">
                                        <path d="M5.12187 16.4582H2.78952C2.02045 16.4582 1.39476 15.8325 1.39476 15.0634V2.78952C1.39476 2.02045 2.02045 1.39476 2.78952 1.39476H11.3634C12.1325 1.39476 12.7582 2.02045 12.7582 2.78952V7.07841C12.7582 7.46357 13.0704 7.77579 13.4556 7.77579C13.8407 7.77579 14.1529 7.46357 14.1529 7.07841V2.78952C14.1529 1.25138 12.9016 0 11.3634 0H2.78952C1.25138 0 0 1.25138 0 2.78952V15.0634C0 16.6015 1.25138 17.8529 2.78952 17.8529H5.12187C5.50703 17.8529 5.81925 17.5407 5.81925 17.1555C5.81925 16.7704 5.50703 16.4582 5.12187 16.4582Z"></path>
                                        <path d="M15.3882 10.0971C14.5724 9.28136 13.2452 9.28132 12.43 10.0965L8.60127 13.9168C8.51997 13.9979 8.45997 14.0979 8.42658 14.2078L7.59276 16.9528C7.55646 17.0723 7.55292 17.1993 7.58249 17.3207C7.61206 17.442 7.67367 17.5531 7.76087 17.6425C7.84807 17.7319 7.95768 17.7962 8.07823 17.8288C8.19879 17.8613 8.32587 17.8609 8.44621 17.8276L11.261 17.0479C11.3769 17.0158 11.4824 16.9543 11.5675 16.8694L15.3882 13.0559C16.2039 12.2401 16.2039 10.9129 15.3882 10.0971ZM10.712 15.7527L9.29586 16.145L9.71028 14.7806L12.2937 12.2029L13.2801 13.1893L10.712 15.7527ZM14.4025 12.0692L14.2673 12.204L13.2811 11.2178L13.4157 11.0834C13.6876 10.8115 14.1301 10.8115 14.402 11.0834C14.6739 11.3553 14.6739 11.7977 14.4025 12.0692Z"></path>
                                    </svg>
                                </div>
                                <span>Add Order Note</span>
                            </label>
                            <textarea name="note" id="Cart-note" placeholder="How can we help you?"></textarea>
                            <div class="tf-cart-tool-btns justify-content-center">
                                <div class="tf-mini-cart-tool-primary text-center w-100 fw-6 tf-mini-cart-tool-close">Close</div>
                            </div>
                        </div>
                    </div>
                    <div class="tf-mini-cart-tool-openable add-gift">
                        <div class="overplay tf-mini-cart-tool-close"></div>
                        <form class="tf-product-form-addgift">
                            <div class="tf-mini-cart-tool-content">
                                <div class="tf-mini-cart-tool-text">
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.65957 3.64545C4.65957 0.73868 7.89921 -0.995558 10.3176 0.617949L11.9997 1.74021L13.6818 0.617949C16.1001 -0.995558 19.3398 0.73868 19.3398 3.64545V4.32992H20.4286C21.9498 4.32992 23.1829 5.56311 23.1829 7.08416V9.10087C23.1829 9.61861 22.7632 10.0383 22.2454 10.0383H21.8528V20.2502C21.8528 20.254 21.8527 20.2577 21.8527 20.2614C21.8467 22.3272 20.1702 24 18.103 24H5.89634C3.82541 24 2.14658 22.3212 2.14658 20.2502V10.0384H1.75384C1.23611 10.0384 0.816406 9.61865 0.816406 9.10092V7.08421C0.816406 5.56304 2.04953 4.32992 3.57069 4.32992H4.65957V3.64545ZM6.53445 4.32992H11.0622V3.36863L9.27702 2.17757C8.10519 1.39573 6.53445 2.2357 6.53445 3.64545V4.32992ZM12.9371 3.36863V4.32992H17.4649V3.64545C17.4649 2.2357 15.8942 1.39573 14.7223 2.17756L12.9371 3.36863ZM3.57069 6.2048C3.08499 6.2048 2.69128 6.59851 2.69128 7.08421V8.16348H8.31067L8.3107 6.2048H3.57069ZM8.31071 10.0384V18.5741C8.31071 18.9075 8.48779 19.2158 8.77577 19.3838C9.06376 19.5518 9.4193 19.5542 9.70953 19.3901L11.9997 18.0953L14.2898 19.3901C14.58 19.5542 14.9356 19.5518 15.2236 19.3838C15.5115 19.2158 15.6886 18.9075 15.6886 18.5741V10.0383H19.9779V20.2137C19.9778 20.2169 19.9778 20.2201 19.9778 20.2233V20.2502C19.9778 21.2857 19.1384 22.1251 18.103 22.1251H5.89634C4.86088 22.1251 4.02146 21.2857 4.02146 20.2502V10.0384H8.31071ZM21.308 8.16344V7.08416C21.308 6.59854 20.9143 6.2048 20.4286 6.2048H15.6886V8.16344H21.308ZM13.8138 6.2048H10.1856V16.9672L11.5383 16.2024C11.8246 16.0405 12.1748 16.0405 12.461 16.2024L13.8138 16.9672V6.2048Z"></path>
                                        </svg>
                                    </div>
                                    <div class="tf-gift-wrap-infos">
                                        <p>Do you want a gift wrap?</p>
                                        Only
                                        <span class="price fw-6">$5.00</span>
                                    </div>
                                </div>
                                <div class="tf-cart-tool-btns">
                                    <button type="submit" class="tf-btn fw-6 w-100 justify-content-center btn-fill animate-hover-btn radius-3"><span>Add a gift wrap</span></button>
                                    <div class="tf-mini-cart-tool-primary text-center w-100 fw-6 tf-mini-cart-tool-close">Cancel</div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tf-mini-cart-tool-openable estimate-shipping">
                        <div class="overplay tf-mini-cart-tool-close"></div>
                        <div class="tf-mini-cart-tool-content">
                            <div class="tf-mini-cart-tool-text">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="15" viewBox="0 0 21 15" fill="currentColor">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.441406 1.13155C0.441406 0.782753 0.724159 0.5 1.07295 0.5H12.4408C12.7896 0.5 13.0724 0.782753 13.0724 1.13155V2.91575H16.7859C18.8157 2.91575 20.5581 4.43473 20.5581 6.42296V11.8878C20.5581 12.2366 20.2753 12.5193 19.9265 12.5193H18.7542C18.4967 13.6534 17.4823 14.5 16.2703 14.5C15.0582 14.5 14.0439 13.6534 13.7864 12.5193H7.20445C6.94692 13.6534 5.93259 14.5 4.72054 14.5C3.50849 14.5 2.49417 13.6534 2.23664 12.5193H1.07295C0.724159 12.5193 0.441406 12.2366 0.441406 11.8878V1.13155ZM2.26988 11.2562C2.57292 10.1881 3.55537 9.40578 4.72054 9.40578C5.88572 9.40578 6.86817 10.1881 7.17121 11.2562H11.8093V1.76309H1.7045V11.2562H2.26988ZM13.0724 4.17884V6.68916H19.295V6.42296C19.295 5.2348 18.2252 4.17884 16.7859 4.17884H13.0724ZM19.295 7.95226H13.0724V11.2562H13.8196C14.1227 10.1881 15.1051 9.40578 16.2703 9.40578C17.4355 9.40578 18.4179 10.1881 18.7209 11.2562H19.295V7.95226ZM4.72054 10.6689C4.0114 10.6689 3.43652 11.2437 3.43652 11.9529C3.43652 12.662 4.0114 13.2369 4.72054 13.2369C5.42969 13.2369 6.00456 12.662 6.00456 11.9529C6.00456 11.2437 5.42969 10.6689 4.72054 10.6689ZM16.2703 10.6689C15.5611 10.6689 14.9863 11.2437 14.9863 11.9529C14.9863 12.662 15.5611 13.2369 16.2703 13.2369C16.9794 13.2369 17.5543 12.662 17.5543 11.9529C17.5543 11.2437 16.9794 10.6689 16.2703 10.6689Z"></path>
                                    </svg>
                                </div>
                                <span class="fw-6">Estimate Shipping</span>
                            </div>
                            <div class="field">
                                <p>Country</p>
                                <select class="tf-select w-100" id="ShippingCountry_CartDrawer-Form" name="address[country]" data-default="">
                                    <option value="---" data-provinces="[]">---</option>
                                    <option value="Australia" data-provinces="[['Australian Capital Territory','Australian Capital Territory'],['New South Wales','New South Wales'],['Northern Territory','Northern Territory'],['Queensland','Queensland'],['South Australia','South Australia'],['Tasmania','Tasmania'],['Victoria','Victoria'],['Western Australia','Western Australia']]">Australia</option>
                                    <option value="Austria" data-provinces="[]">Austria</option>
                                    <option value="Belgium" data-provinces="[]">Belgium</option>
                                    <option value="Canada" data-provinces="[['Alberta','Alberta'],['British Columbia','British Columbia'],['Manitoba','Manitoba'],['New Brunswick','New Brunswick'],['Newfoundland and Labrador','Newfoundland and Labrador'],['Northwest Territories','Northwest Territories'],['Nova Scotia','Nova Scotia'],['Nunavut','Nunavut'],['Ontario','Ontario'],['Prince Edward Island','Prince Edward Island'],['Quebec','Quebec'],['Saskatchewan','Saskatchewan'],['Yukon','Yukon']]">Canada</option>
                                    <option value="Czech Republic" data-provinces="[]">Czechia</option>
                                    <option value="Denmark" data-provinces="[]">Denmark</option>
                                    <option value="Finland" data-provinces="[]">Finland</option>
                                    <option value="France" data-provinces="[]">France</option>
                                    <option value="Germany" data-provinces="[]">Germany</option>
                                    <option value="Hong Kong" data-provinces="[['Hong Kong Island','Hong Kong Island'],['Kowloon','Kowloon'],['New Territories','New Territories']]">Hong Kong SAR</option>
                                    <option value="Ireland" data-provinces="[['Carlow','Carlow'],['Cavan','Cavan'],['Clare','Clare'],['Cork','Cork'],['Donegal','Donegal'],['Dublin','Dublin'],['Galway','Galway'],['Kerry','Kerry'],['Kildare','Kildare'],['Kilkenny','Kilkenny'],['Laois','Laois'],['Leitrim','Leitrim'],['Limerick','Limerick'],['Longford','Longford'],['Louth','Louth'],['Mayo','Mayo'],['Meath','Meath'],['Monaghan','Monaghan'],['Offaly','Offaly'],['Roscommon','Roscommon'],['Sligo','Sligo'],['Tipperary','Tipperary'],['Waterford','Waterford'],['Westmeath','Westmeath'],['Wexford','Wexford'],['Wicklow','Wicklow']]">Ireland</option>
                                    <option value="Israel" data-provinces="[]">Israel</option>
                                    <option value="Italy" data-provinces="[['Agrigento','Agrigento'],['Alessandria','Alessandria'],['Ancona','Ancona'],['Aosta','Aosta Valley'],['Arezzo','Arezzo'],['Ascoli Piceno','Ascoli Piceno'],['Asti','Asti'],['Avellino','Avellino'],['Bari','Bari'],['Barletta-Andria-Trani','Barletta-Andria-Trani'],['Belluno','Belluno'],['Benevento','Benevento'],['Bergamo','Bergamo'],['Biella','Biella'],['Bologna','Bologna'],['Bolzano','South Tyrol'],['Brescia','Brescia'],['Brindisi','Brindisi'],['Cagliari','Cagliari'],['Caltanissetta','Caltanissetta'],['Campobasso','Campobasso'],['Carbonia-Iglesias','Carbonia-Iglesias'],['Caserta','Caserta'],['Catania','Catania'],['Catanzaro','Catanzaro'],['Chieti','Chieti'],['Como','Como'],['Cosenza','Cosenza'],['Cremona','Cremona'],['Crotone','Crotone'],['Cuneo','Cuneo'],['Enna','Enna'],['Fermo','Fermo'],['Ferrara','Ferrara'],['Firenze','Florence'],['Foggia','Foggia'],['Forlì-Cesena','Forlì-Cesena'],['Frosinone','Frosinone'],['Genova','Genoa'],['Gorizia','Gorizia'],['Grosseto','Grosseto'],['Imperia','Imperia'],['Isernia','Isernia'],['L'Aquila','L’Aquila'],['La Spezia','La Spezia'],['Latina','Latina'],['Lecce','Lecce'],['Lecco','Lecco'],['Livorno','Livorno'],['Lodi','Lodi'],['Lucca','Lucca'],['Macerata','Macerata'],['Mantova','Mantua'],['Massa-Carrara','Massa and Carrara'],['Matera','Matera'],['Medio Campidano','Medio Campidano'],['Messina','Messina'],['Milano','Milan'],['Modena','Modena'],['Monza e Brianza','Monza and Brianza'],['Napoli','Naples'],['Novara','Novara'],['Nuoro','Nuoro'],['Ogliastra','Ogliastra'],['Olbia-Tempio','Olbia-Tempio'],['Oristano','Oristano'],['Padova','Padua'],['Palermo','Palermo'],['Parma','Parma'],['Pavia','Pavia'],['Perugia','Perugia'],['Pesaro e Urbino','Pesaro and Urbino'],['Pescara','Pescara'],['Piacenza','Piacenza'],['Pisa','Pisa'],['Pistoia','Pistoia'],['Pordenone','Pordenone'],['Potenza','Potenza'],['Prato','Prato'],['Ragusa','Ragusa'],['Ravenna','Ravenna'],['Reggio Calabria','Reggio Calabria'],['Reggio Emilia','Reggio Emilia'],['Rieti','Rieti'],['Rimini','Rimini'],['Roma','Rome'],['Rovigo','Rovigo'],['Salerno','Salerno'],['Sassari','Sassari'],['Savona','Savona'],['Siena','Siena'],['Siracusa','Syracuse'],['Sondrio','Sondrio'],['Taranto','Taranto'],['Teramo','Teramo'],['Terni','Terni'],['Torino','Turin'],['Trapani','Trapani'],['Trento','Trentino'],['Treviso','Treviso'],['Trieste','Trieste'],['Udine','Udine'],['Varese','Varese'],['Venezia','Venice'],['Verbano-Cusio-Ossola','Verbano-Cusio-Ossola'],['Vercelli','Vercelli'],['Verona','Verona'],['Vibo Valentia','Vibo Valentia'],['Vicenza','Vicenza'],['Viterbo','Viterbo']]">Italy</option>
                                    <option value="Japan" data-provinces="[['Aichi','Aichi'],['Akita','Akita'],['Aomori','Aomori'],['Chiba','Chiba'],['Ehime','Ehime'],['Fukui','Fukui'],['Fukuoka','Fukuoka'],['Fukushima','Fukushima'],['Gifu','Gifu'],['Gunma','Gunma'],['Hiroshima','Hiroshima'],['Hokkaidō','Hokkaido'],['Hyōgo','Hyogo'],['Ibaraki','Ibaraki'],['Ishikawa','Ishikawa'],['Iwate','Iwate'],['Kagawa','Kagawa'],['Kagoshima','Kagoshima'],['Kanagawa','Kanagawa'],['Kumamoto','Kumamoto'],['Kyōto','Kyoto'],['Kōchi','Kochi'],['Mie','Mie'],['Miyagi','Miyagi'],['Miyazaki','Miyazaki'],['Nagano','Nagano'],['Nagasaki','Nagasaki'],['Nara','Nara'],['Niigata','Niigata'],['Okayama','Okayama'],['Okinawa','Okinawa'],['Saga','Saga'],['Saitama','Saitama'],['Shiga','Shiga'],['Shimane','Shimane'],['Shizuoka','Shizuoka'],['Tochigi','Tochigi'],['Tokushima','Tokushima'],['Tottori','Tottori'],['Toyama','Toyama'],['Tōkyō','Tokyo'],['Wakayama','Wakayama'],['Yamagata','Yamagata'],['Yamaguchi','Yamaguchi'],['Yamanashi','Yamanashi'],['Ōita','Oita'],['Ōsaka','Osaka']]">Japan</option>
                                    <option value="Malaysia" data-provinces="[['Johor','Johor'],['Kedah','Kedah'],['Kelantan','Kelantan'],['Kuala Lumpur','Kuala Lumpur'],['Labuan','Labuan'],['Melaka','Malacca'],['Negeri Sembilan','Negeri Sembilan'],['Pahang','Pahang'],['Penang','Penang'],['Perak','Perak'],['Perlis','Perlis'],['Putrajaya','Putrajaya'],['Sabah','Sabah'],['Sarawak','Sarawak'],['Selangor','Selangor'],['Terengganu','Terengganu']]">Malaysia</option>
                                    <option value="Netherlands" data-provinces="[]">Netherlands</option>
                                    <option value="New Zealand" data-provinces="[['Auckland','Auckland'],['Bay of Plenty','Bay of Plenty'],['Canterbury','Canterbury'],['Chatham Islands','Chatham Islands'],['Gisborne','Gisborne'],['Hawke's Bay','Hawke’s Bay'],['Manawatu-Wanganui','Manawatū-Whanganui'],['Marlborough','Marlborough'],['Nelson','Nelson'],['Northland','Northland'],['Otago','Otago'],['Southland','Southland'],['Taranaki','Taranaki'],['Tasman','Tasman'],['Waikato','Waikato'],['Wellington','Wellington'],['West Coast','West Coast']]">New Zealand</option>
                                    <option value="Norway" data-provinces="[]">Norway</option>
                                    <option value="Poland" data-provinces="[]">Poland</option>
                                    <option value="Portugal" data-provinces="[['Aveiro','Aveiro'],['Açores','Azores'],['Beja','Beja'],['Braga','Braga'],['Bragança','Bragança'],['Castelo Branco','Castelo Branco'],['Coimbra','Coimbra'],['Faro','Faro'],['Guarda','Guarda'],['Leiria','Leiria'],['Lisboa','Lisbon'],['Madeira','Madeira'],['Portalegre','Portalegre'],['Porto','Porto'],['Santarém','Santarém'],['Setúbal','Setúbal'],['Viana do Castelo','Viana do Castelo'],['Vila Real','Vila Real'],['Viseu','Viseu'],['Évora','Évora']]">Portugal</option>
                                    <option value="Singapore" data-provinces="[]">Singapore</option>
                                    <option value="South Korea" data-provinces="[['Busan','Busan'],['Chungbuk','North Chungcheong'],['Chungnam','South Chungcheong'],['Daegu','Daegu'],['Daejeon','Daejeon'],['Gangwon','Gangwon'],['Gwangju','Gwangju City'],['Gyeongbuk','North Gyeongsang'],['Gyeonggi','Gyeonggi'],['Gyeongnam','South Gyeongsang'],['Incheon','Incheon'],['Jeju','Jeju'],['Jeonbuk','North Jeolla'],['Jeonnam','South Jeolla'],['Sejong','Sejong'],['Seoul','Seoul'],['Ulsan','Ulsan']]">South Korea</option>
                                    <option value="Spain" data-provinces="[['A Coruña','A Coruña'],['Albacete','Albacete'],['Alicante','Alicante'],['Almería','Almería'],['Asturias','Asturias Province'],['Badajoz','Badajoz'],['Balears','Balears Province'],['Barcelona','Barcelona'],['Burgos','Burgos'],['Cantabria','Cantabria Province'],['Castellón','Castellón'],['Ceuta','Ceuta'],['Ciudad Real','Ciudad Real'],['Cuenca','Cuenca'],['Cáceres','Cáceres'],['Cádiz','Cádiz'],['Córdoba','Córdoba'],['Girona','Girona'],['Granada','Granada'],['Guadalajara','Guadalajara'],['Guipúzcoa','Gipuzkoa'],['Huelva','Huelva'],['Huesca','Huesca'],['Jaén','Jaén'],['La Rioja','La Rioja Province'],['Las Palmas','Las Palmas'],['León','León'],['Lleida','Lleida'],['Lugo','Lugo'],['Madrid','Madrid Province'],['Melilla','Melilla'],['Murcia','Murcia'],['Málaga','Málaga'],['Navarra','Navarra'],['Ourense','Ourense'],['Palencia','Palencia'],['Pontevedra','Pontevedra'],['Salamanca','Salamanca'],['Santa Cruz de Tenerife','Santa Cruz de Tenerife'],['Segovia','Segovia'],['Sevilla','Seville'],['Soria','Soria'],['Tarragona','Tarragona'],['Teruel','Teruel'],['Toledo','Toledo'],['Valencia','Valencia'],['Valladolid','Valladolid'],['Vizcaya','Biscay'],['Zamora','Zamora'],['Zaragoza','Zaragoza'],['Álava','Álava'],['Ávila','Ávila']]">Spain</option>
                                    <option value="Sweden" data-provinces="[]">Sweden</option>
                                    <option value="Switzerland" data-provinces="[]">Switzerland</option>
                                    <option value="United Arab Emirates" data-provinces="[['Abu Dhabi','Abu Dhabi'],['Ajman','Ajman'],['Dubai','Dubai'],['Fujairah','Fujairah'],['Ras al-Khaimah','Ras al-Khaimah'],['Sharjah','Sharjah'],['Umm al-Quwain','Umm al-Quwain']]">United Arab Emirates</option>
                                    <option value="United Kingdom" data-provinces="[['British Forces','British Forces'],['England','England'],['Northern Ireland','Northern Ireland'],['Scotland','Scotland'],['Wales','Wales']]">United Kingdom</option>
                                    <option value="United States" data-provinces="[['Alabama','Alabama'],['Alaska','Alaska'],['American Samoa','American Samoa'],['Arizona','Arizona'],['Arkansas','Arkansas'],['Armed Forces Americas','Armed Forces Americas'],['Armed Forces Europe','Armed Forces Europe'],['Armed Forces Pacific','Armed Forces Pacific'],['California','California'],['Colorado','Colorado'],['Connecticut','Connecticut'],['Delaware','Delaware'],['District of Columbia','Washington DC'],['Federated States of Micronesia','Micronesia'],['Florida','Florida'],['Georgia','Georgia'],['Guam','Guam'],['Hawaii','Hawaii'],['Idaho','Idaho'],['Illinois','Illinois'],['Indiana','Indiana'],['Iowa','Iowa'],['Kansas','Kansas'],['Kentucky','Kentucky'],['Louisiana','Louisiana'],['Maine','Maine'],['Marshall Islands','Marshall Islands'],['Maryland','Maryland'],['Massachusetts','Massachusetts'],['Michigan','Michigan'],['Minnesota','Minnesota'],['Mississippi','Mississippi'],['Missouri','Missouri'],['Montana','Montana'],['Nebraska','Nebraska'],['Nevada','Nevada'],['New Hampshire','New Hampshire'],['New Jersey','New Jersey'],['New Mexico','New Mexico'],['New York','New York'],['North Carolina','North Carolina'],['North Dakota','North Dakota'],['Northern Mariana Islands','Northern Mariana Islands'],['Ohio','Ohio'],['Oklahoma','Oklahoma'],['Oregon','Oregon'],['Palau','Palau'],['Pennsylvania','Pennsylvania'],['Puerto Rico','Puerto Rico'],['Rhode Island','Rhode Island'],['South Carolina','South Carolina'],['South Dakota','South Dakota'],['Tennessee','Tennessee'],['Texas','Texas'],['Utah','Utah'],['Vermont','Vermont'],['Virgin Islands','U.S. Virgin Islands'],['Virginia','Virginia'],['Washington','Washington'],['West Virginia','West Virginia'],['Wisconsin','Wisconsin'],['Wyoming','Wyoming']]">United States</option>
                                    <option value="Vietnam" data-provinces="[]">Vietnam</option>
                                </select>
                            </div>
                            <div class="field">
                                <p>Zip code</p>
                                <input type="text" name="text" placeholder="">
                            </div>
                            <div class="tf-cart-tool-btns">
                                <a href="#" class="tf-btn fw-6 justify-content-center btn-fill w-100 animate-hover-btn radius-3"><span>Estimate</span></a>
                                <div class="tf-mini-cart-tool-primary text-center fw-6 w-100 tf-mini-cart-tool-close">Cancel</div>
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
                        <img src="images/products/orange-1.jpg" alt="">
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
                        <input id="quantityInput" type="text" name="number" value="1">
                        <span id="plusBtn" class="btn-quantity plus-btn">+</span>
                    </div>
                </div>
                <div class="tf-product-info-variant-picker mb_15">
                    <div class="tf-product-description">
                        <p id="yourExactlyCoin">Tu cantidad de VerdCoins: 80 </p>
                    </div>
                </div>
                <div class="tf-product-info-buy-button">
                    <form class="">
                        <a href="javascript:void(0);" class="tf-btn btn-fill justify-content-center fw-6 fs-16 flex-grow-1 animate-hover-btn btn-add-to-cart"><span>Añadir al carrito -&nbsp;</span><span class="tf-qty-price">$18.00</span></a>
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
<div class="col-md-3">
    <label class="form-label" for="showToastPlacement">&nbsp;</label>
    <button id="showToastButton" class="btn btn-danger">Mostrar Toast</button>
</div>



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

<script>
        $(function () {
            // Configuración del toast
            toastr.options = {
                closeButton: true, // Habilita el botón de cierre
                progressBar: true, // Barra de progreso (opcional)
                positionClass: "toast-top-right", // Ubicación en la pantalla
                timeOut: 5000, // Duración en milisegundos
                extendedTimeOut: 2000, // Tiempo extendido cuando el mouse está sobre el toast
                showEasing: "swing", // Animación de entrada
                hideEasing: "linear", // Animación de salida
                showMethod: "fadeIn", // Método de aparición
                hideMethod: "fadeOut" // Método de desaparición
            };

            // Evento de clic en el botón
            $("#showToastButton").on("click", function () {
                // Mostrar el toast
                toastr.error("No cuenta con monedas suficientes para poder comprar este producto", "Fondos insuficientes");
            });
        });
    </script>

    
@endsection