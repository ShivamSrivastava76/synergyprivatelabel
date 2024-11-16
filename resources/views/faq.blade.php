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
                <li>Faq's</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb end -->

    <main id="MainContent" class="content-for-layout">
        <div class="faq-section mt-100 overflow-hidden">
            <div class="faq-inner">
                <div class="container">
                    <div class="section-header text-center">
                        <h2 class="section-heading">Frequently Asked Question</h2>
                        <p class="section-subheading">All your questions about Axion answered </p>
                    </div>
                    <div class="faq-container">
                        <div class="accordion" id="accordionExample">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                               How does it work?
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p> At Moxxpharma, we collaborate closely with you to develop custom formulations. From initial consultation to product development, testing and delivery by ensuring a seamless process, in terms to help you build the ebay brand.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                What products can I Private Label?
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                You can private label any of the products in our catalog.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                What are the minimum order quantities (MOQs)?
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                MOQs are 96 units per flavour per size per product (e.g. minimum 96 units of whey isolate chocolate 1 lb and minimum 96 units units of whey isolate vanilla 1lb).
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingFour">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                Do you service start up companies?
                                            </button>
                                        </h2>
                                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Yes. We provide throughout support to start-up from licensing, permissions by offering the shelf-ready products, our experts work closely with you to help you achieve your goals successfully..
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingFive">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                Is your facility licensed?
                                            </button>
                                        </h2>
                                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Yes. We are a fully licensed manufacturer and certified by fssai. 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingSeven">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                                How does label design work / what are my options?
                                            </button>
                                        </h2>
                                        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                For label design, you have one of two options: either you can provide the label from your end or let us design the one for you.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingEadth">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEadth" aria-expanded="false" aria-controls="collapseEadth">
                                               Can I send you containers to use? 
                                            </button>
                                        </h2>
                                        <div id="collapseEadth" class="accordion-collapse collapse" aria-labelledby="headingEadth" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                We only accept containers from facilities that are GMP-Certified. 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingNine">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                                Can you use my labels? 
                                            </button>
                                        </h2>
                                        <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Yes, we print labels of your choice whether it is of any shape, size, color. However, if there are any inaccuracies Moxxpharma is not liable for. For specific dimensions do contact us today.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTen">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                               What printing method is used for the labels? CMYK or RGB?
                                            </button>
                                        </h2>
                                        <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                We use CMYK printing.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingEleven">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                                              What type of containers do you have? What colors? 
                                            </button>
                                        </h2>
                                        <div id="collapseEleven" class="accordion-collapse collapse" aria-labelledby="headingEleven" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                We currently only use hard containers for online orders. They are available in capsule-size, 1/2 lb, 1 lb, 2 lbs, 5 lbs, and 11 lbs. Custom printed mylar bags are available in all sizes, however the bags have MOQs of 200 units per sku (we outsource this). The standard white colour we use is Pantone 11-4800.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingtwelve">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsetwelve" aria-expanded="false" aria-controls="collapsetwelve">
                                              Do you do custom formulas?
                                            </button>
                                        </h2>
                                        <div id="collapsetwelve" class="accordion-collapse collapse" aria-labelledby="headingtwelve" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                               Yes we do custom formulations. You can either send us a formula that you would like to create or you can describe to us features of a product you would like to have and our R&D department can produce it for you. Choosing this service can charge differently. 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingthirteen">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsethirteen" aria-expanded="false" aria-controls="collapsethirteen">
                                              Can I send you ingredients to use?
                                            </button>
                                        </h2>
                                        <div id="collapsethirteen" class="accordion-collapse collapse" aria-labelledby="headingthirteen" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                               Under GMP regulations, we cannot accept outside ingredients from a non-GMP Certified facility. The ingredients must be direct from the manufacturer and the packaging must not be tampered with.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingfourteen">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefourteen" aria-expanded="false" aria-controls="collapsefourteen">
                                              Do you ship worldwide?
                                            </button>
                                        </h2>
                                        <div id="collapsefourteen" class="accordion-collapse collapse" aria-labelledby="headingfourteen" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                               Yes, we ship worldwide right at your doorstep by ensuring the safe and timely delivery. 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="view-all text-center" data-aos="fade-up" data-aos-duration="700">
                            <a class="btn-primary" href="faq.html">SEE MORE</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>         
    </main>

@include('layouts.footer')   