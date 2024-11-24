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
                <li>Quote</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb end -->

    <main id="MainContent" class="content-for-layout">
        <div class="contact-page">

            <!-- about banner start -->           
            <div class="contact-form-section mt-100">
                <div class="container">
                    <div class="contact-form-area">
                        <div class="section-header mb-4">
                            <h2 class="section-heading text-center">Get Free Quote</h2>
                        </div>
                        <div class="contact-form--wrapper">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-6">
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
                                <div class="col-6">
                                    <img src="{{url('asset/img/quote.jpg')}}" class="img mt-4 h-100" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- about banner end -->
        </div>
    </main>
@include('layouts.footer')