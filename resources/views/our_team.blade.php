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
                            <h4>Our Team</h4>
                            <h5>Manjeet (CEO, Moxxpahrma) </h5>
                            <p>Moxxpharma is a team of highly experienced people in the nutrition and pharmaceutical industry. The company is led by Mr. Manjeet, the visionary CEO of Moxxpharma. His extensive experience in the pharmaceutical innovation and nutrition industry combined with dedication makes us the best in the field, and makes us stand above all the competitors. When you choose to partner with Moxxpharma for your products or brand needs, you choose a world-class manufacturing brand partner to make you and your products as successful as possible by helping you out from scratch with license, govt approvals to boost sales and create a brand identity. </p>
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
                                            <img src="{{url('asset/img/team/10.jpg')}}" alt="img" style="heigth:1000px">
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
                                            <img src="{{url('asset/img/team/20.jpg')}}" alt="img" style="heigth:1000px">
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
                                            <img src="{{url('asset/img/team/30.jpg')}}" alt="img" style="heigth:1000px">
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
                                            <img src="{{url('asset/img/team/40.jpg')}}" alt="img" style="heigth:1000px">
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
                                            <img src="{{url('asset/img/team/50.jpg')}}" alt="img" style="heigth:1000px">
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
                                            <img src="{{url('asset/img/team/60.jpg')}}" alt="img" style="heigth:1000px">
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