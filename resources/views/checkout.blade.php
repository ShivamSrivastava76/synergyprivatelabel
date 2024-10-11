@include('layouts.app')
@include('layouts.navBar')
    <!-- breadcrumb start -->
    <div class="breadcrumb innerpagebanner" style="background-image: url({{url('asset/img/banner1.jpg')}});">
        <div class="container">
            <h2 class="text-white">Checkout</h2>
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
                <li>Checkout</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb end -->
    <main id="MainContent" class="content-for-layout">
        <div class="checkout-page mt-100">
            <div class="container">
                <div class="checkout-page-wrapper">
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
                    <form action="{{url('enquiry')}}" method="post" >
                        @csrf
                        <div class="row">
                            <div class="col-xl-8 col-lg-8 col-md-8 col-12">
                                <div class="cart-total-area checkout-summary-area pt-3">
                                    <h3 class="d-none d-lg-block mb-0 text-center heading_24 mb-4">Order summary</h3>
                                    @if(isset($addtocard) != null && count($addtocard) > 0)
                                        @foreach($addtocard as $indexs => $val)
                                            <div class="minicart-item d-flex">
                                                <div class="mini-img-wrapper">
                                                    <img class="mini-img" src="{{ url('asset/img/products/product1.jpg')}}" alt="img">
                                                </div>
                                                <div class="product-info">
                                                    <h2 class="product-title">{{$val->products[0]->name}}</h2>    
                                                    <div class="d-flex justify-content-between">
                                                        <div class="product-variant-wrapper d-flex">
                                                            <div class="form-check d-flex mt-2">
                                                                <input class="form-check-input me-2" type="checkbox" id="flexCheckDefault{{$val->id}}" name="customiables[]" onclick="customiable({{$val->id}})" >
                                                                <label class="form-check-label" for="flexCheckDefault{{$val->id}}">
                                                                    Custom
                                                                </label>
                                                            </div>
                                                            <input class="ms-2" type="text" id="CustomProduct{{$val->id}}" name="customiable[]" placeholder="Custom Product" style="display:none"/>
                                                        </div>

                                                        <div class="product-variant product-variant-other ms-4  d-flex align-items-center flex-wrap">
                                                            @php 
                                                                $key = explode(",", $val->Key);
                                                                $value = explode(",", $val->value);
                                                                $indices = explode(",", $val->indices);
                                                                $custom = explode(",", $val->custom);
                                                                $c = 0;
                                                            @endphp
                                                            @foreach($value as $index => $val)
                                                                @if($val == "other")
                                                                    <label class="variant-label">{{ $custom[$c] ?? '' }}</label>
                                                                    @php $c++ @endphp
                                                                @else
                                                                    <label class="variant-label">{{$val}}</label>
                                                                @endif
                                                            @endforeach
                                                            <!-- <label class="variant-label">Box</label>
                                                            <label class="variant-label">Mango</label> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <p>No Product added in your cart</p>
                                    @endif
                                </div>
                            </div>    
                            <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                <div class="shipping-address-area mt-0">
                                    <h2 class="shipping-address-heading pb-1">Personal Details</h2>
                                    <div class="shipping-address-form-wrapper">
                                        
                                        <div class="shipping-address-form common-form">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <fieldset>
                                                        <label class="label">First name</label>
                                                        <input type="text" name="first_name"  />
                                                        <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <fieldset>
                                                        <label class="label">Last name</label>
                                                        <input type="text" name="last_name" required/>
                                                        <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <fieldset>
                                                        <label class="label">Email address</label>
                                                        <input type="email" name="email" required/>
                                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <fieldset>
                                                        <label class="label">Phone number</label>
                                                        <input type="number" name="phone" required/>
                                                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <fieldset>
                                                        <label class="label">Company</label>
                                                        <input type="text"  name="company"/>
                                                        <x-input-error :messages="$errors->get('company')" class="mt-2" />
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <fieldset>
                                                        <label class="label">Password</label>
                                                        <input type="password"  name="password"/>
                                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <fieldset>
                                                        <label class="label">Confirm Password</label>
                                                        <input type="password"  name="password_confirmation"/>
                                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="shipping-address-area billing-area">
                                    <div class="minicart-btn-area d-flex align-items-center justify-content-center flex-wrap">
                                        <!-- <a href="cart.html" class="checkout-page-btn minicart-btn btn-secondary">BACK TO CART</a> -->
                                        <button class="checkout-page-btn minicart-btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    </form>
                </div>
            </div>
        </div>            
    </main>
@include('layouts.footer')  