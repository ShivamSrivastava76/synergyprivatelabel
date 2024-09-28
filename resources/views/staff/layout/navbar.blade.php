<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
            <div class="profile-image">
                <img src="{{asset('assets/admin/images/faces/face5.jpg')}}" alt="image"/>
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
            <a class="nav-link" href="/">
            <i class="fa fa-home menu-icon"></i>
            <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.category.index') }}">
            <i class="fa fa-th-large menu-icon"></i>
            <span class="menu-title">Category</span>
            </a>
        </li>
    </ul>
</nav>