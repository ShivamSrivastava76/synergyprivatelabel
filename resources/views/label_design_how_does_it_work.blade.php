@include('layouts.app')
@include('layouts.navBar')
    <!-- breadcrumb start -->
    <div class="breadcrumb innerpagebanner" style="background-image: url({{url('asset/img/banner1.jpg')}});">
        <div class="container">
            <h2 class="text-white">How does it work</h2>
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
                <li>How does it work</li>
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
                            <div class="innerMainTitle">
                                <h3 class="text-center">Label design how does it work</h3>
                                <p>At Synergy, you have two options to build your brand: (1) Use your own label, or (2) Have our in-house design team create a label for you. </p>
                            </div>
                            

                            <h5>Option 1: Use Your Own Label</h5>
                            <p>If you are designing your own label (or are outsourcing it), follow these steps:</p>
                            <ol>
                            <li>Select the type and size of your product(s)</li>
                            <li>Build a template on Illustrator or Photoshop using the dielines of the container size you are going to use </li>
                            <li>Use the Nutrition Facts and Amino Acid Profile (where applicable)</li>
                            <li>Copy and paste the text from the product page, including Instructions, Potential Side Effects, Warnings, and Allergen Warnings. If you have any questions about designing your own label, contact us.</li>
                            <li>When your label is complete, pay for your order, and send your label(s) to us.</li>
                            <li>Get creative and have fun!</li>
                            </ol>
                            <p><strong>NOTE:</strong> If you already have a label designed, skip steps 1-4 and send us your label. </p>
                            
                            <h5>Option 2: We Design Your Label</h5>
                            
                            <p>We offer complimentary label design services. To get a label designed by us, follow these steps:</p>
                            <ol>
                            <li>Select your product(s)</li>
                            <li>Check out and pay for your order</li>
                            <li>Within 24 hours of your order being placed, one of our design experts will reach out to you. We will collect information about the label style, fonts, colours, etc. and ask you to send us inspiration pictures of what you would like your product to look like.</li>
                            <li>Once your design expert has created a rendition of your label, they will send it to you. You will get three opportunities to make adjustments (any additional changes will be subject to a charge). </li>
                            <li>Once your label is finalized, we will print your labels, package your product, and ship it out to you!</li>
                            </ol>

                            <div class="workFaq">
                            <h4>FAQ's</h4>

                            <h5>What printing method is used for the labels? CMYK or RGB?</h5>
                            <p>We use CMYK printing.</p>
                            <h5>What type of containers do you have? What colours? </h5>
                            <p>We currently only use hard containers for online orders. They are available in capsule-size, 1/2 lb, 1 lb, 2 lbs, 5 lbs, and 11 lbs. Custom printed mylar bags are available in all sizes, however the bags have MOQs of 2000 units per sku (we outsource this).</p>
                            <p>The standard white colour we use is Pantone 11-4800.</p>
                            </div>

                        </div>
                    </div>
                    </div>
                </div>
        </div>
    </main>
@include('layouts.footer')