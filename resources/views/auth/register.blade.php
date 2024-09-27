@include('layouts.app')
@include('layouts.navBar')
    <!-- breadcrumb start -->
    <div class="breadcrumb innerpagebanner" style="background-image: url({{url('asset/img/banner1.jpg')}});">
        <div class="container">
            <h2 class="text-white">Register</h2>
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
                <li>Register</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb end -->

    <main id="MainContent" class="content-for-layout">
        <div class="login-page mt-100">
            <div class="container">
                <form method="POST" action="{{ route('register') }}" class="login-form common-form mx-auto">
                    @csrf
                    <div class="section-header mb-3">
                        <h2 class="section-heading text-center">Register</h2>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <fieldset>
                                <label class="label">Name</label>
                                <input type="text" id="name" class="block mt-1 w-full" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            </fieldset>
                        </div>
                        <div class="col-12">
                            <fieldset>
                                <label class="label">Email address</label>
                                <input type="email"  class="block mt-1 w-full" name="email" :value="old('email')" required autocomplete="email" />
                            </fieldset>
                        </div>
                        <div class="col-12">
                            <fieldset>
                                <label class="label">Password</label>
                                <input type="password" id="password" class="block mt-1 w-full" name="password" required autocomplete="new-password" />
                            </fieldset>
                        </div>
                        <div class="col-12">
                            <fieldset>
                                <label class="label">Confirm Password</label>
                                <input type="password" id="password_confirmation" class="block mt-1 w-full" name="password_confirmation" required autocomplete="new-password" />
                            </fieldset>
                        </div>
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn-primary d-block mt-3 btn-signin">CREATE</button>
                        </div>
                        <div class="col-12 mt-3">
                            <a href="{{url('login')}}" class="btn-secondary mt-2 btn-signin">Already registered?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>            
    </main>
