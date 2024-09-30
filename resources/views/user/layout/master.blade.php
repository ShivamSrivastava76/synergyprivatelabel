<!DOCTYPE html>
<html lang="en">
    <head>
    @include('user.layout.head')
    </head>

    <body>
        <div class="container-scroller">
            @include('user.layout.header')
        
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
            
                <!-- Sidebar -->
                @include('user.layout.navbar')
                
                <!-- partial -->
                <div class="main-panel">
                    <div class="content-wrapper">
                    
                        <!-- Content area for different pages -->
                        @yield('content')
                    
                    </div>
                    <!-- content-wrapper ends -->
                    @include('user.layout.footer')
                </div>
                <!-- main-panel ends -->
            </div>
        </div>
        
        @include('user.layout.script')
    </body>

</html>
