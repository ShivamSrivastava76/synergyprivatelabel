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
            <a class="nav-link" href="{{ route('admin.index') }}">
            <i class="fa fa-home menu-icon"></i>
            <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.category.index') }}">
            <i class="fa fa-th-large menu-icon"></i>
            <span class="menu-title">Categories</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.subcategory.index') }}">
            <i class="fa fa-th menu-icon"></i>
            <span class="menu-title">Subcategories</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.product.index') }}">
            <i class="fa fa-list-alt menu-icon"></i>
            <span class="menu-title">Products</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.enquiries.index') }}">
            <i class="fa fa-address-book menu-icon"></i>
            <span class="menu-title">Enquries</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.staff.index') }}">
            <i class="fa fa-users menu-icon"></i>
            <span class="menu-title">Staff Members</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.contact-enquiry.index') }}">
            <i class="fas fa-clipboard-list menu-icon"></i>
            <span class="menu-title">Contact Enquiries</span>
            </a>
        </li>
    </ul>
</nav>