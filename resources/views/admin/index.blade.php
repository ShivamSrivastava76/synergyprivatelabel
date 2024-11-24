@extends('admin.layout.master')
@section('content')
    <div class="page-header">
        <h3 class="page-title">
            Admin Dashboard
        </h3>
    </div>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-6 grid-margin">
                    <a href={{url('/admin/enquiries')}} class="nav-link">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-0">Total Enquiries</h4>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-inline-block pt-3">
                                        <div class="d-md-flex">
                                            <h2 class="mb-0">{{$enquiry}}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 grid-margin">
                    <a href={{url('/admin/staffs')}} class="nav-link">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-0">Total Staff </h4>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-inline-block pt-3">
                                        <div class="d-md-flex">
                                            <h2 class="mb-0">{{$user}}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                
            </div>
        </div>
    </div>
@endsection
