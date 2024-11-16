@include('layouts.app')
@include('layouts.navBar')
    <main id="MainContent" class="content-for-layout">
        <!-- slideshow start -->
        <div class="slideshow-section position-relative">
            <div class="slideshow-active activate-slider" data-slick='{
                "slidesToShow": 1, 
                "slidesToScroll": 1, 
                "dots": true,
                "arrows": true,
                "responsive": [
                    {
                    "breakpoint": 768,
                    "settings": {
                        "arrows": false
                    }
                    }
                ]
            }'>
                <div class="slide-item slide-item-bag position-relative">
                    <img class="slide-img d-none d-md-block" src="{{url('asset/img/banner1.jpg')}}" alt="slide-1">
                    <img class="slide-img d-md-none" src="{{url('asset/img/banner1.jpg')}}" alt="slide-1">
                    <div class="content-absolute content-slide">
                        <div class="container height-inherit d-flex align-items-center justify-content-start">
                            <div class="content-box slide-content slide-content-3 py-4 text-left">
                                <h2 class="slide-heading heading_72 animate__animated animate__fadeInUp"
                                    data-animation="animate__animated animate__fadeInUp">
                                    Supplement Private Labeling
                                </h2>
                                <p class="slide-subheading heading_24 animate__animated animate__fadeInUp"
                                    data-animation="animate__animated animate__fadeInUp">
                                    Made Easy Products
                                </p>
                                <a class="btn-primary slide-btn slide-btn2 animate__animated animate__fadeInUp"
                                    href="{{url('products')}}" data-animation="animate__animated animate__fadeInUp">View Products</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slide-item slide-item-bag position-relative">
                    <img class="slide-img d-none d-md-block" src="{{url('asset/img/banner2.jpg')}}" alt="slide-2">
                    <img class="slide-img d-md-none" src="{{url('asset/img/banner2.jpg')}}" alt="slide-2">
                    <div class="content-absolute content-slide">
                        <div class="container height-inherit d-flex align-items-center justify-content-start">
                            <div class="content-box slide-content slide-content-3 py-4 text-left">
                                <h2 class="slide-heading heading_72 animate__animated animate__fadeInUp"
                                    data-animation="animate__animated animate__fadeInUp">
                                    Supplement Private Labeling
                                </h2>
                                <p class="slide-subheading heading_24 animate__animated animate__fadeInUp"
                                    data-animation="animate__animated animate__fadeInUp">
                                    Made Easy Products
                                </p>
                                <!-- <a class="btn-primary slide-btn slide-btn2 animate__animated animate__fadeInUp"
                                    href="#" data-animation="animate__animated animate__fadeInUp">SHOP  NOW
                                </a> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slide-item slide-item-bag position-relative">
                    <img class="slide-img d-none d-md-block" src="{{url('asset/img/banner3.jpg')}}" alt="slide-3">
                    <img class="slide-img d-md-none" src="{{url('asset/img/banner3.jpg')}}" alt="slide-3">
                    <div class="content-absolute content-slide">
                        <div class="container height-inherit d-flex align-items-center justify-content-start">
                            <div class="content-box slide-content slide-content-1 py-4 text-left">
                                <h2 class="slide-heading heading_72 animate__animated animate__fadeInUp"
                                    data-animation="animate__animated animate__fadeInUp">
                                    Supplement Private Labeling
                                </h2>
                                <p class="slide-subheading heading_24 animate__animated animate__fadeInUp"
                                    data-animation="animate__animated animate__fadeInUp">
                                    Made Easy Products
                                </p>
                                <!-- <a class="btn-primary slide-btn animate__animated animate__fadeInUp" href="javascript:void(0)"
                                    data-animation="animate__animated animate__fadeInUp">SHOP NOW
                                </a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="activate-arrows"></div>
            <div class="activate-dots dot-tools"></div>
        </div>
        <!-- slideshow end -->

        <!-- trusted badge start -->
        <div class="trusted-section mt-100 overflow-hidden">
            <div class="trusted-section-inner">
                <div class="container">
                    <div class="row justify-content-center trusted-row">
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="trusted-badge bg-4 rounded">
                                <div class="trusted-icon">
                                    <img class="icon-trusted" src="{{url('asset/img/trusted/4.png')}}" alt="icon-1">
                                </div>
                                <div class="trusted-content">
                                    <h2 class="heading_18 trusted-heading text-white">Quick &amp;  Timely delivery Guaranteed </h2>
                                    <p class="text_16 trusted-subheading trusted-subheading-3">On all order </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="trusted-badge bg-4 rounded">
                                <div class="trusted-icon">
                                    <img class="icon-trusted" src="{{url('asset/img/trusted/5.png')}}" alt="icon-2">
                                </div>
                                <div class="trusted-content">
                                    <h2 class="heading_18 trusted-heading text-white">Customer Support 24/7</h2>
                                    <p class="text_16 trusted-subheading trusted-subheading-3">Instant access to
                                        support</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="trusted-badge bg-4 rounded">
                                <div class="trusted-icon">
                                    <img class="icon-trusted" src="{{url('asset/img/trusted/6.png')}}" alt="icon-3">
                                </div>
                                <div class="trusted-content">
                                    <h2 class="heading_18 trusted-heading text-white">100% Secure Payment</h2>
                                    <p class="text_16 trusted-subheading trusted-subheading-3">We ensure secure  payment!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- trusted badge end -->

        <!-- latest blog start -->
        <div class="latest-blog-section mt-100 overflow-hidden home-section">
            <div class="latest-blog-inner">
                <div class="container">
                    <div class="section-header text-center">
                        <h2 class="section-heading primary-color">Our Services</h2>
                    </div>
                    <div class="article-card-container position-relative">
                        <div class="common-slider" data-slick='{
                            "slidesToShow": 3, 
                            "slidesToScroll": 1,
                            "dots": false,
                            "arrows": true,
                            "responsive": [
                                {
                                "breakpoint": 1281,
                                "settings": {
                                    "slidesToShow": 2
                                }
                                },
                                {
                                "breakpoint": 602,
                                "settings": {
                                    "slidesToShow": 1
                                }
                                }
                            ]
                        }'>

                            <div class="article-slick-item" data-aos="fade-up" data-aos-duration="700">
                                <div class="article-card bg-transparent p-0 shadow-none">
                                    <a class="article-card-img-wrapper" href="javascript:void(0)">
                                        <img src="{{url('asset/img/ser1.avif')}}" alt="img" class="article-card-img rounded">
                                    </a>
                                    <h2 class="article-card-heading heading_18">
                                        <a class="heading_18" href="javascript:void(0)">
                                            Private Labeling
                                        </a>
                                    </h2>
                                    <p>We have a huge range of products, over 100 products we design and print the
                                        labels.
                                        We do the best label designing, packaging and ship the products carefully-
                                        so your
                                        items arrive shelf-ready, so you can freely focus on sales.
                                    </p>
                                </div>
                            </div>

                            <div class="article-slick-item" data-aos="fade-up" data-aos-duration="700">
                                <div class="article-card bg-transparent p-0 shadow-none">
                                    <a class="article-card-img-wrapper" href="javascript:void(0)">
                                        <img src="{{url('asset/img/ser2.avif')}}" alt="img" class="article-card-img rounded">
                                    </a>
                                    <h2 class="article-card-heading heading_18">
                                        <a class="heading_18" href="javascript:void(0)">
                                            Bulk Purchase
                                        </a>
                                    </h2>
                                    <p>Looking to launch a new supplement product and worried about the packaging,
                                        labeling.
                                        You are at the right place, make a move and choose from our selection of
                                        products
                                        available in bulk in minutes.
                                    </p>
                                </div>
                            </div>
                            <div class="article-slick-item" data-aos="fade-up" data-aos-duration="700">
                                <div class="article-card bg-transparent p-0 shadow-none">
                                    <a class="article-card-img-wrapper" href="javascript:void(0)">
                                        <img src="{{url('asset/img/ser3.avif')}}" alt="img" class="article-card-img rounded">
                                    </a>
                                    <h2 class="article-card-heading heading_18">
                                        <a class="heading_18" href="javascript:void(0)">
                                            Custom Product Development
                                        </a>
                                    </h2>
                                    <p>We offer customization services, our team of experts schedule a consultation
                                        with you
                                        to create your ideas into reality in our huge laboratory space, tailored to
                                        meet your
                                        specific needs and requirements.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="activate-arrows show-arrows-always article-arrows arrows-white"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- latest blog end -->

        <div class="about-hero mt-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="section-header text-center pb-4">
                            <h2>Moxxpharma: One-Stop Solution To All Your
                                Supplements Business Needs</h2>
                            <p class="section-subheading">
                                Moxxpharma is empowering entrepreneurs by helping them launch successful
                                supplement businesses from scratch. Though, we help in getting license (mandatory),
                                company trademarks, learning and adapting business with high-quality raw-materials
                                and our professional supplement labelling. 
                            </p>
                            <p>
                                With our support, over 500 individuals have successfully established and scaled their
                                businesses, ensuring they have everything needed for success.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="about-hero mt-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="about-hero-content">
                            <h3>Steps to follow</h3>
                            <ul class="about-hero-action mt-3 p-0">
                                <li class="action-item d-flex">
                                    <div class="action-count">01</div>
                                    <div class="action-content">
                                        <h4 class="action-title">Fast and reliable shipping/delivery </h4>
                                        <!-- <p class="action-subtitle">Choose from our huge range of products available for private label by selecting the sizes, flavors and quantity of the preferred choice.</p> -->
                                    </div>
                                </li>
                                <li class="action-item d-flex">
                                    <div class="action-count">02</div>
                                    <div class="action-content">
                                        <h4 class="action-title"> 100% genuine & authentic products . </h4>
                                        <!-- <p class="action-subtitle">Designing brings lots of dedication when it comes to placing, designing, choosing the
                                            color and more. Our graphic designers work closely with you to make your custom label
                                            picture perfect for you. You can either send us your label to use, we provide both
                                            opportunities.
                                            </p> -->
                                    </div>
                                </li>
                                <li class="action-item d-flex">
                                    <div class="action-count">03</div>
                                    <div class="action-content">
                                        <h4 class="action-title"> Customized formulations </h4>
                                        <!-- <p class="action-subtitle">After selecting the shape, size, choosing the required logo with brand specific layout.
                                            We manufacture the products, pack it and ship it directly to you. Our shelf-ready
                                            products make us the best custom label company.</p> -->
                                    </div>
                                </li>
                                <li class="action-item d-flex">
                                    <div class="action-count">04</div>
                                    <div class="action-content">
                                        <h4 class="action-title"> Dedicated R & D team </h4>
                                    </div>
                                </li>
                                <li class="action-item d-flex">
                                    <div class="action-count">05</div>
                                    <div class="action-content">
                                        <h4 class="action-title"> No MOQ required. </h4>
                                    </div>
                                </li>
                                <li class="action-item d-flex">
                                    <div class="action-count">06</div>
                                    <div class="action-content">
                                        <h4 class="action-title"> Label  designing services </h4>
                                    </div>
                                </li>
                                <li class="action-item d-flex">
                                    <div class="action-count">07</div>
                                    <div class="action-content">
                                        <h4 class="action-title"> One stop solution to develop products. </h4>
                                    </div>
                                </li>
                                <li class="action-item d-flex">
                                    <div class="action-count">08</div>
                                    <div class="action-content">
                                        <h4 class="action-title"> Unique & wide variety of flavours. </h4>
                                    </div>
                                </li>
                                <li class="action-item d-flex">
                                    <div class="action-count">09</div>
                                    <div class="action-content">
                                        <h4 class="action-title"> Quick processing of orders/ less lead time. </h4>
                                    </div>
                                </li>
                                <li class="action-item d-flex">
                                    <div class="action-count">10</div>
                                    <div class="action-content">
                                        <h4 class="action-title"> Competitive pricing </h4>
                                    </div>
                                </li>                                
                                <li class="action-item d-flex">
                                    <div class="action-count">11</div>
                                    <div class="action-content">
                                        <h4 class="action-title"> Fast quotes </h4>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="overlay-furniture section-spacing"
                            style="background: url({{url('/asset/img/vdobgImg.jpg')}}) no-repeat bottom center/cover">
                            <div class="video-tools d-flex align-items-center justify-content-center">
                                <div class="video-button-area">
                                    <a class="video-button" href="#video-modal" data-bs-toggle="modal">
                                        <svg width="22" height="26" viewBox="0 0 22 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M21.5 12.134C22.1667 12.5189 22.1667 13.4811 21.5 13.866L2 25.1244C1.33333 25.5093 0.499999 25.0281 0.499999 24.2583L0.5 1.74167C0.5 0.971867 1.33333 0.490743 2 0.875643L21.5 12.134Z"
                                                fill="#FEFEFE" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        
        

        <!-- banner start -->
        @if(isset($group_categories) && count($group_categories) > 0)
            <div class="grid-banner mt-100 overflow-hidden">
            <div class="collection-tab-inner mt-0">
                <div class="container">
                    <div class="grid-container-2">
                        @foreach($group_categories as $key => $group_category)
                            @if($key == 0 )
                                <a class="grid-item grid-item-1 position-relative rounded mt-0 d-flex" href="{{ url('/collections/' . $group_category->slug) }}" data-aos="fade-right" data-aos-duration="700">
                                    <img class="banner-img rounded h-270" src="{{url('asset/img/banner/f1.jpg')}}" alt="banner-1">
                                    <div class="content-absolute content-slide">
                                        <div class="container height-inherit d-flex">
                                            <div class="content-box banner-content p-4">
                                                <!--<h2 class="heading_34 primary-color">Lprotein powder <br>collection </h2>-->
                                                <span class="text_12 mt-4 link-underline d-block primary-color">
                                                    VIEW MORE
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endif
                            @if($key == 1 )
                            <a class="grid-item grid-item-2 position-relative rounded mt-0 d-flex" href="{{ url('/collections/' . $group_category->slug) }}"
                            data-aos="fade-right" data-aos-duration="700">
                                <img class="banner-img rounded h-270" src="{{url('asset/img/banner/f3.jpg')}}" alt="banner-1">
                                <div class="content-absolute content-slide">
                                    <div class="container height-inherit d-flex">
                                        <div class="content-box banner-content p-4">
                                            <!--<h2 class="heading_34 primary-color">Lprotein powder <br>collection </h2>-->
                                            <span class="text_12 mt-4 link-underline d-block primary-color">
                                                VIEW MORE
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @endif
                            @if($key == 2 )
                                <a class="grid-item grid-item-3 position-relative rounded mt-0 d-flex" href="{{ url('/collections/' . $group_category->slug) }}"
                                data-aos="fade-left" data-aos-duration="700">
                                    <img class="banner-img rounded" src="{{url('asset/img/banner/f2.jpg')}}" alt="banner-1">
                                    <div class="content-absolute content-slide">
                                        <div class="container height-inherit d-flex">
                                            <div class="content-box banner-content p-4">
                                                <h2 class="heading_34 primary-color">{{$group_category->name}} <br>collection </h2>
        
                                                <span class="text_12 mt-4 link-underline d-block primary-color">
                                                    VIEW MORE
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
            
        @endif
        
        <!-- banner end -->
        

        <!-- CTA (call to action ) start -->

        <div class="about-hero mt-100">
            <div class="container">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="section-header text-center pb-4">
                            <h2 class="mb-5">
                               Get Free Quote
                            </h2>
                            <p>
                                Please contact Moxxpharma with any questions regarding our products and services. 
                                We look forward to helping grow your company and brand!
                            </p>
                            <p>
                                With our support, over 500 individuals have successfully established and scaled their
                                businesses, ensuring they have everything needed for success.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <form action="{{url('quote')}}" method="post" class="contact-form row">
                            @csrf
                            <div class="col-md-6 col-6">
                                <fieldset>
                                    <input type="text" placeholder="Full name" name="name" value="{{ old('name') }}" required/>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-md-6 col-6">
                                <fieldset>
                                    <input type="email" placeholder="Email Address" name="email" value="{{ old('email') }}" required/>
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-md-6 col-6">
                                <fieldset>
                                    <input type="text" placeholder="Type a subject" name="subject" value="{{ old('subject') }}" required/>
                                    @error('subject')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-md-6 col-6">
                                <fieldset>
                                    <input type="number" placeholder="Phone Number" name="phone" value="{{ old('phone') }}" maxlength="10" minlength="10" required pattern="\d{10}"/>
                                    @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-md-12 col-12 mt-3">
                                <fieldset>
                                    <select class="form-control" name="hearAbout" value="{{ old('hearAbout') }}" >
                                        <option value="" disabled selected> How did you hear about us: </option>
                                        @foreach($HearAboutOption as $val)
                                            <option value="{{$val->id}}"> {{$val->name}} </option>
                                        @endforeach
                                    </select>
                                    @error('hearAbout')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-md-12 col-12">
                                <fieldset>
                                    <textarea cols="20" rows="6" placeholder="Write your message here" name="description" required>{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </fieldset>
                                <button type="submit" class="position-relative review-submit-btn contact-submit-btn">SEND MESSAGE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- CTA (call to action ) end -->


       
        <!-- video start -->
        <div class="video-section mt-100 overflow-hidden">
            <div class="overlay-furniture section-spacing"
                style="background: url({{url('/asset/img/video/video-furniture.jpg')}}) no-repeat fixed bottom center/cover">
                <div class="container video-container">
                    <div class="row">
                        <div class="col-12">
                            <div class="video-tools d-flex align-items-center justify-content-center">
                                <div class="video-button-area">
                                    <a class="video-button" href="#video-modal" data-bs-toggle="modal">
                                        <svg width="22" height="26" viewBox="0 0 22 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M21.5 12.134C22.1667 12.5189 22.1667 13.4811 21.5 13.866L2 25.1244C1.33333 25.5093 0.499999 25.0281 0.499999 24.2583L0.5 1.74167C0.5 0.971867 1.33333 0.490743 2 0.875643L21.5 12.134Z"
                                                fill="#FEFEFE" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" tabindex="-1" id="video-modal">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header border-0">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <iframe height="600" src="https://www.youtube.com/embed/tvPnrfQCiCo"
                                title="YouTube video player"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- video end -->
        

        <!-- testimonial start -->
        <div class="testimonial-section mt-100 overflow-hidden home-section">
            <div class="testimonial-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-12 col-12" data-aos="fade-right" data-aos-duration="700">
                            <div class="section-header">
                                <h2 class="section-heading primary-color">What Customers Say?</h2>
                                <p class="section-subheading">
                                    The services provided by the officials was smooth and satisfactory. Products and
                                    goods delivered were up to satisfaction.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 offset-lg-1 col-md-12 col-12" data-aos="fade-left"
                            data-aos-duration="700">
                            <div class="testimonial-container position-relative">
                                <div class="testimonial-slideshow common-slider" data-slick='{
                                        "slidesToShow": 1, 
                                        "slidesToScroll": 1,
                                        "dots": false,
                                        "arrows": true
                                    }'>
                                    <div class="testimonial-item">
                                        <div class="testimonial-icon-wrap d-flex align-items-center">
                                            <div class="testimonial-icon-quote">
                                                <svg width="40" height="29" viewBox="0 0 40 29" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M0 28.99L11.7 0H19.5L12.22 28.99H0ZM20.28 28.99L32.11 0H39.91L32.5 28.99H20.28Z"
                                                        fill="#0f0f0f" />
                                                </svg>
                                            </div>
                                            <div class="testimonial-icon-star d-flex align-items-center ms-3">
                                                <img src="{{url('asset/img/icon/star.png')}}" alt="img">
                                                <img src="{{url('asset/img/icon/star.png')}}" alt="img">
                                                <img src="{{url('asset/img/icon/star.png')}}" alt="img">
                                                <img src="{{url('asset/img/icon/star.png')}}" alt="img">
                                                <img src="{{url('asset/img/icon/star.png')}}" alt="img">
                                            </div>
                                        </div>
                                        <p class="testimonial-review my-4 text_16">
                                            “ It has been our pleasure to partner with Moxxpharma. Their sleek and professional logo
                                            designs made our brand unique and visible in the market. Their diverse range of high
                                            quality labeling services helps us to offer a huge range of supplements without the
                                            hassle of packaging and labeling. I can now focus more on sales and customer
                                            engagement knowing I have a trusted partner with me handling all my logistics carefully”
                                        </p>
                                        <div class="testimonial-reviewer d-flex align-items-center">
                                            <div class="reviewer-img">
                                                <img src="{{url('asset/img/testimonial/john.jpg')}}" alt="img">
                                            </div>
                                            <div class="reviewer-info ms-4">
                                                <h4 class="reviewer-name heading_18 mb-2 primary-color">Sarah L.
                                                </h4>
                                                <p class="reviewer-desig text_14 m-0">Executive, Hypebeast</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="testimonial-item">
                                        <div class="testimonial-icon-wrap d-flex align-items-center">
                                            <div class="testimonial-icon-quote">
                                                <svg width="40" height="29" viewBox="0 0 40 29" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M0 28.99L11.7 0H19.5L12.22 28.99H0ZM20.28 28.99L32.11 0H39.91L32.5 28.99H20.28Z"
                                                        fill="#0f0f0f" />
                                                </svg>
                                            </div>
                                            <div class="testimonial-icon-star d-flex align-items-center ms-3">
                                                <img src="{{url('asset/img/icon/star.png')}}" alt="img">
                                                <img src="{{url('asset/img/icon/star.png')}}" alt="img">
                                                <img src="{{url('asset/img/icon/star.png')}}" alt="img">
                                                <img src="{{url('asset/img/icon/star.png')}}" alt="img">
                                                <img src="{{url('asset/img/icon/star.png')}}" alt="img">
                                            </div>
                                        </div>
                                        <p class="testimonial-review my-4 text_16">
                                            “ Moxxpharma has become my partner in my own supplement line, they provide
                                            high-quality manufactured supplements in bulk as well. They have a huge number of
                                            products available, all tailored to meet the needs and requirements of all. Their huge
                                            collection, timely delivery and best quality products has helped me boost my business.
                                            ”
                                        </p>
                                        <div class="testimonial-reviewer d-flex align-items-center">
                                            <div class="reviewer-img">
                                                <img src="{{url('asset/img/testimonial/john.jpg')}}" alt="img">
                                            </div>
                                            <div class="reviewer-info ms-4">
                                                <h4 class="reviewer-name heading_18 mb-2 primary-color">Jason M.
                                                </h4>
                                                <p class="reviewer-desig text_14 m-0">CEO Founder</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="testimonial-item">
                                        <div class="testimonial-icon-wrap d-flex align-items-center">
                                            <div class="testimonial-icon-quote">
                                                <svg width="40" height="29" viewBox="0 0 40 29" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M0 28.99L11.7 0H19.5L12.22 28.99H0ZM20.28 28.99L32.11 0H39.91L32.5 28.99H20.28Z"
                                                        fill="#0f0f0f" />
                                                </svg>
                                            </div>
                                            <div class="testimonial-icon-star d-flex align-items-center ms-3">
                                                <img src="{{url('asset/img/icon/star.png')}}" alt="img">
                                                <img src="{{url('asset/img/icon/star.png')}}" alt="img">
                                                <img src="{{url('asset/img/icon/star.png')}}" alt="img">
                                                <img src="{{url('asset/img/icon/star.png')}}" alt="img">
                                                <img src="{{url('asset/img/icon/star.png')}}" alt="img">
                                            </div>
                                        </div>
                                        <p class="testimonial-review my-4 text_16">
                                            “ Being a Nutritionist, it was my dream to start my own health and wellness business,
                                            after so much of research and reference I got to know about Moxxpharma. Moxxpharma
                                            has become an invaluable partner through my journey from scratch to now, they
                                            helped me from the beginning, they helped me with license, company registration and
                                            taught me everything about dealing with customers and how I can grow myself in this
                                            core. And Now, I am successfully running my business. I appreciate their services and
                                            advise everyone to take services from them.”
                                        </p>
                                        <div class="testimonial-reviewer d-flex align-items-center">
                                            <div class="reviewer-img">
                                                <img src="{{url('asset/img/testimonial/john.jpg')}}" alt="img">
                                            </div>
                                            <div class="reviewer-info ms-4">
                                                <h4 class="reviewer-name heading_18 mb-2 primary-color">Linda K.
                                                </h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="testimonial-item">
                                        <div class="testimonial-icon-wrap d-flex align-items-center">
                                            <div class="testimonial-icon-quote">
                                                <svg width="40" height="29" viewBox="0 0 40 29" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M0 28.99L11.7 0H19.5L12.22 28.99H0ZM20.28 28.99L32.11 0H39.91L32.5 28.99H20.28Z"
                                                        fill="#0f0f0f" />
                                                </svg>
                                            </div>
                                            <div class="testimonial-icon-star d-flex align-items-center ms-3">
                                                <img src="{{url('asset/img/icon/star.png')}}" alt="img">
                                                <img src="{{url('asset/img/icon/star.png')}}" alt="img">
                                                <img src="{{url('asset/img/icon/star.png')}}" alt="img">
                                                <img src="{{url('asset/img/icon/star.png')}}" alt="img">
                                                <img src="{{url('asset/img/icon/star.png')}}" alt="img">
                                            </div>
                                        </div>
                                        <p class="testimonial-review my-4 text_16">
                                            “ I am amazed with their services and product quality, I received from Moxxpharma. Being
                                            a Fitness coach, I have tried countless supplements products over the years, but none
                                            have matched the results, I’ve experienced partnering with them. I asked them to deliver
                                            me raw materials that too for more than 100 categories, helped me and my clients to
                                            get the best possible results effectively. The attention to detail in product and their
                                            shelf-ready deliveries is really recommended.”
                                        </p>
                                        <div class="testimonial-reviewer d-flex align-items-center">
                                            <div class="reviewer-img">
                                                <img src="{{url('asset/img/testimonial/john.jpg')}}" alt="img">
                                            </div>
                                            <div class="reviewer-info ms-4">
                                                <h4 class="reviewer-name heading_18 mb-2 primary-color">Rajender T.
                                                </h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="testimonial-item">
                                        <div class="testimonial-icon-wrap d-flex align-items-center">
                                            <div class="testimonial-icon-quote">
                                                <svg width="40" height="29" viewBox="0 0 40 29" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M0 28.99L11.7 0H19.5L12.22 28.99H0ZM20.28 28.99L32.11 0H39.91L32.5 28.99H20.28Z"
                                                        fill="#0f0f0f" />
                                                </svg>
                                            </div>
                                            <div class="testimonial-icon-star d-flex align-items-center ms-3">
                                                <img src="{{url('asset/img/icon/star.png')}}" alt="img">
                                                <img src="{{url('asset/img/icon/star.png')}}" alt="img">
                                                <img src="{{url('asset/img/icon/star.png')}}" alt="img">
                                                <img src="{{url('asset/img/icon/star.png')}}" alt="img">
                                                <img src="{{url('asset/img/icon/star.png')}}" alt="img">
                                            </div>
                                        </div>
                                        <p class="testimonial-review my-4 text_16">
                                            “ I was looking for supplements that are government approved and to be delivered on
                                            time. I got to know about Moxxpharma, they provide the best products with professional
                                            supplement brand labeling at times. I ordered their products from Indonesia, and was so
                                            tense about the delivery, but their timely delivery and commitment made me their
                                            regular customer. All their products are fssai accredited, which ensures their products
                                            are made of high-quality material. They are a big yes to expand yourself with them.”
                                        </p>
                                        <div class="testimonial-reviewer d-flex align-items-center">
                                            <div class="reviewer-img">
                                                <img src="{{url('asset/img/testimonial/john.jpg')}}" alt="img">
                                            </div>
                                            <div class="reviewer-info ms-4">
                                                <h4 class="reviewer-name heading_18 mb-2 primary-color">Salu M.
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="activate-arrows show-arrows-always article-arrows arrows-white"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- testimonial end -->

        <!-- brand logo start -->
        <div class="brand-logo-section mt-100">
            <div class="brand-logo-inner">
                <div class="container">
                     <div class="section-header text-center my-5">
                        <h2 class="section-heading primary-color">OUR CERTIFICATIONS</h2>
                    </div>
                    <div class="brand-logo-container overflow-hidden">
                        <div class="scroll-horizontal row align-items-center flex-nowrap">
                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 mx-5" data-aos="fade-up"
                                data-aos-duration="700">
                                <a href="javascript:void(0)" class="brand-logo d-flex align-items-center justify-content-center">
                                    <img src="{{url('asset/img/brand/Certificates1.png')}}" alt="img">
                                </a>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 mx-5" data-aos="fade-up"
                                data-aos-duration="700">
                                <a href="javascript:void(0)" class="brand-logo d-flex align-items-center justify-content-center">
                                    <img src="{{url('asset/img/brand/Certificates2.png')}}" alt="img">
                                </a>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 mx-5" data-aos="fade-up"
                                data-aos-duration="700">
                                <a href="javascript:void(0)" class="brand-logo d-flex align-items-center justify-content-center">
                                    <img src="{{url('asset/img/brand/Certificates3.png')}}" alt="img">
                                </a>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 mx-5" data-aos="fade-up"
                                data-aos-duration="700">
                                <a href="javascript:void(0)" class="brand-logo d-flex align-items-center justify-content-center">
                                    <img src="{{url('asset/img/brand/Certificates4.png')}}" alt="img">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- brand logo end -->
    </main>
@include('layouts.footer')