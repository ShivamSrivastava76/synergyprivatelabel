@extends('staff.layout.master')
<style>
   
</style>

@section('content')
<div class="page-header">
    <h3 class="page-title">
        Product List 
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item d-lg-flex">
                <a class="nav-link" href="{{ route('staff.product.create') }}">
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
        <h4 class="card-title">List of product</h4>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table id="order-listing" class="table">
                        <thead>
                            <tr>
                            <th>Sr. No.</th>
                            <th>Product Name</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($products as $index => $product)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $product->name }}</td>
                                <td>
                                    @if(count($product->image))
                                        <img src="{{ asset('assets/images/products/150x150/' . $product->image[0]->image) }}" alt="{{ $product->name }}" style="width: 150px; height: 150px;">
                                    @else
                                        No Image
                                    @endif
                                </td>
                                <td>
                                    <label class="switch">
                                        <input type="checkbox" class="toggle-status" data-id="{{ $product->id }}" {{ $product->status ? 'checked' : '' }}>
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                                <td>
                                    <a href="{{ route('staff.product.edit', $product->id) }}" class="btn btn-outline-secondary btn-rounded btn-icon" style="padding: 12px; margin-top:12px;">
                                        <i class="fas fa-pencil-alt text-info"></i>
                                    </a>
                                    <form action="{{ route('staff.product.destroy', $product->id) }}" method="POST" style="display:inline-block;">
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
                                <td colspan="6">No products found.</td>
                            </tr>
                            @endforelse
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
            var productId = $(this).data('id');

            $.ajax({
                type: 'PATCH',
                url: '{{ route("staff.product.toggleStatus") }}', // Correct route name
                data: {
                    _token: '{{ csrf_token() }}',
                    id: productId,
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

