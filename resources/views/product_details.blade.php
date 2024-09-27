@include('layouts.app')
@include('layouts.navBar')
    <main id="MainContent" class="content-for-layout">
        <div class="product-page mt-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-gallery product-gallery-vertical d-flex">
                            <div class="product-img-large">
                                <div class="img-large-slider common-slider" data-slick='{
                                    "slidesToShow": 1, 
                                    "slidesToScroll": 1,
                                    "dots": false,
                                    "arrows": false,
                                    "asNavFor": ".img-thumb-slider"
                                }'>
                                    <div class="img-large-wrapper">
                                        <a href="{{url('asset/img/products/39.jpg')}}" data-fancybox="gallery">
                                            <img src="{{url('asset/img/products/39.jpg')}}" alt="img">
                                        </a>
                                    </div>
                                    <div class="img-large-wrapper">
                                        <a href="{{url('asset/img/products/38.jpg')}}" data-fancybox="gallery">
                                            <img src="{{url('asset/img/products/38.jpg')}}" alt="img">
                                        </a>
                                    </div>
                                    <div class="img-large-wrapper">
                                        <a href="{{url('asset/img/products/37.jpg')}}" data-fancybox="gallery">
                                            <img src="{{url('asset/img/products/37.jpg')}}" alt="img">
                                        </a>
                                    </div>
                                    <div class="img-large-wrapper">
                                        <a href="{{url('asset/img/products/36.jpg')}}" data-fancybox="gallery">
                                            <img src="{{url('asset/img/products/36.jpg')}}" alt="img">
                                        </a>
                                    </div>
                                    <div class="img-large-wrapper">
                                        <a href="{{url('asset/img/products/34.jpg')}}" data-fancybox="gallery">
                                            <img src="{{url('asset/img/products/34.jpg')}}" alt="img">
                                        </a>
                                    </div>
                                    <div class="img-large-wrapper">
                                        <a href="{{url('asset/img/products/30.jpg')}}" data-fancybox="gallery">
                                            <img src="{{url('asset/img/products/30.jpg')}}" alt="img">
                                        </a>
                                    </div>
                                    <div class="img-large-wrapper">
                                        <a href="{{url('asset/img/products/32.jpg')}}" data-fancybox="gallery">
                                            <img src="{{url('asset/img/products/32.jpg')}}" alt="img">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-img-thumb">
                                <div class="img-thumb-slider common-slider" data-vertical-slider="true" data-slick='{
                                    "slidesToShow": 5, 
                                    "slidesToScroll": 1,
                                    "dots": false,
                                    "arrows": true,
                                    "infinite": false,
                                    "speed": 300,
                                    "cssEase": "ease",
                                    "focusOnSelect": true,
                                    "swipeToSlide": true,
                                    "asNavFor": ".img-large-slider"
                                }'>
                                    <div>
                                        <div class="img-thumb-wrapper">
                                            <img src="{{url('asset/img/products/39.jpg')}}" alt="img">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="img-thumb-wrapper">
                                            <img src="{{url('asset/img/products/38.jpg')}}" alt="img">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="img-thumb-wrapper">
                                            <img src="{{url('asset/img/products/37.jpg')}}" alt="img">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="img-thumb-wrapper">
                                            <img src="{{url('asset/img/products/36.jpg')}}" alt="img">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="img-thumb-wrapper">
                                            <img src="{{url('asset/img/products/34.jpg')}}" alt="img">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="img-thumb-wrapper">
                                            <img src="{{url('asset/img/products/30.jpg')}}" alt="img">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="img-thumb-wrapper">
                                            <img src="{{url('asset/img/products/32.jpg')}}" alt="img">
                                        </div>
                                    </div>
                                </div>
                                <div class="activate-arrows show-arrows-always arrows-white d-none d-lg-flex justify-content-between mt-3"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-details ps-lg-4">
                            <div class="mb-3"><span class="product-availability">In Stock</span></div>
                            <h2 class="product-title mb-3">Accesories Lather bag</h2>
                            

                            <div class="product-variant-wrapper">
                                
                                <div class="product-variant product-variant-other">
                                    <strong class="label mb-1 d-block">Size:</strong>

                                    <ul class="variant-list list-unstyled d-flex align-items-center flex-wrap">
                                        <li class="variant-item">
                                            <input type="radio" value="34" checked>
                                            <label class="variant-label">5kg</label>
                                        </li>
                                        <li class="variant-item">
                                            <input type="radio" value="36">
                                            <label class="variant-label">8kg</label>
                                        </li>
                                        <li class="variant-item">
                                            <input type="radio" value="38">
                                            <label class="variant-label">10kg</label>
                                        </li>
                                        <li class="variant-item">
                                            <input type="radio" value="40">
                                            <label class="variant-label">12kg</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <form class="product-form" action="#">
                                <div class="product-form-buttons d-flex align-items-center justify-content-between mt-4">
                                    <button type="submit" class="position-relative btn-atc  loader">ADD TO CART</button>
                                   
                                </div>
                                <div class="buy-it-now-btn mt-2">
                                    <button type="submit" class="position-relative btn-atc btn-buyit-now">BUY IT NOW</button>
                                </div>
                            </form>                               
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- product tab start -->
        <div class="product-tab-section mt-100" data-aos="fade-up" data-aos-duration="700">
            <div class="container">
                <div class="tab-list product-tab-list">
                    <nav class="nav product-tab-nav">
                        <a class="product-tab-link tab-link active" href="#pdescription" data-bs-toggle="tab">Description</a>
                        <a class="product-tab-link tab-link" href="#pshipping" data-bs-toggle="tab">Shipping & Returns</a>
                        <a class="product-tab-link tab-link" href="#pstyle" data-bs-toggle="tab">Style with</a>
                    </nav>
                </div>
                <div class="tab-content product-tab-content">
                    <div id="pdescription" class="tab-pane fade show active">
                        <div class="row">
                            <div class="col-lg-7 col-md-12 col-12">
                                <div class="desc-content">
                                    <h4 class="heading_18 mb-3">What is lorem ipsum?</h4>
                                    <p class="text_16 mb-4">Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-12 col-12">
                                <div class="desc-img">
                                    <img src="{{url('asset/img/product.jpg')}}" alt="img">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="desc-content mt-4">
                                    <p class="text_16">Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="pshipping" class="tab-pane fade">
                        <div class="desc-content">
                            <h4 class="heading_18 mb-3">Returns within the European Union</h4>
                            <p class="text_16 mb-4">The European law states that when an order is being returned, it is mandatory for the company to refund the product price and shipping costs charged for the original shipment. Meaning: one shipping fee is paid by us.</p>
                            <p class="text_16 mb-4">Standard Shipping: If you placed an order using "standard shipping" and you want to return it, you will be refunded the product price and initial shipping costs. However, the return shipping costs will be paid by you.</p>
                            <p class="text_16">Free Shipping: If you placed an order using "free shipping" and you want to return it, you will be refunded the product price, but since we paid for the initial shipping, you will pay for the return.</p>
                        </div>
                    </div>
                    <div id="pstyle" class="tab-pane fade">
                        <div class="desc-content">
                            <h4 class="heading_18 mb-3">Style with</h4>
                            <p class="text_16 mb-4">Please also bear in mind that shipping goods back and forth generates greenhouse gases that are accelerating climate change. We encourage you to choose your items carefully to avoid unnecessary return shipments.</p>
                            <p class="text_16 mb-4">You have to pay for return shipping if you want to exchange your product for another size or the package is returned because it has not been picked up at the post office.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- product tab end -->
        
        <!-- you may also like start -->
        <div class="featured-collection-section mt-100 home-section overflow-hidden">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-heading">You may also like</h2>
                </div>

                <div class="product-container position-relative">
                    <div class="common-slider" data-slick='{
                    "slidesToShow": 4, 
                    "slidesToScroll": 1,
                    "dots": false,
                    "arrows": true,
                    "responsive": [
                    {
                        "breakpoint": 1281,
                        "settings": {
                        "slidesToShow": 3
                        }
                    },
                    {
                        "breakpoint": 768,
                        "settings": {
                        "slidesToShow": 2
                        }
                    }
                    ]
                }'>

                <div class="new-item" data-aos="fade-up" data-aos-duration="300">
                    <div class="product-card">
                        <div class="product-card-img">
                            <a class="hover-switch" href="javascript:void(0)">
                                <img class="primary-img" src="{{url('asset/img/products/product1.jpg')}}"
                                    alt="product-img">
                            </a>

                            <div class="product-card-action product-card-action-2">
                                <a href="{{url('product_details')}}" class="quickview-btn btn-primary"
                                    data-bs-toggle="modal">QUICKVIEW</a>
                                <a href="javascript:void(0)" class="addtocart-btn btn-primary">ADD TO CART</a>
                            </div>

                            <a href="wishlist.html" class="wishlist-btn card-wishlist">
                                <svg class="icon icon-wishlist" width="26" height="22" viewBox="0 0 26 22"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6.96429 0.000183105C3.12305 0.000183105 0 3.10686 0 6.84843C0 8.15388 0.602121 9.28455 1.16071 10.1014C1.71931 10.9181 2.29241 11.4425 2.29241 11.4425L12.3326 21.3439L13 22.0002L13.6674 21.3439L23.7076 11.4425C23.7076 11.4425 26 9.45576 26 6.84843C26 3.10686 22.877 0.000183105 19.0357 0.000183105C15.8474 0.000183105 13.7944 1.88702 13 2.68241C12.2056 1.88702 10.1526 0.000183105 6.96429 0.000183105ZM6.96429 1.82638C9.73912 1.82638 12.3036 4.48008 12.3036 4.48008L13 5.25051L13.6964 4.48008C13.6964 4.48008 16.2609 1.82638 19.0357 1.82638C21.8613 1.82638 24.1429 4.10557 24.1429 6.84843C24.1429 8.25732 22.4018 10.1584 22.4018 10.1584L13 19.4036L3.59821 10.1584C3.59821 10.1584 3.14844 9.73397 2.69866 9.07411C2.24888 8.41426 1.85714 7.55466 1.85714 6.84843C1.85714 4.10557 4.13867 1.82638 6.96429 1.82638Z"
                                        fill="black" />
                                </svg>
                            </a>
                        </div>
                        <div class="product-card-details text-center">
                            <h3 class="product-card-title"><a href="javascript:void(0)">black backpack</a>
                            </h3>
                            <div class="product-card-price">
                                <span class="card-price-regular">$1529</span>
                                <span class="card-price-compare text-decoration-line-through">$1759</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="new-item" data-aos="fade-up" data-aos-duration="300">
                    <div class="product-card">
                        <div class="product-card-img">
                            <a class="hover-switch" href="javascript:void(0)">
                                <img class="primary-img" src="{{url('asset/img/products/product1.jpg')}}"
                                    alt="product-img">
                            </a>

                            <div class="product-card-action product-card-action-2">
                                <a href="{{url('product_details')}}" class="quickview-btn btn-primary"
                                    data-bs-toggle="modal">QUICKVIEW</a>
                                <a href="javascript:void(0)" class="addtocart-btn btn-primary">ADD TO CART</a>
                            </div>

                            <a href="wishlist.html" class="wishlist-btn card-wishlist">
                                <svg class="icon icon-wishlist" width="26" height="22" viewBox="0 0 26 22"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6.96429 0.000183105C3.12305 0.000183105 0 3.10686 0 6.84843C0 8.15388 0.602121 9.28455 1.16071 10.1014C1.71931 10.9181 2.29241 11.4425 2.29241 11.4425L12.3326 21.3439L13 22.0002L13.6674 21.3439L23.7076 11.4425C23.7076 11.4425 26 9.45576 26 6.84843C26 3.10686 22.877 0.000183105 19.0357 0.000183105C15.8474 0.000183105 13.7944 1.88702 13 2.68241C12.2056 1.88702 10.1526 0.000183105 6.96429 0.000183105ZM6.96429 1.82638C9.73912 1.82638 12.3036 4.48008 12.3036 4.48008L13 5.25051L13.6964 4.48008C13.6964 4.48008 16.2609 1.82638 19.0357 1.82638C21.8613 1.82638 24.1429 4.10557 24.1429 6.84843C24.1429 8.25732 22.4018 10.1584 22.4018 10.1584L13 19.4036L3.59821 10.1584C3.59821 10.1584 3.14844 9.73397 2.69866 9.07411C2.24888 8.41426 1.85714 7.55466 1.85714 6.84843C1.85714 4.10557 4.13867 1.82638 6.96429 1.82638Z"
                                        fill="black" />
                                </svg>
                            </a>
                        </div>
                        <div class="product-card-details text-center">
                            <h3 class="product-card-title"><a href="javascript:void(0)">lady handbag</a>
                            </h3>
                            <div class="product-card-price">
                                <span class="card-price-regular">$529</span>
                                <span class="card-price-compare text-decoration-line-through">$759</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="new-item" data-aos="fade-up" data-aos-duration="300">
                    <div class="product-card">
                        <div class="product-card-img">
                            <a class="hover-switch" href="javascript:void(0)">
                                <img class="primary-img" src="{{url('asset/img/products/product1.jpg')}}"
                                    alt="product-img">
                            </a>

                            <div class="product-card-action product-card-action-2">
                                <a href="{{url('product_details')}}" class="quickview-btn btn-primary"
                                    data-bs-toggle="modal">QUICKVIEW</a>
                                <a href="javascript:void(0)" class="addtocart-btn btn-primary">ADD TO CART</a>
                            </div>

                            <a href="wishlist.html" class="wishlist-btn card-wishlist">
                                <svg class="icon icon-wishlist" width="26" height="22" viewBox="0 0 26 22"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6.96429 0.000183105C3.12305 0.000183105 0 3.10686 0 6.84843C0 8.15388 0.602121 9.28455 1.16071 10.1014C1.71931 10.9181 2.29241 11.4425 2.29241 11.4425L12.3326 21.3439L13 22.0002L13.6674 21.3439L23.7076 11.4425C23.7076 11.4425 26 9.45576 26 6.84843C26 3.10686 22.877 0.000183105 19.0357 0.000183105C15.8474 0.000183105 13.7944 1.88702 13 2.68241C12.2056 1.88702 10.1526 0.000183105 6.96429 0.000183105ZM6.96429 1.82638C9.73912 1.82638 12.3036 4.48008 12.3036 4.48008L13 5.25051L13.6964 4.48008C13.6964 4.48008 16.2609 1.82638 19.0357 1.82638C21.8613 1.82638 24.1429 4.10557 24.1429 6.84843C24.1429 8.25732 22.4018 10.1584 22.4018 10.1584L13 19.4036L3.59821 10.1584C3.59821 10.1584 3.14844 9.73397 2.69866 9.07411C2.24888 8.41426 1.85714 7.55466 1.85714 6.84843C1.85714 4.10557 4.13867 1.82638 6.96429 1.82638Z"
                                        fill="black" />
                                </svg>
                            </a>
                        </div>
                        <div class="product-card-details text-center">
                            <h3 class="product-card-title"><a href="javascript:void(0)">men travel bag</a>
                            </h3>
                            <div class="product-card-price">
                                <span class="card-price-regular">$529</span>
                                <span class="card-price-compare text-decoration-line-through">$759</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="new-item" data-aos="fade-up" data-aos-duration="300">
                    <div class="product-card">
                        <div class="product-card-img">
                            <a class="hover-switch" href="javascript:void(0)">
                                <img class="primary-img" src="{{url('asset/img/products/product1.jpg')}}"
                                    alt="product-img">
                            </a>

                            <div class="product-card-action product-card-action-2">
                                <a href="{{url('product_details')}}" class="quickview-btn btn-primary"
                                    data-bs-toggle="modal">QUICKVIEW</a>
                                <a href="javascript:void(0)" class="addtocart-btn btn-primary">ADD TO CART</a>
                            </div>

                            <a href="wishlist.html" class="wishlist-btn card-wishlist">
                                <svg class="icon icon-wishlist" width="26" height="22" viewBox="0 0 26 22"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6.96429 0.000183105C3.12305 0.000183105 0 3.10686 0 6.84843C0 8.15388 0.602121 9.28455 1.16071 10.1014C1.71931 10.9181 2.29241 11.4425 2.29241 11.4425L12.3326 21.3439L13 22.0002L13.6674 21.3439L23.7076 11.4425C23.7076 11.4425 26 9.45576 26 6.84843C26 3.10686 22.877 0.000183105 19.0357 0.000183105C15.8474 0.000183105 13.7944 1.88702 13 2.68241C12.2056 1.88702 10.1526 0.000183105 6.96429 0.000183105ZM6.96429 1.82638C9.73912 1.82638 12.3036 4.48008 12.3036 4.48008L13 5.25051L13.6964 4.48008C13.6964 4.48008 16.2609 1.82638 19.0357 1.82638C21.8613 1.82638 24.1429 4.10557 24.1429 6.84843C24.1429 8.25732 22.4018 10.1584 22.4018 10.1584L13 19.4036L3.59821 10.1584C3.59821 10.1584 3.14844 9.73397 2.69866 9.07411C2.24888 8.41426 1.85714 7.55466 1.85714 6.84843C1.85714 4.10557 4.13867 1.82638 6.96429 1.82638Z"
                                        fill="black" />
                                </svg>
                            </a>
                        </div>
                        <div class="product-card-details text-center">
                            <h3 class="product-card-title"><a href="javascript:void(0)">nike legend
                                    stripe</a>
                            </h3>
                            <div class="product-card-price">
                                <span class="card-price-regular">$529</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="new-item" data-aos="fade-up" data-aos-duration="300">
                    <div class="product-card">
                        <div class="product-card-img">
                            <a class="hover-switch" href="javascript:void(0)">
                                <img class="primary-img" src="{{url('asset/img/products/product1.jpg')}}"
                                    alt="product-img">
                            </a>

                            <div class="product-card-action product-card-action-2">
                                <a href="{{url('product_details')}}" class="quickview-btn btn-primary"
                                    data-bs-toggle="modal">QUICKVIEW</a>
                                <a href="javascript:void(0)" class="addtocart-btn btn-primary">ADD TO CART</a>
                            </div>

                            <a href="wishlist.html" class="wishlist-btn card-wishlist">
                                <svg class="icon icon-wishlist" width="26" height="22" viewBox="0 0 26 22"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6.96429 0.000183105C3.12305 0.000183105 0 3.10686 0 6.84843C0 8.15388 0.602121 9.28455 1.16071 10.1014C1.71931 10.9181 2.29241 11.4425 2.29241 11.4425L12.3326 21.3439L13 22.0002L13.6674 21.3439L23.7076 11.4425C23.7076 11.4425 26 9.45576 26 6.84843C26 3.10686 22.877 0.000183105 19.0357 0.000183105C15.8474 0.000183105 13.7944 1.88702 13 2.68241C12.2056 1.88702 10.1526 0.000183105 6.96429 0.000183105ZM6.96429 1.82638C9.73912 1.82638 12.3036 4.48008 12.3036 4.48008L13 5.25051L13.6964 4.48008C13.6964 4.48008 16.2609 1.82638 19.0357 1.82638C21.8613 1.82638 24.1429 4.10557 24.1429 6.84843C24.1429 8.25732 22.4018 10.1584 22.4018 10.1584L13 19.4036L3.59821 10.1584C3.59821 10.1584 3.14844 9.73397 2.69866 9.07411C2.24888 8.41426 1.85714 7.55466 1.85714 6.84843C1.85714 4.10557 4.13867 1.82638 6.96429 1.82638Z"
                                        fill="black" />
                                </svg>
                            </a>
                        </div>
                        <div class="product-card-details text-center">
                            <h3 class="product-card-title"><a href="javascript:void(0)">nike legend
                                    stripe</a>
                            </h3>
                            <div class="product-card-price">
                                <span class="card-price-regular">$529</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="new-item" data-aos="fade-up" data-aos-duration="300">
                    <div class="product-card">
                        <div class="product-card-img">
                            <a class="hover-switch" href="javascript:void(0)">
                                <img class="primary-img" src="{{url('asset/img/products/product1.jpg')}}"
                                alt="product-img">
                            </a>

                            <div class="product-card-action product-card-action-2">
                                <a href="{{url('product_details')}}" class="quickview-btn btn-primary"
                                    data-bs-toggle="modal">QUICKVIEW</a>
                                <a href="javascript:void(0)" class="addtocart-btn btn-primary">ADD TO CART</a>
                            </div>

                            <a href="wishlist.html" class="wishlist-btn card-wishlist">
                                <svg class="icon icon-wishlist" width="26" height="22" viewBox="0 0 26 22"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6.96429 0.000183105C3.12305 0.000183105 0 3.10686 0 6.84843C0 8.15388 0.602121 9.28455 1.16071 10.1014C1.71931 10.9181 2.29241 11.4425 2.29241 11.4425L12.3326 21.3439L13 22.0002L13.6674 21.3439L23.7076 11.4425C23.7076 11.4425 26 9.45576 26 6.84843C26 3.10686 22.877 0.000183105 19.0357 0.000183105C15.8474 0.000183105 13.7944 1.88702 13 2.68241C12.2056 1.88702 10.1526 0.000183105 6.96429 0.000183105ZM6.96429 1.82638C9.73912 1.82638 12.3036 4.48008 12.3036 4.48008L13 5.25051L13.6964 4.48008C13.6964 4.48008 16.2609 1.82638 19.0357 1.82638C21.8613 1.82638 24.1429 4.10557 24.1429 6.84843C24.1429 8.25732 22.4018 10.1584 22.4018 10.1584L13 19.4036L3.59821 10.1584C3.59821 10.1584 3.14844 9.73397 2.69866 9.07411C2.24888 8.41426 1.85714 7.55466 1.85714 6.84843C1.85714 4.10557 4.13867 1.82638 6.96429 1.82638Z"
                                        fill="black" />
                                </svg>
                            </a>
                        </div>
                        <div class="product-card-details text-center">
                            <h3 class="product-card-title"><a href="javascript:void(0)">nike legend
                                    stripe</a>
                            </h3>
                            <div class="product-card-price">
                                <span class="card-price-regular">$529</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="new-item" data-aos="fade-up" data-aos-duration="300">
                    <div class="product-card">
                        <div class="product-card-img">
                            <a class="hover-switch" href="javascript:void(0)">
                                <img class="primary-img" src="{{url('asset/img/products/product1.jpg')}}"
                                    alt="product-img">
                            </a>

                            <div class="product-card-action product-card-action-2">
                                <a href="{{url('product_details')}}" class="quickview-btn btn-primary"
                                    data-bs-toggle="modal">QUICKVIEW</a>
                                <a href="javascript:void(0)" class="addtocart-btn btn-primary">ADD TO CART</a>
                            </div>

                            <a href="wishlist.html" class="wishlist-btn card-wishlist">
                                <svg class="icon icon-wishlist" width="26" height="22" viewBox="0 0 26 22"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6.96429 0.000183105C3.12305 0.000183105 0 3.10686 0 6.84843C0 8.15388 0.602121 9.28455 1.16071 10.1014C1.71931 10.9181 2.29241 11.4425 2.29241 11.4425L12.3326 21.3439L13 22.0002L13.6674 21.3439L23.7076 11.4425C23.7076 11.4425 26 9.45576 26 6.84843C26 3.10686 22.877 0.000183105 19.0357 0.000183105C15.8474 0.000183105 13.7944 1.88702 13 2.68241C12.2056 1.88702 10.1526 0.000183105 6.96429 0.000183105ZM6.96429 1.82638C9.73912 1.82638 12.3036 4.48008 12.3036 4.48008L13 5.25051L13.6964 4.48008C13.6964 4.48008 16.2609 1.82638 19.0357 1.82638C21.8613 1.82638 24.1429 4.10557 24.1429 6.84843C24.1429 8.25732 22.4018 10.1584 22.4018 10.1584L13 19.4036L3.59821 10.1584C3.59821 10.1584 3.14844 9.73397 2.69866 9.07411C2.24888 8.41426 1.85714 7.55466 1.85714 6.84843C1.85714 4.10557 4.13867 1.82638 6.96429 1.82638Z"
                                        fill="black" />
                                </svg>
                            </a>
                        </div>
                        <div class="product-card-details text-center">
                            <h3 class="product-card-title"><a href="javascript:void(0)">women vanity
                                    bag</a>
                            </h3>
                            <div class="product-card-price">
                                <span class="card-price-regular">$529</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="new-item" data-aos="fade-up" data-aos-duration="300">
                    <div class="product-card">
                        <div class="product-card-img">
                            <a class="hover-switch" href="javascript:void(0)">
                                <img class="primary-img" src="{{url('asset/img/products/product1.jpg')}}"
                                    alt="product-img">
                            </a>

                            <div class="product-card-action product-card-action-2">
                                <a href="{{url('product_details')}}" class="quickview-btn btn-primary"
                                    data-bs-toggle="modal">QUICKVIEW</a>
                                <a href="javascript:void(0)" class="addtocart-btn btn-primary">ADD TO CART</a>
                            </div>

                            <a href="wishlist.html" class="wishlist-btn card-wishlist">
                                <svg class="icon icon-wishlist" width="26" height="22" viewBox="0 0 26 22"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6.96429 0.000183105C3.12305 0.000183105 0 3.10686 0 6.84843C0 8.15388 0.602121 9.28455 1.16071 10.1014C1.71931 10.9181 2.29241 11.4425 2.29241 11.4425L12.3326 21.3439L13 22.0002L13.6674 21.3439L23.7076 11.4425C23.7076 11.4425 26 9.45576 26 6.84843C26 3.10686 22.877 0.000183105 19.0357 0.000183105C15.8474 0.000183105 13.7944 1.88702 13 2.68241C12.2056 1.88702 10.1526 0.000183105 6.96429 0.000183105ZM6.96429 1.82638C9.73912 1.82638 12.3036 4.48008 12.3036 4.48008L13 5.25051L13.6964 4.48008C13.6964 4.48008 16.2609 1.82638 19.0357 1.82638C21.8613 1.82638 24.1429 4.10557 24.1429 6.84843C24.1429 8.25732 22.4018 10.1584 22.4018 10.1584L13 19.4036L3.59821 10.1584C3.59821 10.1584 3.14844 9.73397 2.69866 9.07411C2.24888 8.41426 1.85714 7.55466 1.85714 6.84843C1.85714 4.10557 4.13867 1.82638 6.96429 1.82638Z"
                                        fill="black" />
                                </svg>
                            </a>
                        </div>
                        <div class="product-card-details text-center">
                            <h3 class="product-card-title"><a href="javascript:void(0)">women large
                                    bag</a>
                            </h3>
                            <div class="product-card-price">
                                <span class="card-price-regular">$529</span>
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
                    <div class="activate-arrows show-arrows-always article-arrows arrows-white"></div>
                </div>
            </div>
        </div>
        <!-- you may also lik end -->
    </main>
@include('layouts.footer')     