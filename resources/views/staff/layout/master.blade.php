<!DOCTYPE html>
<html lang="en">
    <head>
    @include('staff.layout.head')
    </head>

    <body>
        <div class="container-scroller">
            @include('staff.layout.header')
        
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
            
                <!-- Sidebar -->
                @include('staff.layout.navbar')
                
                <!-- partial -->
                <div class="main-panel">
                    <div class="content-wrapper">
                    
                        <!-- Content area for different pages -->
                        @yield('content')
                    
                    </div>
                    <!-- content-wrapper ends -->
                    @include('staff.layout.footer')
                </div>
                <!-- main-panel ends -->
            </div>
        </div>
        
        @include('staff.layout.script')
    </body>

</html>
