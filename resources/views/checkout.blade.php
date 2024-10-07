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
                @if(isset($products) && $products->count() > 0)
                   
                    <form action="{{url('enquiry')}}" method="post" class="shipping-address-form common-form">
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
                            <div class="row">
                                <div class="col-xl-9 col-lg-8 col-md-12 col-12">
                                    <div class="section-header mb-3  d-flex justify-content-between">
                                        <h2 class="section-heading">Check out</h2>
                                        <a href="{{url('login')}}" class="edit-user btn-secondary">LOGIN</a>
                                        
                                    </div>
                                    <div class="shipping-address-area">
                                        <div class="shipping-address-form-wrapper">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <fieldset>
                                                        <label class="label">First name</label>
                                                        <input type="text" name="first_name" required />
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <fieldset>
                                                        <label class="label">Last name</label>
                                                        <input type="text" name="last_name" required/>
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <fieldset>
                                                        <label class="label">Email address</label>
                                                        <input type="email" name="email" required/>
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <fieldset>
                                                        <label class="label">Phone number</label>
                                                        <input type="number" name="phone" required/>
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <fieldset>
                                                        <label class="label">Company</label>
                                                        <input type="text"  name="company"/>
                                                    </fieldset>
                                                </div>
                                                <input type="hidden" name="product_id" value="{{ implode(',', $productIds) }}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-12 col-12">
                                    <div class="cart-total-area checkout-summary-area">
                                        <h3 class="d-none d-lg-block mb-0 text-center heading_24 mb-4">Order summary</h4>
                                        @foreach($products as $val)
                                            <div class="minicart-item d-flex">
                                                <div class="mini-img-wrapper">
                                                    @if($val->image != null || $val->image != '')
                                                        <img class="mini-img" src="{{url('assets/images/products').'/'.$val->image}}" alt="img">
                                                    @else
                                                        <img class="mini-img" src="{{url('asset/img/products/product1.jpg')}}" alt="img">
                                                    @endif
                                                </div>
                                                <div class="product-info">
                                                    <h2 class="product-title"><a >{{$val->name}}</a></h2>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="mt-4 checkout-promo-code">
                                            <input type="submit" class="btn-apply-code position-relative btn-secondary text-uppercase mt-3" />
                                                
                                            <!-- </buttton> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                @else
                    <!-- Show message if no products are in the cart -->
                    <p>{{ $message ?? 'No product in your cart' }}</p>
                @endif

            </div>
        </div>            
    </main>
@include('layouts.footer')  