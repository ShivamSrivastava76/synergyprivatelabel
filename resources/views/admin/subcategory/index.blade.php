@extends('admin.layout.master')
<style>
   
</style>

@section('content')
<div class="page-header">
    <h3 class="page-title">
        Subcategory List
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item d-lg-flex">
                <a class="nav-link" href="{{ route('admin.subcategory.create') }}">
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
<!-- For status changes -->
<div class="alert alert-success fade show" role="alert" id="status_success" style="display:none;">
   Status updated successfully!
</div>
<div class="alert alert-danger fade show" role="alert" id="status_error" style="display:none;">
    Failed to update status!
</div>
<!-- For status change end -->
<div class="card">
    <div class="card-body">
        <h4 class="card-title">List of Subcategory</h4>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table id="order-listing" class="table">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subcategory as $index => $val)
                                <tr>
                                    <td>{{ $index + 1 }}</td> <!-- Display the serial number -->
                                    <td>{{ $val->name }}</td> <!-- Display the category title -->
                                    <td>
                                        <label class="switch">
                                            <input type="checkbox" class="toggle-status" data-id="{{ $val->id }}" {{ $val->status ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.subcategory.edit', $val->id) }}" class="btn btn-outline-secondary btn-rounded btn-icon" style="padding: 12px; margin-top:12px;">
                                                <i class="fas fa-pencil-alt text-info"></i>
                                        </a>
                                        <form action="{{ route('admin.subcategory.destroy', $val->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-rounded btn-icon" onclick="return confirm('Are you sure you want to delete this category?')">
                                                <i class="fas fa-trash text-danger"></i>                          
                                            </button>
                                            
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.toggle-status').change(function() {
            var status = $(this).prop('checked') ? 1 : 0;
            var categoryId = $(this).data('id');

            $.ajax({
                type: 'PATCH',
                url: '{{ route("admin.subcategory.toggleStatus") }}', // Correct route name
                data: {
                    _token: '{{ csrf_token() }}',
                    id: categoryId,
                    status: status
                },
                success: function(response) {
                    if(response.success) {
                        $('#status_success').fadeIn();
                        setTimeout(function() {
                            $('#status_success').fadeOut(); // Hide the alert with fade-out effect
                        }, 3000);
                    } else {
                        $('#status_error').fadeIn();
                        setTimeout(function() {
                            $('#status_error').fadeOut(); // Hide the alert with fade-out effect
                        }, 3000);
                    }
                },
                error: function(error) {
                    $('#status_error').fadeIn();
                    setTimeout(function() {
                        $('#status_error').fadeOut(); // Hide the alert with fade-out effect
                    }, 3000);
                }
            });
        });
    });
</script>
@endsection

