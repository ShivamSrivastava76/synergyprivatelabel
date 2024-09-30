@extends('staff.layout.master')
<style>
    /* Optionally customize the eye icon and input field styling */
/* .input-group-text {
    background-color: #fff;
    border-left: none;
}

#togglePassword {
    cursor: pointer;
} */
</style>
@section('content')
<div class="page-header">
    <h3 class="page-title">
        Edit Staff Member Form
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item d-lg-flex">
            <a class="nav-link" href="{{ route('staff.staff.index') }}">
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
                <h4 class="card-title">Edit Staff Details</h4>
                <form class="forms-sample" action="{{ route('staff.staff.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="{{ old('first_name', $user->first_name) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lastName">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="{{ old('last_name', $user->last_name) }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email address" value="{{ old('email', $user->email) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="">
                            </div>
                        </div>
                        <!-- <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Password (leave blank if unchanged)</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="password" value="{{ old('password', $user->password) }}"  placeholder="Password">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-eye-slash" id="togglePassword" style="cursor: pointer;"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Select Permission</label>
                                <select name="permissions[]" class="js-example-basic-multiple w-100 form-control-lg" multiple="multiple">
                                    @foreach($permissions as $permission)
                                        <option value="{{ $permission->id }}" {{ $user->permissions->contains($permission->id) ? 'selected' : '' }}>
                                            {{ $permission->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
//     document.addEventListener("DOMContentLoaded", function() {
//     const togglePassword = document.querySelector("#togglePassword");
//     const password = document.querySelector("#password");

//     togglePassword.addEventListener("click", function (e) {
//         // Toggle the type attribute
//         const type = password.getAttribute("type") === "password" ? "text" : "password";
//         password.setAttribute("type", type);

//         // Toggle the eye icon
//         this.classList.toggle("fa-eye");
//         this.classList.toggle("fa-eye-slash");
//     });
// });

</script>
@endsection