<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
            <div class="profile-image">
                <img src="{{asset('assets/admin/images/faces/user.jpg')}}" alt="image"/>
            </div>
            <div class="profile-name">
                <p class="name">
                    {{Auth::user()->name}}
                </p>
                <p class="designation">
                    @if(Auth::user()->role == 0)
                        Admin
                    @elseif(Auth::user()->role == 1)
                        Staff
                    @elseif(Auth::user()->role == 2)
                        User
                    @endif
                </p>
            </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('staff.index') }}">
            <i class="fa fa-home menu-icon"></i>
            <span class="menu-title">Dashboard</span>
            </a>
        </li>
        @if(Auth::user()->permissions->contains('id', 1))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('staff.category.index') }}">
                    <i class="fa fa-th-large menu-icon"></i>
                    <span class="menu-title">Categories</span>
                </a>
            </li>
        @endif
    
        @if(Auth::user()->permissions->contains('id', 2))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('staff.subcategory.index') }}">
                    <i class="fa fa-th menu-icon"></i>
                    <span class="menu-title">Subcategories</span>
                </a>
            </li>
        @endif
    
        @if(Auth::user()->permissions->contains('id', 3))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('staff.product.index') }}">
                    <i class="fa fa-list-alt menu-icon"></i>
                    <span class="menu-title">Products</span>
                </a>
            </li>
        @endif
        
        @if(Auth::user()->permissions->contains('id', 4))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('staff.enquiries.index') }}">
                    <i class="fa fa-address-book menu-icon"></i>
                    <span class="menu-title">Enquiries</span>
                </a>
            </li>
        @endif
        
        @if(Auth::user()->permissions->contains('id', 5))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('staff.contact-enquiry.index') }}">
                    <i class="fas fa-clipboard-list menu-icon"></i>
                    <span class="menu-title">Contact Enquiries</span>
                </a>
            </li>
        @endif
        <!-- @if(Auth::user()->permissions->contains('id', 6))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('staff.quote.index') }}">
                    <i class="fas fa-clipboard-list menu-icon"></i>
                    <span class="menu-title">Quote Enquiries</span>
                </a>
            </li>
        @endif -->
    </ul>
</nav>