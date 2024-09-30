@extends('staff.layout.master')
@section('content')
<div class="page-header">
    <h3 class="page-title">
        Add SubCategory Form
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item d-lg-flex">
            <a class="nav-link" href="{{ route('staff.subcategory.index') }}">
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
                <h4 class="card-title">Add SubCategory Details</h4>
                <form class="forms-sample" action="{{ route('staff.subcategory.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="subcategoryName">Title</label>
                        <input type="text" class="form-control" id="subcategoryName" name="subcategoryName" placeholder="Subategory Title" required>
                    </div>
                    <div class="form-group">
                        <label for="subcategoryName">Category</label>
                        <select class="js-example-basic-single w-100" id="size" name="categories_id" required>
                            <option value="">Select Category</option>
                            @foreach($category as $value)
                                <option value="{{ $value->id }}">
                                    {{ $value->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <div id="summernoteExample"></div>
                    </div>
                    <input type="hidden" id="description" name="description">

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $(".note-insert").hide();
        $(".note-table").hide();
        $(".note-view").hide();
        $(".note-fontname").hide();
        $('#summernoteExample').on('summernote.change', function(we, contents, $editable) {
            $('#description').val(contents);
        });
    });
   
</script>   
@endsection