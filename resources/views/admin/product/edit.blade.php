@extends('admin.layout.master')
@section('content')
<div class="page-header">
    <h3 class="page-title">
        Edit Product Form
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item d-lg-flex">
                <a class="nav-link" href="{{ route('admin.product.index') }}">
                    <span class="btn btn-primary"><i class="fa fa-arrow-left"></i> &nbsp;Back</span>
                </a>
            </li>
        </ul>
    </nav>
</div>

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

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Product Details</h4>
                <form class="forms-sample" action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Method spoofing for PUT request -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="productName">Product Title</label>
                                <input type="text" class="form-control" id="productName" name="name" placeholder="Product Title" value="{{ old('name', $product->name) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category">Product Category</label>
                                <select class="js-example-basic-single w-100" id="category" name="categories_id" required>
                                    <option value="">Select a Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('categories_id', $product->categories_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="productPrice">Product Price</label>
                                <input type="number" class="form-control" id="productPrice" name="price" placeholder="Product Price" value="{{ old('price', $product->price) }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Product Image</label>
                                <input type="file" name="image" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Product Image" value="{{ old('image', $product->image) }}">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category">Product Size</label>
                                <select class="js-example-basic-single w-100" id="size" name="size[]" required multiple="multiple">
                                    <option value="">Select Product Size</option>
                                    @foreach($size as $size)
                                        <option value="{{ $size->id }}" @if($product->sizes->contains($size->id)) selected @endif>
                                            {{ $size->size }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            @if($product->image)
                                <img src="{{ asset('assets/images/products/' . $product->image) }}" alt="{{ $product->name }}" style="width: 100px; height: 100px; margin-top: 10px;">
                            @endif
                        </div>
                        
                    </div>

                    <div class="form-group">
                        <label for="summernoteExample">Product Description</label>
                        <div id="summernoteExample">
                            {!! old('description', $product->description) !!}
                        </div>
                    </div>
                    <input type="hidden" id="description" name="description" value="{{ old('description', $product->description) }}">

                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $(".note-view").hide();
    $('#summernoteExample').on('summernote.change', function(we, contents, $editable) {
        $('#description').val(contents);
    });
});
</script>
@endsection
