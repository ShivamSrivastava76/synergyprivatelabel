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
                                        <a href="{{url('assets/images/products'.'/'.$products->image)}}" data-fancybox="gallery">
                                            <img src="{{url('assets/images/products'.'/'.$products->image)}}" alt="img">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-details ps-lg-4">
                            <h2 class="product-title mb-3">{{$products->name}}</h2>
                            @if(isset($variation) != null && count($variation) > 0) 
                                <div class="product-variant-wrapper">
                                    <div class="product-variant product-variant-other">
                                        @foreach($variation  as $val)
                                            <strong class="label mb-1 d-block">{{$val->name}}:</strong>
                                            @php  $value = explode(",", $val->value); @endphp
                                            <ul class="variant-list list-unstyled d-flex align-items-center flex-wrap">
                                                @foreach($value as $item)
                                                    <li class="variant-item">
                                                        <input type="radio" value="34" >
                                                        <label class="variant-label">{{$item}}</label>
                                                    </li>
                                                @endforeach
                                            </ul>

                                        @endforeach
                                    </div>
                                </div>
                            @endif 
                            <div class="product-form-buttons d-flex align-items-center justify-content-between mt-4">
                                <button class="position-relative btn-atc loader" onclick="addtocart({{$products->id}})">ADD TO CART</button>
                            </div>
                            <div class="buy-it-now-btn mt-2">
                                <button class="position-relative btn-atc btn-buyit-now">SEND ENQUIRY NOW</button>
                            </div>                            
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
                    </nav>
                </div>
                <div class="tab-content product-tab-content">
                    <div id="pdescription" class="tab-pane fade show active">
                        <div class="row">
                            {{$products->description}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- product tab end -->
        @if(isset($subcategories) != null && count($subcategories) > 0)
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
                        @foreach($subcategories as $val)
                            @foreach($val->products as $item)
                                <div class="new-item" data-aos="fade-up" data-aos-duration="300">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            <a class="hover-switch" href="{{url('product_details/'.$item->id)}}">
                                                <img class="primary-img" src="{{url('/assets/images/products/'.$item->image)}}"
                                                    alt="product-img">
                                            </a>

                                            <div class="product-card-action product-card-action-2">
                                                <a href="{{url('product_details/'.$item->id)}}" class="quickview-btn btn-primary">QUICKVIEW</a>
                                                <a class="addtocart-btn btn-primary" onclick="addtocart({{$item->id}})">ADD TO CART</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                    <div class="activate-arrows show-arrows-always article-arrows arrows-white"></div>
                </div>
            </div>
            <!-- you may also lik end -->
        @endif
    </main>
@include('layouts.footer')     