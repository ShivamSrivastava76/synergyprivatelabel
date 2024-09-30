@extends('staff.layout.master')
@section('content')
<div class="page-header">
    <h3 class="page-title">
        Edit Category Form
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item d-lg-flex">
            <a class="nav-link" href="{{ route('staff.category.index') }}">
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
                <h4 class="card-title">Edit Category Details</h4>
                <form class="forms-sample" action="{{ route('staff.category.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="categoryName">Title</label>
                        <input type="text" class="form-control" id="categoryName" name="name" value="{{ old('name', $category->name) }}" placeholder="Category Title" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <div id="summernoteExample">
                            {!! old('description', $category->description) !!}
                        </div>
                    </div>
                    <input type="hidden" id="description" name="description" value="{{old('description', $category->description)}}">

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