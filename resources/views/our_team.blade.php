@include('layouts.app')
@include('layouts.navBar')
    <!-- breadcrumb start -->
    <div class="breadcrumb innerpagebanner" style="background-image: url({{url('asset/img/banner1.jpg')}});">
        <div class="container">
            <h2 class="text-white">Our Team</h2>
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
                <li>Our Team</li>
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
                            <h3 class="text-center">Our Team</h3>
                            <h4>Dan Crosby</h4>
                            <h5>CEO </h5>
                            <p>Dan is a highly motivated entrepreneur in the sports nutrition industry with decades of experience. His goal with Synergy Private Label is to bring trust and manufacturing integrity back to the industry by producing products and brands for clients that exceed their expectations. When you choose to partner with Synergy Private Label for your product and/or brand needs, you will be choosing a world-class manufacturer with years of experience and knowledge that you can rely on for the highest quality and best tasting products with shorter lead times. Dan’s mission is to become your manufacturing brand partner to make you and your products as successful as possible in this tough market.</p>
                            <p>“When you choose us you’re choosing a partner.”</p>
                        </div>
                    </div>
                </div>

                <!-- team start -->
                <div class="team-section" data-aos="fade-up" data-aos-duration="700">
                    <div class="team-section-wrapper">
                        <div class="container">
                            <div class="team-wrapper">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="team-item">
                                            <img src="{{url('asset/img/team/1.jpg')}}" alt="img">
                                            <div class="member-absolute">
                                                <div class="member-details text-center">
                                                    <h4 class="member-name">Javena Melo</h4>
                                                    <p class="member-desig">Founder, Director</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="team-item">
                                            <img src="{{url('asset/img/team/2.jpg')}}" alt="img">
                                            <div class="member-absolute">
                                                <div class="member-details text-center">
                                                    <h4 class="member-name">Paul Honson</h4>
                                                    <p class="member-desig">Head Technician</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="team-item">
                                            <img src="{{url('asset/img/team/3.jpg')}}" alt="img">
                                            <div class="member-absolute">
                                                <div class="member-details text-center">
                                                    <h4 class="member-name">Devon Lane</h4>
                                                    <p class="member-desig">Technician</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="team-item">
                                            <img src="{{url('asset/img/team/4.jpg')}}" alt="img">
                                            <div class="member-absolute">
                                                <div class="member-details text-center">
                                                    <h4 class="member-name">Jalen Davies</h4>
                                                    <p class="member-desig">Marketing Manager</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="team-item">
                                            <img src="{{url('asset/img/team/5.jpg')}}" alt="img">
                                            <div class="member-absolute">
                                                <div class="member-details text-center">
                                                    <h4 class="member-name">Kylee Danford</h4>
                                                    <p class="member-desig">Sales Manager</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="team-item">
                                            <img src="{{url('asset/img/team/6.jpg')}}" alt="img">
                                            <div class="member-absolute">
                                                <div class="member-details text-center">
                                                    <h4 class="member-name">Luisa Wilson</h4>
                                                    <p class="member-desig">Support Assistant</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- team end -->
            </div>
        </div>
    </main>
@include('layouts.footer')