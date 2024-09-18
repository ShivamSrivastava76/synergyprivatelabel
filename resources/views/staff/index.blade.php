<!DOCTYPE html>
<html lang="en">
    <head>
    @include('admin.layout.head')
    </head>

    <body>
        <div class="container-scroller">
        @include('admin.layout.header')
        
        <!-- partial -->
            <div class="container-fluid page-body-wrapper">
            
                <!-- Sidebar -->
                @include('admin.layout.navbar')
                
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">
                        Admin Dashboard
                        </h3>
                    </div>
                
                </div>
                <!-- content-wrapper ends -->
                @include('admin.layout.footer')
            </div>
            <!-- main-panel ends -->
            </div>
        </div>
        
        @include('admin.layout.script')
    </body>

</html>