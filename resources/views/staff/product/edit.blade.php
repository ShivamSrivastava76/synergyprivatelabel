@extends('staff.layout.master')
@section('content')
<div class="page-header">
    <h3 class="page-title">
        Edit Product Form
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item d-lg-flex">
                <a class="nav-link" href="{{ route('staff.product.index') }}">
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
                <form class="forms-sample" action="{{ route('staff.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
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
                                <select class="js-example-basic-single w-100" id="categories_id" name="categories_id[]" required onchange="subcategory()" multiple="multiple">
                                    <option value="">Select a Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" 
                                            {{ in_array($category->id, $productsCategory->pluck('categories_id')->toArray()) ? 'selected' : '' }}>
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
                                <input type="number" class="form-control" id="productPrice" name="price" placeholder="Product Price" value="{{ old('price', $product->price) }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Product Image</label>
                                <input type="file" name="image" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="file" name="images[]" class="form-control file-upload-info" multiple placeholder="Upload Product Image" value="{{ old('image', $product->image) }}">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mt-4">
                                <button type="button" class="btn btn-primary btn-rounded btn-fw" onclick="variation1()">Add new Variation</button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            @if($product->image)
                                <img src="{{ asset('assets/images/products/' . $product->image) }}" alt="{{ $product->name }}" style="width: 100px; height: 100px; margin-top: 10px;">
                            @endif
                        </div>
                    </div>
                    <div id="variation">
                        <div class="row">
                            @foreach($variation as $key => $val)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Variation Name: {{ $key + 1 }}</label>
                                        <input type="text" name="variation_name_{{ $key + 1 }}" id="variation_name_{{ $key + 1 }}" class="form-control" placeholder="Variation Name" value="{{ $val->name }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Variation Value: {{ $key + 1 }}</label>
                                        <input type="text" name="variation_value_{{ $key + 1 }}" id="variation_value_{{ $key + 1 }}" class="form-control" placeholder="Variation Value" value="{{ $val->value }}">
                                    </div>
                                </div>
                                <input type="hidden" name="count" id="count" class="form-control" value="{{ $key+1 }}">
                            @endforeach
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


var count = {{ count($variation) }};

function variation1() 
{
    console.log(count)
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
        html += `<input type="hidden" name="count" value="${i + 1}">`
        html += `</div>`;
        html += `</div>`;
    }

    $('#variation').html(html);
}

function subcategory()
{
    id = $('#categories_id').val().join(',');
    console.log(id)
    $.ajax({
        type: "Post",
        url: "{{url('/staff/products/subcategory')}}",
        data: {
            'id': id,
            '_token': '{{ csrf_token() }}',
        },
        success: function(data) {
            $('#subcategories_id').html(data);
        }
    });
    
}

$(document).ready(function() {
    id = $('#categories_id').val().join(',');
    console.log(id)
    $.ajax({
        type: "Post",
        url: "{{url('/staff/products/subcategory')}}",
        data: {
            'id': id,
            'product_id': {{$product->id}},
            '_token': '{{ csrf_token() }}',
        },
        success: function(data) {
            $('#subcategories_id').html(data);
        }
    });
});

</script>
@endsection
