@extends('admin.layout.master')
@section('content')
<div class="page-header">
    <h3 class="page-title">
        Add Product Form
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
<!-- Display Error Message -->
<!-- at -->
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Product Details</h4>
                <form class="forms-sample" action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="productName">Product Title</label>
                                <input type="text" class="form-control" id="productName" name="name" placeholder="Product Title" value="{{ old('name') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="categories_id">Product Category</label>
                                <select class="js-example-basic-single w-100" id="categories_id" name="categories_id[]" required  multiple="multiple" onchange="subcategory()">
                                    <option value="">Select a Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('categories_id') == $category->id ? 'selected' : '' }}>
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
                                <label for="subcategories_id">Product Subcategory</label>
                                <select class="js-example-basic-single w-100" id="subcategories_id" name="subcategories_id[]" required  multiple="multiple">
                                    <option value="">First Select a Category</option>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="productPrice">Product Price</label>
                                <input type="number" class="form-control" id="productPrice" name="price" placeholder="Product Price" value="{{ old('price') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Product Image</label>
                                <input type="file" name="image" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Product Image" value="{{ old('image') }}">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mt-4">
                                <button type="button" class="btn btn-primary btn-rounded btn-fw" onclick="variation()">Add new Variation</button>
                            </div>
                        </div>
                    </div>
                    <div id="variation" > </div>
                    <div class="form-group">
                        <label for="summernoteExample">Product Description</label>
                        <div id="summernoteExample">
                            {!! old('description') !!}
                        </div>
                    </div>
                    <input type="hidden" id="description" name="description" value="{{ old('description') }}">

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    // $(".note-insert").hide();
    // $(".note-table").hide();
    $(".note-view").hide();
    // $(".note-fontname").hide();
    $('#summernoteExample').on('summernote.change', function(we, contents, $editable) {
        $('#description').val(contents);
    });
});

function subcategory()
{
    id = $('#categories_id').val().join(',');
    console.log(id)
    $.ajax({
        type: "Post",
        url: 'sub_category',
        data: {
            'id': id,
            '_token': '{{ csrf_token() }}',
        },
        success: function(data) {
            $('#subcategories_id').html(data);
        }
    });
    
}

var count = 0;

function variation() {
    count++;
    var html = `<div class="row">`;

    for (let i = 0; i < count; i++) {
        let currentName = $(`#variation_name_${i + 1}`).val() || ''; 
        let currentValue = $(`#variation_value_${i + 1}`).val() || ''; 

        html += `<div class="col-md-6">`;
        html += `<div class="form-group">`;
        html += `<label>Variation Name: ${i + 1}</label>`;
        html += `<input type="text" name="variation_name_${i + 1}[]" id="variation_name_${i + 1}" class="form-control" placeholder="Variation Name" value="${currentName}">`;
        html += `</div>`;
        html += `</div>`;
        html += `<div class="col-md-6">`;
        html += `<div class="form-group">`;
        html += `<label>Variation Value ${i + 1}</label>`;
        html += `<input type="text" name="variation_value_${i + 1}[]" id="variation_value_${i + 1}" class="form-control" placeholder="Variation Value" value="${currentValue}">`;
        html += `<input type="hidden" name="count" id="count" value="${i + 1}">`
        html += `</div>`;
        html += `</div>`;
    }
    html += `</div>`;

    $('#variation').html(html);
}
</script>
@endsection