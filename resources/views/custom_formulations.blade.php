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
                            <h4>FAQs - Custom Formulations</h4>
                            <h5>How does it work?</h5>
                            <p>We can create (almost) any product you would like to make. To begin, contact us, and include "Custom Formulation" in the Subject. Include in the email a complete formula that you would like to have produced.</p>

                            <h5>How much does it cost?</h5>
                            <p>We quote your formula based on the raw ingredient prices per container, plus the cost of the container, scoop, silica pack, label design, label printing, labour, and shipping. In other words, we provide you with a cost per unit all-in.</p>

                            <h5>What are the minimum order quantities (MOQs)? Minimum order size?</h5>
                            <p>MOQs are 200 units per SKU (per product, per flavour, per size). Minimum order size is $10,000.00 CAD per order before taxes, shipping, or any other fees.</p>

                            <h5>How does the R&D work? How much does R&D cost?</h5>
                            <p>We have a fully-staffed in-house lab that will meet all your R&D needs, including formulation, testing, flavouring, etc. Our R&D lab charges $500.00 CAD plus tax per 5 hour block of time. Payments are charged prior to any R&D being completed. </p>

                            <h5>What is the turnaround time?</h5>
                            <p>Turnaround time on custom formulations is an average of six months from first contact to final production. Delays are largely dependant on communication delays. If you are applying for product licensing, we are at they mercy of Health Canada's timelines. </p>

                            <h5>Do you provided product licensing services? How much does it cost?</h5>

                            <p>Yes, we can help you with product licensing (NPNs). We do not perform the services ourself but we can put you in contact with some of the best in the country that work on product licensing. You will pay them directly and we take no profit or "finder's fee".</p>

                            <p>If you have any other questions, contact us.</p>
                        </div>
                    </div>
                    </div>
                </div>
        </div>
    </main>
@include('layouts.footer')