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
                                <p class="collection-counter text_16 mb-0 ms-2">(@if(isset($product) != null && count($product) > 0) {{count($product)}} @else 237 @endif items)</p>
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
                                        <li><a onclick="sortproduct('asc')" class="text_14">Alphabetically, A-Z</a></li>
                                        <li><a onclick="sortproduct('desc')" class="text_14">Alphabetically, Z-A</a></li>
                                        <li><a onclick="sortproduct('low')" class="text_14">Price, low to high</a></li>
                                        <li><a onclick="sortproduct('high')" class="text_14">Price, high to low</a></li>
                                        <li><a onclick="sortproduct('old')" class="text_14">Date, old to new</a></li>
                                        <li><a onclick="sortproduct('new')" class="text_14">Date, new to old</a></li>
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
                            
                                @if(isset($product) != null && count($product) > 0)
                                    <div id="sortproductlist">
                                        @include('product')
                                    </div>
                                @endif
                            </div>
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
<script>
    function sortproduct(key)
    {
        $.ajax({
            url: "sortproduct/" + key,
            method: 'GET',
            success: function(data) {
                $('#sortproductlist').html(data);
            },
            error: function(err) {
                console.log('Error:', err);
            }
        });
    }
</script>
@include('layouts.footer')
