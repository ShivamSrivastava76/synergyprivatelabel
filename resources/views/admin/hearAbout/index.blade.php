@extends('admin.layout.master')
<style>
   
</style>

@section('content')
<div class="page-header">
    <h3 class="page-title">
        Contact Quote List 
    </h3>
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
        <h4 class="card-title">List of quote enquiry</h4>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table id="order-listing" class="table">
                        <thead>
                            <tr>
                            <th>Sr. No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Phone</th>
                            <th>Description</th>
                            <th> Hear about us</th>
                            <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($hearAbout as $index => $val)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $val->name }}</td>
                                <td>{{ $val->email ?? '' }}</td>
                                <td>{{ $val->subject ?? '' }}</td>
                                <td>{{ $val->phone ?? '' }}</td>
                                <td>{{ $val->description ?? '' }}</td>
                                <td>{{ $val->quote->name ?? '' }}</td>
                                <td>
                                    <form action="{{ route('admin.quote.destroy', $val->id) }}" method="POST" style="display:inline-block;">
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
@endsection

