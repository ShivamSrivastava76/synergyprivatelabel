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
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
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
                                <button class="position-relative btn-atc btn-buyit-now" data-bs-toggle="modal" data-bs-target="#exampleModal" >SEND ENQUIRY NOW</button>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enquiry Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{url('enquiry')}}" method="post">
            @csrf
            <input type="hidden" name="product_id" value="{{$products->id}}">
            <div class="form-group mb-4">
                <label for="first_name" class="mb-2">First Name:</label>
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter your First Name">
            </div>
            <div class="form-group mb-4">
                <label for="last_name" class="mb-2">Last Name:</label>
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter your Last Name">
            </div>
            <div class="form-group mb-4">
                <label for="email" class="mb-2">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email">
            </div>
            <div class="form-group mb-4">
                <label for="phone" class="mb-2">Phone:</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone number">
            </div>
            <div class="form-group mb-4">
                <input class="form-check-input" type="checkbox" id="customiable" name="customiable"  onclick="customiable_formula()">
                <label class="form-check-label" for="customiable">Customiable</label>
            </div>
            <div class="form-group mb-4" id="formula" style="display:none">
                <label for="formula_customiable" class="mb-2">Formula:</label>
                <input type="text" class="form-control" id="formula_customiable" name="formula" placeholder="Enter your Formula">
            </div>
            <button type="submit" class="btn btn-primary">Send Enquiry</button>
        </form>
                        
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> 
      </div> -->
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
                            {!! $products->description !!}
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
    <script>
        counts = 0
        function customiable_formula()
        {
            if(counts == 0)
            {
                counts = 1;
                $('#formula').show();
            }
            else
            {
                counts = 0;
                $('#formula').hide();
            }
        }
    </script>

                            
@include('layouts.footer')     