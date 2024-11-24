
@if(count($products) > 0)
    <div class="grid_view_product" id="subcMenu1">
        <div class="row">
            @foreach($products as $item)
                <div class="col-lg-3 col-md-6 col-6 mb-5" data-aos="fade-up" data-aos-duration="700">
                    <div class="product-card">
                        <div class="product-card-img">
                            <a class="hover-switch" href="{{url('product-details/'.$item->slug)}}">
                                @if(isset($item->Image) != null &&  count($item->Image) > 0)
                                    <img src="{{url('assets/images/products/150x150').'/'.$item->Image[0]->image}}" class="card-img-top" alt="product">   
                                @else
                                    <img src="{{url('/asset/img/products/Moxx.jpg')}}" style="width:150px" class="card-img-top" alt="product">
                                @endif
                            </a>
                        </div>
                        <div class="product-card-details">
                            <h3 class="product-card-title">
                                <a href="{{url('product-details/'.$item->slug)}}" >{{$item->name}}</a>
                            </h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>



    <div class="list_view_product" id="subcMenu2">
        @foreach($products as $item)
            <a class="hover-switch" href="{{url('product-details/'.$item->slug)}}">
                <div class="card bg-warning-subtle mt-4">
                    @if(isset($item->Image) != null &&  count($item->Image) > 0)
                        <img src="{{url('/assets/images/products/150x150/'.$item->Image[0]->image)}}" class="card-img-top"  alt="product">
                        
                    @else
                        <img src="{{url('/asset/img/products/Moxx.jpg')}}" style="width:150px" class="card-img-top" alt="product">
                    @endif
                    <div class="card-body">
                        <div class="text-section">
                            <h5 class="card-title fw-bold">{{$item->name}}</h5>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
    <!-- Pagination Links -->
  {{ $products->links('vendor.pagination.bootstrap-5') }}
@else
    <div class="row mb-5">
        <div class="col-md-12 text-center">
            <h2>No products found</h2>
        </div>
    </div>
@endif