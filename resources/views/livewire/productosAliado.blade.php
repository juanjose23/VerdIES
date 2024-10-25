<div class="tf-grid-layout tf-col-2 lg-col-4">
    @foreach ($productos as $producto)
    <div class="card-product style-9">
        <div class="card-product-wrapper">
            <a href="product-detail.html" class="product-img">
                <img class="lazyload img-product" data-src="https://res.cloudinary.com/drmoodyde/image/upload/v1728884271/carnita_asada_aoaww8.webp" src="https://res.cloudinary.com/drmoodyde/image/upload/v1728884271/carnita_asada_aoaww8.webp" alt="image-product">
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
                <a href="product-detail.html" class="title link fw-6">{{ wordwrap($producto->nombre , 15, "\n", true) }}</a>
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
    @endforeach
</div>