@include('layouts.app')
@include('layouts.navBar')
    <!-- breadcrumb start -->
    <div class="breadcrumb innerpagebanner" style="background-image: url({{url('asset/img/banner1.jpg')}});">
        <div class="container">
            <h2 class="text-white">Login</h2>
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
                <li>Login</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- login start -->
    <main id="MainContent" class="content-for-layout">
        <div class="login-page mt-100">
            <div class="container">
                <form method="POST" action="{{ route('login') }}" class="login-form common-form mx-auto">
                    @csrf
                    <div class="section-header mb-3">
                        <h2 class="section-heading text-center">Login</h2>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <fieldset>
                                <label class="label">Email address</label>
                                <input type="email" id="email" name="email" :value="old('email')" required autofocus autocomplete="email"/>
                            </fieldset>
                        </div>
                        <div class="col-12">
                            <fieldset>
                                <label class="label">Password</label>
                                <input type="password" name="password" required autocomplete="current-password" />
                            </fieldset>
                        </div>
                        <div class="col-12 mt-3">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                            <button type="submit" class="btn-primary d-block mt-4 btn-signin">SIGN IN</button>
                            <a href="{{url('register')}}" class="btn-secondary mt-2 btn-signin">CREATE AN ACCOUNT</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>            
    </main>
    <!-- login End -->
@include('layouts.footer')