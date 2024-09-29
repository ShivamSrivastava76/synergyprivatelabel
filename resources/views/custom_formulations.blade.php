@include('layouts.app')
@include('layouts.navBar')
    <!-- breadcrumb start -->
    <div class="breadcrumb innerpagebanner" style="background-image: url({{url('asset/img/banner1.jpg')}});">
        <div class="container">
            <h2 class="text-white">Custom Formulations</h2>
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
                <li>Custom Formulations</li>
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
                            <h3 class="text-center">Custom Formulations</h3>
                            <p>We at Moxxpharma creates a unique tailored product formulas especially designed to meet your specific needs and requirements. We formulate a product from scratch or modify the existing one to fulfill the specific requirements, objectives and preferences of the brand or clients. We are a team of experts in custom formulations which ensures the best-quality product that reflects your brand’s unique identity.</p>
                            <h4>FAQs </h4>
                            <h5>Q1: How to order?</h5>
                            <p>It is very simple to order, you can simply reach out to us via our contact or email. Our team works closely with you to understand your specific requirements and ensure the timely delivery by providing you with a track of delivery and packaging. </p>

                            <h5>Q2: How much does it cost? </h5>
                            <p>The cost of custom formulations depends upon the type of product i.e. supplement, capsules or more you order, the ingredients used and quantities required. </p>

                            <h5>Q3: Do you provide worldwide? </h5>
                            <p>Yes, we ship our products worldwide and we are well-known for our quality and safe delivery wherever you are, we can also deliver your custom formulations at your doorstep. We deliver products that are shelf ready and best quality ingredients used.  </p>

                            <h5>Q4: Do you provide product licensing?</h5>
                            <p>Yes, we offer product licensing options for all our clients, we help you throughout your business process, by getting the permissions on business, by teaching you more about sales and handling the customers. </p>

                        </div>
                    </div>
                    </div>
                </div>
        </div>
    </main>
@include('layouts.footer')