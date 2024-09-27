@include('layouts.app')
@include('layouts.navBar')
    <!-- breadcrumb start -->
    <div class="breadcrumb innerpagebanner" style="background-image: url({{url('asset/img/banner1.jpg')}});">
        <div class="container">
            <h2 class="text-white">Products</h2>
            <ul class="list-unstyled d-flex align-items-center m-0">
                <li><a href="{{url('/')}}">Home</a></li>
                <li>
                    <svg class="icon icon-breadcrumb" width="64" height="64" viewBox="0 0 64 64" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g opacity="0.4">
                            <path
                                d="M25.9375 8.5625L23.0625 11.4375L43.625 32L23.0625 52.5625L25.9375 55.4375L47.9375 33.4375L49.3125 32L47.9375 30.5625L25.9375 8.5625Z"
                                fill="#000" />
                        </g>
                    </svg>
                </li>
                <li>Products</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb end -->

    <main id="MainContent" class="content-for-layout">
        <div class="collection mt-100">
            <div class="container">
                <div class="row">
                    <!-- product area start -->
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="filter-sort-wrapper d-flex justify-content-between flex-wrap">
                            <div class="collection-title-wrap d-flex align-items-end">
                                <h2 class="collection-title heading_24 mb-0">All products</h2>
                                <p class="collection-counter text_16 mb-0 ms-2">(237 items)</p>
                            </div>
                            <div class="filter-sorting">
                                <div class="collection-sorting position-relative d-none d-lg-block">
                                    <div class="sorting-header text_16 d-flex align-items-center justify-content-end">
                                        <span class="sorting-title me-2">Sort by:</span>
                                        <span class="active-sorting">Featured</span>
                                        <span class="sorting-icon">
                                            <svg class="icon icon-down" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" class="feather feather-chevron-down">
                                                <polyline points="6 9 12 15 18 9"></polyline>
                                            </svg>
                                        </span>
                                    </div>
                                    <ul class="sorting-lists list-unstyled m-0">
                                        <li><a class="text_14">Featured</a></li>
                                        <li><a class="text_14">Best Selling</a></li>
                                        <li><a class="text_14">Alphabetically, A-Z</a></li>
                                        <li><a class="text_14">Alphabetically, Z-A</a></li>
                                        <li><a class="text_14">Price, low to high</a></li>
                                        <li><a class="text_14">Price, high to low</a></li>
                                        <li><a class="text_14">Date, old to new</a></li>
                                        <li><a class="text_14">Date, new to old</a></li>
                                    </ul>
                                </div>
                                <div class="filter-drawer-trigger mobile-filter d-flex align-items-center d-lg-none">
                                    <span class="mobile-filter-icon me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="icon icon-filter">
                                            <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                                        </svg>
                                    </span>
                                    <span class="mobile-filter-heading">Sorting</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="collection-product-container">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-6" data-aos="fade-up" data-aos-duration="700">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            <a class="hover-switch" href="{{url('product_details')}}">
                                                <img class="primary-img" src="{{url('asset/img/products/product1.jpg')}}"
                                                    alt="product">
                                            </a>
                                            <div class="product-card-action product-card-action-2">
                                                <a href="{{url('product_details')}}" class="quickview-btn btn-primary"
                                                    data-bs-toggle="modal">QUICKVIEW</a>
                                                <a href="{{url('product_details')}}" class="addtocart-btn btn-primary">ADD TO CART</a>
                                                </div>
                                            <div class="product-badge">
                                                <span class="badge-label badge-percentage rounded">-44%</span>
                                            </div>
                                        </div>
                                        <div class="product-card-details">
                                            <h3 class="product-card-title">
                                                <a href="{{url('product_details')}}">best wood furniture</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-6" data-aos="fade-up" data-aos-duration="700">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            <a class="hover-switch" href="{{url('product_details')}}">
                                                <img class="primary-img" src="{{url('asset/img/products/product1.jpg')}}"
                                                    alt="product">
                                            </a>
                                            <div class="product-card-action product-card-action-2">
                                                <a href="{{url('product_details')}}" class="quickview-btn btn-primary"
                                                    data-bs-toggle="modal">QUICKVIEW</a>
                                                <a href="{{url('product_details')}}" class="addtocart-btn btn-primary">ADD TO CART</a>
                                                </div>
                                        </div>
                                        <div class="product-card-details">
                                            <h3 class="product-card-title">
                                                <a href="{{url('product_details')}}">Vita Lounge Chair</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-6" data-aos="fade-up" data-aos-duration="700">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            <a class="hover-switch" href="{{url('product_details')}}">
                                                <img class="primary-img" src="{{url('asset/img/products/product1.jpg')}}"
                                                    alt="product">
                                            </a>
                                            <div class="product-card-action product-card-action-2">
                                                <a href="{{url('product_details')}}" class="quickview-btn btn-primary"
                                                    data-bs-toggle="modal">QUICKVIEW</a>
                                                <a href="{{url('product_details')}}" class="addtocart-btn btn-primary">ADD TO CART</a>
                                                </div>
                                            <div class="product-badge">
                                                <span class="badge-label badge-new rounded">New</span>
                                            </div>
                                        </div>
                                        <div class="product-card-details">
                                            <h3 class="product-card-title">
                                                <a href="{{url('product_details')}}">Sarno Dining Chair</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-6" data-aos="fade-up" data-aos-duration="700">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            <a class="hover-switch" href="{{url('product_details')}}">
                                                <img class="primary-img" src="{{url('asset/img/products/product1.jpg')}}"
                                                    alt="product">
                                            </a>
                                            <div class="product-card-action product-card-action-2">
                                                <a href="{{url('product_details')}}" class="quickview-btn btn-primary"
                                                    data-bs-toggle="modal">QUICKVIEW</a>
                                                <a href="{{url('product_details')}}" class="addtocart-btn btn-primary">ADD TO CART</a>
                                                </div>
                                        </div>
                                        <div class="product-card-details">
                                            <h3 class="product-card-title">
                                                <a href="{{url('product_details')}}">bisum tea table</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-6" data-aos="fade-up" data-aos-duration="700">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            <a class="hover-switch" href="{{url('product_details')}}">
                                                <img class="primary-img" src="{{url('asset/img/products/product1.jpg')}}"
                                                    alt="product">
                                            </a>
                                            <div class="product-card-action product-card-action-2">
                                                <a href="{{url('product_details')}}" class="quickview-btn btn-primary"
                                                    data-bs-toggle="modal">QUICKVIEW</a>
                                                <a href="{{url('product_details')}}" class="addtocart-btn btn-primary">ADD TO CART</a>
                                            </div>
                                        </div>
                                        <div class="product-card-details">
                                            <h3 class="product-card-title">
                                                <a href="{{url('product_details')}}">Eliot Reversible tool</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-6" data-aos="fade-up" data-aos-duration="700">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            <a class="hover-switch" href="{{url('product_details')}}">
                                                <img class="primary-img" src="{{url('asset/img/products/product1.jpg')}}"
                                                    alt="product">
                                            </a>
                                            <div class="product-card-action product-card-action-2">
                                                <a href="{{url('product_details')}}" class="quickview-btn btn-primary"
                                                    data-bs-toggle="modal">QUICKVIEW</a>
                                                <a href="{{url('product_details')}}" class="addtocart-btn btn-primary">ADD TO CART</a>
                                                </div>
                                        </div>
                                        <div class="product-card-details">
                                            <h3 class="product-card-title">
                                                <a href="{{url('product_details')}}">Vita Lounge wardrobe</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-6" data-aos="fade-up" data-aos-duration="700">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            <a class="hover-switch" href="{{url('product_details')}}">
                                                <img class="primary-img" src="{{url('asset/img/products/product1.jpg')}}"
                                                    alt="product">
                                            </a>
                                            <div class="product-card-action product-card-action-2">
                                                <a href="{{url('product_details')}}" class="quickview-btn btn-primary"
                                                    data-bs-toggle="modal">QUICKVIEW</a>
                                                <a href="{{url('product_details')}}" class="addtocart-btn btn-primary">ADD TO CART</a>
                                                </div>
                                        </div>
                                        <div class="product-card-details">
                                            <h3 class="product-card-title">
                                                <a href="{{url('product_details')}}">Sarno Dining Chair</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-6" data-aos="fade-up" data-aos-duration="700">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            <a class="hover-switch" href="{{url('product_details')}}">
                                                <img class="primary-img" src="{{url('asset/img/products/product1.jpg')}}"
                                                    alt="product">
                                            </a>
                                            <div class="product-card-action product-card-action-2">
                                                <a href="{{url('product_details')}}" class="quickview-btn btn-primary"
                                                    data-bs-toggle="modal">QUICKVIEW</a>
                                                <a href="{{url('product_details')}}" class="addtocart-btn btn-primary">ADD TO CART</a>
                                                </div>

                                        </div>
                                        <div class="product-card-details">
                                            <h3 class="product-card-title">
                                                <a href="{{url('product_details')}}">Vita Lounge Chair</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-6" data-aos="fade-up" data-aos-duration="700">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            <a class="hover-switch" href="{{url('product_details')}}">
                                                <img class="primary-img" src="{{url('asset/img/products/product1.jpg')}}"
                                                    alt="product">
                                            </a>
                                            <div class="product-card-action product-card-action-2">
                                                <a href="{{url('product_details')}}" class="quickview-btn btn-primary"
                                                    data-bs-toggle="modal">QUICKVIEW</a>
                                                <a href="{{url('product_details')}}" class="addtocart-btn btn-primary">ADD TO CART</a>
                                            </div>
                                        </div>
                                        <div class="product-card-details">
                                            <h3 class="product-card-title">
                                                <a href="{{url('product_details')}}">Eliot Reversible tool</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-6" data-aos="fade-up" data-aos-duration="700">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            <a class="hover-switch" href="{{url('product_details')}}">
                                                <img class="primary-img" src="{{url('asset/img/products/product1.jpg')}}"
                                                    alt="product">
                                            </a>
                                            <div class="product-card-action product-card-action-2">
                                                <a href="{{url('product_details')}}" class="quickview-btn btn-primary"
                                                    data-bs-toggle="modal">QUICKVIEW</a>
                                                <a href="{{url('product_details')}}" class="addtocart-btn btn-primary">ADD TO CART</a>
                                            </div>
                                        </div>
                                        <div class="product-card-details">
                                            <h3 class="product-card-title">
                                                <a href="{{url('product_details')}}">Eliot Reversible tool</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-6" data-aos="fade-up" data-aos-duration="700">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            <a class="hover-switch" href="{{url('product_details')}}">
                                                <img class="primary-img" src="{{url('asset/img/products/product1.jpg')}}"
                                                    alt="product">
                                            </a>
                                            <div class="product-card-action product-card-action-2">
                                                <a href="{{url('product_details')}}" class="quickview-btn btn-primary"
                                                    data-bs-toggle="modal">QUICKVIEW</a>
                                                <a href="{{url('product_details')}}" class="addtocart-btn btn-primary">ADD TO CART</a>
                                            </div>
                                        </div>
                                        <div class="product-card-details">
                                            <h3 class="product-card-title">
                                                <a href="{{url('product_details')}}">Eliot Reversible tool</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-6" data-aos="fade-up" data-aos-duration="700">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            <a class="hover-switch" href="{{url('product_details')}}">
                                                <img class="primary-img" src="{{url('asset/img/products/product1.jpg')}}"
                                                    alt="product">
                                            </a>
                                            <div class="product-card-action product-card-action-2">
                                                <a href="{{url('product_details')}}" class="quickview-btn btn-primary"
                                                    data-bs-toggle="modal">QUICKVIEW</a>
                                                <a href="{{url('product_details')}}" class="addtocart-btn btn-primary">ADD TO CART</a>
                                            </div>
                                        </div>
                                        <div class="product-card-details">
                                            <h3 class="product-card-title">
                                                <a href="{{url('product_details')}}">Eliot Reversible tool</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- List view -->
                            <!-- <div class="list_view_product">
                                <div class="card bg-warning-subtle mt-4">
                                    <img src="{{url('asset/img/products/product1.jpg')}}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <div class="text-section">
                                            <h5 class="card-title fw-bold">Card title</h5>
                                            <p class="card-text">Some quick example text to build on the card's
                                                content.</p>
                                        </div>
                                        <div class="cta-section">
                                            <div>$129.00</div>
                                            <a href="#" class="btn btn-dark">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card bg-info-subtle mt-4">
                                    <img src="{{url('asset/img/products/product1.jpg')}}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <div class="text-section">
                                            <h5 class="card-title fw-bold">Card title</h5>
                                            <p class="card-text">Some quick example text to build on the card's
                                                content.</p>
                                        </div>
                                        <div class="cta-section">
                                            <div>$129.00</div>
                                            <a href="#" class="btn btn-dark">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card bg-dark-subtle mt-4">
                                    <img src="{{url('asset/img/products/product1.jpg')}}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <div class="text-section">
                                            <h5 class="card-title fw-bold">Card title</h5>
                                            <p class="card-text">Some quick example text to build on the card's
                                                content.</p>
                                        </div>
                                        <div class="cta-section">
                                            <div>$129.00</div>
                                            <a href="#" class="btn btn-dark">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card bg-warning-subtle mt-4">
                                    <img src="{{url('asset/img/products/product1.jpg')}}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <div class="text-section">
                                            <h5 class="card-title fw-bold">Card title</h5>
                                            <p class="card-text">Some quick example text to build on the card's
                                                content.</p>
                                        </div>
                                        <div class="cta-section">
                                            <div>$129.00</div>
                                            <a href="#" class="btn btn-dark">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card bg-info-subtle mt-4">
                                    <img src="{{url('asset/img/products/product1.jpg')}}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <div class="text-section">
                                            <h5 class="card-title fw-bold">Card title</h5>
                                            <p class="card-text">Some quick example text to build on the card's
                                                content.</p>
                                        </div>
                                        <div class="cta-section">
                                            <div>$129.00</div>
                                            <a href="#" class="btn btn-dark">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card bg-dark-subtle mt-4">
                                    <img src="{{url('asset/img/products/product1.jpg')}}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <div class="text-section">
                                            <h5 class="card-title fw-bold">Card title</h5>
                                            <p class="card-text">Some quick example text to build on the card's
                                                content.</p>
                                        </div>
                                        <div class="cta-section">
                                            <div>$129.00</div>
                                            <a href="#" class="btn btn-dark">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- End List view -->
                        </div>
                        <!-- <div class="pagination justify-content-center mt-100">
                            <nav>
                                <ul class="pagination m-0 d-flex align-items-center">
                                    <li class="item disabled">
                                        <a class="link">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-left">
                                                <polyline points="15 18 9 12 15 6"></polyline>
                                            </svg>
                                        </a>
                                    </li>
                                    <li class="item"><a class="link" href="#">1</a></li>
                                    <li class="item active"><a class="link" href="#">2</a></li>
                                    <li class="item"><a class="link" href="#">3</a></li>
                                    <li class="item"><a class="link" href="#">4</a></li>
                                    <li class="item">
                                        <a class="link" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-right">
                                                <polyline points="9 18 15 12 9 6"></polyline>
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div> -->
                    </div>
                    <!-- product area end -->

                    <!-- sidebar start -->
                    <div class="col-lg-3 col-md-12 col-12">
                        <div class="collection-filter filter-drawer">
                            <div class="filter-widget d-lg-none d-flex align-items-center justify-content-between">
                                <h5 class="heading_24">Sorting By</h4>
                                    <button type="button"
                                        class="btn-close text-reset filter-drawer-trigger d-lg-none"></button>
                            </div>

                            <div class="filter-widget d-lg-none">
                                <div class="filter-header faq-heading heading_18 d-flex align-items-center justify-content-between border-bottom"
                                    data-bs-toggle="collapse" data-bs-target="#filter-mobile-sort">
                                    <span>
                                        <span class="sorting-title me-2">Sort by:</span>
                                        <span class="active-sorting">Featured</span>
                                    </span>
                                    <span class="faq-heading-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="icon icon-down">
                                            <polyline points="6 9 12 15 18 9"></polyline>
                                        </svg>
                                    </span>
                                </div>
                                <div id="filter-mobile-sort" class="accordion-collapse collapse show">
                                    <ul class="sorting-lists-mobile list-unstyled m-0">
                                        <li><a class="text_14">Featured</a></li>
                                        <li><a class="text_14">Best Selling</a></li>
                                        <li><a class="text_14">Alphabetically, A-Z</a></li>
                                        <li><a class="text_14">Alphabetically, Z-A</a></li>
                                        <li><a class="text_14">Price, low to high</a></li>
                                        <li><a class="text_14">Price, high to low</a></li>
                                        <li><a class="text_14">Date, old to new</a></li>
                                        <li><a class="text_14">Date, new to old</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- sidebar end -->
                </div>
            </div>
        </div>
    </main>
@include('layouts.footer')