@include('layouts.app')
@include('layouts.navBar')
    <!-- breadcrumb start -->
    <div class="innerpagebanner py-4" >
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
                            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                <div class="cart-total-area checkout-summary-area pt-3">
                                    <h3 class="d-none d-lg-block mb-0 text-center heading_24 mb-4">Order summary</h3>
                                    @if(isset($addtocard) != null && count($addtocard) > 0)
                                        @foreach($addtocard as $indexs => $val)
                                            <div class="minicart-item d-flex">
                                                <div class="mini-img-wrapper">
                                                    @if(isset($val->products[0]->Image) != null &&  count($val->products[0]->Image) > 0)
                                                        <img class="mini-img" src="{{url('assets/images/products/150x150').'/'.$val->products[0]->Image[0]->image}}" alt="img">
                                                    @else
                                                        <img src="{{url('/asset/img/products/Moxx.jpg')}}" style="width:150px" class="card-img-top" alt="product">
                                                    @endif
                                                </div>
                                                <div class="product-info">
                                                    <a href="{{url('product-details').'/'.$val->products[0]->slug}}" >
                                                        <h2 class="product-title">{{$val->products[0]->name}}</h2>    
                                                    </a>
                                                    <div class="d-flex justify-content-between">
                                                        <div class="product-variant-wrapper d-flex">
                                                            <div class="form-check d-flex mt-2">
                                                                <input class="form-check-input me-2" type="checkbox" id="flexCheckDefault{{$val->id}}" name="customiables[]" onclick="customiable({{$val->id}})" >
                                                                <label class="form-check-label" for="flexCheckDefault{{$val->id}}">
                                                                    Custom
                                                                </label>
                                                            </div>
                                                            <textarea class="ms-2" type="text" id="CustomProduct{{$val->id}}" name="customiable[]" placeholder="Custom Product" style="display:none" ></textarea>
                                                        </div>
                                                        @if($val->value != null)
                                                            <div class="product-variant product-variant-other ms-4  d-flex align-items-center flex-wrap">
                                                                @php 
                                                                    $key = explode(",", $val->Key);
                                                                    $value = explode(",", $val->value);
                                                                    $indices = explode(",", $val->indices);
                                                                    $custom = explode(",", $val->custom);
                                                                    $c = 0;
                                                                @endphp
                                                                @foreach($value as $index => $vals)
                                                                    @if($vals == "other")
                                                                        <label class="variant-label">{{ $custom[$c] ?? '' }}</label>
                                                                        @php $c++ @endphp
                                                                    @else
                                                                        <label class="variant-label">{{$vals}}</label>
                                                                    @endif
                                                                @endforeach
                                                                <!-- <label class="variant-label">Box</label>
                                                                <label class="variant-label">Mango</label> -->
                                                               
                                                            </div>
                                                        @endif
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-5 cursoer" x="0px" y="0px" width="35" height="35" viewBox="0 0 30 30" onclick="del({{$val->id}})">
                                                            <path d="M 14.984375 2.4863281 A 1.0001 1.0001 0 0 0 14 3.5 L 14 4 L 8.5 4 A 1.0001 1.0001 0 0 0 7.4863281 5 L 6 5 A 1.0001 1.0001 0 1 0 6 7 L 24 7 A 1.0001 1.0001 0 1 0 24 5 L 22.513672 5 A 1.0001 1.0001 0 0 0 21.5 4 L 16 4 L 16 3.5 A 1.0001 1.0001 0 0 0 14.984375 2.4863281 z M 6 9 L 7.7929688 24.234375 C 7.9109687 25.241375 8.7633438 26 9.7773438 26 L 20.222656 26 C 21.236656 26 22.088031 25.241375 22.207031 24.234375 L 24 9 L 6 9 z"></path>
                                                        </svg>  
                                                    </div>
                                                </div>
                                            </div> 
                                        @endforeach
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <button class="checkout-page-btn btn-primary">Next</button>
                                        </div>
                                    @else
                                        <p>No Product added in your cart</p>
                                    @endif
                                </div>
                            </div>    
                        </div>
                        
                       
                    </form>
                </div>
            </div>
        </div>            
    </main>
@include('layouts.footer')  