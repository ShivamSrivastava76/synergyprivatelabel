<!-- partial:partials/_navbar.html -->
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="{{ route('user.index') }}">
            <!-- <img src="{{asset('assets/admin/images/logo.svg')}}" alt="logo"/> -->
             <h2>MOXXPHARMA
             </h2>
        </a>
        <a class="navbar-brand brand-logo-mini" href="{{ route('user.index') }}">
            <!-- <img src="{{asset('assets/admin/images/logo-mini.svg')}}" alt="logo"/> -->
             <h1>M</h1>
        </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="fas fa-bars"></span>
        </button>
    
        <ul class="navbar-nav navbar-nav-right">
        
            
            
            <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                <img src="{{asset('assets/admin/images/faces/user.jpg')}}" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                <div class="dropdown-divider"></div>
                <a href="{{url('logout')}}" class="dropdown-item">
                <i class="fas fa-power-off text-primary"></i>
                 Logout
                </a>
            </div>
            </li>
        
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="fas fa-bars"></span>
        </button>
    </div>
</nav>