@extends('admin.layout.master')
<style>
   
</style>

@section('content')
<div class="page-header">
    <h3 class="page-title">
        Staff List 
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item d-lg-flex">
                <a class="nav-link" href="{{ route('admin.staff.create') }}">
                    <span class="btn btn-primary">+ Create new</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </ul>
    </div>
@endif
<div class="card">
    <div class="card-body">
        <h4 class="card-title">List of staff members</h4>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table id="order-listing" class="table">
                        <thead>
                            <tr>
                            <th>Sr. No.</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($staffs as $index => $staff)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $staff->first_name }}</td>
                                <td>{{ $staff->last_name ?? ' ' }}</td>
                                <td>{{ $staff->email ?? ' ' }}</td>
                                <td>
                                    <a href="{{ route('admin.staff.edit', $staff->id) }}" class="btn btn-outline-secondary btn-rounded btn-icon" style="padding: 12px; margin-top:12px;">
                                        <i class="fas fa-pencil-alt text-info"></i>
                                    </a>
                                    <form action="{{ route('admin.staff.destroy', $staff->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-rounded btn-icon" onclick="return confirm('Are you sure you want to delete this product?')">
                                            <i class="fas fa-trash text-danger"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">No members found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

