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
                <li>Term and Conditions</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb end -->

    <main id="MainContent" class="content-for-layout">
        <div class="contact-page">
                <div class="container">
                    <div class="row">
                    <div class="col-md-12">
                        <div class="detailsCont">
                            <h3 class="text-center">Terms and Conditions</h3>

                            <!--<h5>Returns & Refunds </h5>-->
                            <p>We provide the best products using high-quality materials and due to the nature of the contract ,manufacturing industry under which all orders are created and procured on a custom basis. The custom formulation does not allow us to offer the refund and return service under any circumstances. Under the GMP compliance, we do not accept the product back in our faculty.  </p>
                        </div>
                    </div>
                    </div>
                </div>
        </div>
    </main>
@include('layouts.footer')