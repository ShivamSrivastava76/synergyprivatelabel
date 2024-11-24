@include('layouts.app')
@include('layouts.navBar')
  
    <!-- breadcrumb start -->
    <div class="innerpagebanner py-4">
        <div class="container">
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
                <li>{{$products->name}}</li>
            </ul>
        </div>
    </div>


    <!-- breadcrumb end -->
    <main id="MainContent" class="content-for-layout">
        <div class="product-page mt-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-gallery product-gallery-vertical d-flex">
                        @if(isset($products->Image) && count($products->Image) > 0)
                                <div class="product-img-large">
                                    <div class="img-large-slider common-slider" data-slick='{
                                        "slidesToShow": 1, 
                                        "slidesToScroll": 1,
                                        "dots": false,
                                        "arrows": false,
                                        "asNavFor": ".img-thumb-slider"
                                    }'>
                                        @foreach($products->Image as  $image)
                                            <div class="img-large-wrapper">
                                                <a href="{{url('assets/images/products/1500x1500').'/'.$image->image}}" data-fancybox="gallery">
                                                    <img src="{{url('assets/images/products/500x500').'/'.$image->image}}" alt="img">
                                                </a>
                                            </div>
                                        @endforeach
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
                                        @foreach($products->Image as  $image)
                                            <div>
                                                <div class="img-thumb-wrapper">
                                                    <img src="{{url('assets/images/products/150x150').'/'.$image->image}}"  alt="img">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="activate-arrows show-arrows-always arrows-white d-none d-lg-flex justify-content-between mt-3"></div>
                                </div>
                            @else
                                <img src="{{url('/asset/img/products/Moxx.jpg')}}" alt="img">
                            @endif
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
                                            @php  $key_val = []; $val_key = []; @endphp
                                            @foreach($variation as $keys => $val)
                                                @if($val->name != null) 
                                                    <strong class="label mb-1 d-block">{{ $val->name }}:</strong>
                                                    @php  
                                                        $value = explode(",", $val->value);  
                                                    @endphp
                                                    <select class="form-select" id="{{ str_replace(' ', '_', $val->name) }}" onchange="change('{{ str_replace(' ', '_', $val->name) }}')">
                                                        @foreach($value as $key => $item)
                                                            @php 
                                                                if (!isset($val_key[$keys])) {  
                                                                    $val_key[$keys] = $item;  
                                                                }
                                                            @endphp
                                                            <option value="{{ $item }}">{{ $item }}</option>
                                                        @endforeach
                                                        <option value="Other">Other</option>
                                                    </select>
                                                    <input type="text" class="form-control my-3" id="{{ str_replace(' ', '_', $val->name) }}1" style="display:none"/>
                                                    @php 
                                                        $key_val[$keys] = str_replace(' ', '_', $val->name); 
                                                    @endphp
                                                @endif
                                            @endforeach
                                    </div>
                                </div>
                                <input type="hidden" id="key" class="" value="{{json_encode($key_val)}}" />
                                <input type="hidden" id="val"  value="{{json_encode($val_key)}}" />

                            @endif 
                            <div class="product-form-buttons d-flex align-items-center justify-content-between mt-4">
                                <button class="position-relative btn-atc loader" onclick="addtocart({{$products->id}})">ADD TO  ENQUIRY BUCKET
                                </button>
                            </div>
                            <div class="buy-it-now-btn mt-2">
                                <button class="position-relative btn-atc btn-buyit-now" data-bs-toggle="modal" data-bs-target="#exampleModal" >SEND ENQUIRY NOW</button>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Start -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Enquiry Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('enquiry')}}" method="post" class="row">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$products->id}}">
                            <div class="form-group mb-4 col-6">
                                <label for="first_name" class="mb-2">First Name:</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter your First Name">
                                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                            </div>
                            <div class="form-group mb-4 col-6">
                                <label for="last_name" class="mb-2">Last Name:</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter your Last Name">
                                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                            </div>
                            <div class="form-group mb-4 col-6">
                                <label for="email" class="mb-2">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div class="form-group mb-4 col-6">
                                <label for="phone" class="mb-2">Phone:</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone number">
                                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                            </div>
                            <div class="form-group mb-4 col-6">
                                <fieldset>
                                    <label  for="password" class="mb-2">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="********"/>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </fieldset>
                            </div>
                            <div class="form-group mb-4 col-6">
                                <fieldset>
                                    <label  for="password_confirmation" class="mb-2">Confirm Password</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="********"/>
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
                                </fieldset>
                            </div>
                            <div class="form-group mb-4 col-6">
                                <input class="form-check-input" type="checkbox" id="customiable" name="customiable"  onclick="customiable_formula()">
                                <label class="form-check-label" for="customiable">Customizable</label>
                            </div>
                            <div class="form-group mb-4" id="formula" style="display:none">
                                <label for="formula_customiable" class="mb-2">Formula:</label>
                                <textarea type="text" class="form-control" id="formula_customiable" name="formula" placeholder="Enter your Formula"></textarea>
                                <x-input-error :messages="$errors->get('formula_customiable')" class="mt-2" />
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Send Enquiry</button>
                        </form>            
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal End -->

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
                        <h2 class="section-heading text-center">More Products To Explore </h2>
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
                           
                                <div class="new-item" data-aos="fade-up" data-aos-duration="300">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            <a class="hover-switch" href="{{url('product-details/'.$val->slug)}}">
                                                @if($val->Image != null &&  count($val->Image) > 0)
                                                    <img class="primary-img" src="{{url('assets/images/products/500x500').'/'.$val->Image[0]->image}}" alt="product-img">
                                                @else
                                                    <img class="primary-img" src="{{url('/asset/img/products/Moxx.jpg')}}" alt="product-img">
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-card-details">
                                        <h3 class="product-card-title text-center"><a href="{{url('product-details/'.$val->slug)}}">{{$val->name}}</a></h3>
                                    </div>
                                </div>
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

        function change(name) 
        {
            let val = $("#" + name).val();
            if (val === "Other")
            {
                $("#" + name + '1').show();
                let keys = JSON.parse($("#key").val());
                let index = keys.findIndex(item => item === name);
                let vals = JSON.parse($("#val").val());
                if (index !== -1)
                    vals[index] = 'other';
                $("#val").val(JSON.stringify(vals));
            }
            else
            {
                $("#" + name + '1').hide();
                let keys = JSON.parse($("#key").val());
                let index = keys.findIndex(item => item === name);
                let vals = JSON.parse($("#val").val());
                if (index !== -1)
                    vals[index] = val;
                $("#val").val(JSON.stringify(vals));
            }
            
        }

    </script>

                            
@include('layouts.footer')     