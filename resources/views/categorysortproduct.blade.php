@if(count($products->products) > 0)
    <div class="row mb-5">
        @foreach($products->products as $item)
                <div class="col-lg-3 col-md-6 col-6" data-aos="fade-up" data-aos-duration="700">
                    <div class="product-card">
                        <div class="product-card-img">
                            <a class="hover-switch" href="{{url('product_details/'.$item->id)}}">
                                <img class="primary-img" src="{{url('/assets/images/products/'.$item->image)}}" alt="product">
                            </a>
                            <div class="product-card-action product-card-action-2">
                                <a href="{{url('product_details/'.$item->id)}}" class="quickview-btn btn-primary">QUICK VIEW</a>
                                <a class="addtocart-btn btn-primary" onclick="addtocart({{$item->id}})">ADD TO CART</a>
                            </div>
                        </div>
                        <div class="product-card-details">
                            <h3 class="product-card-title"><a href="{{url('product_details/'.$item->id)}}">{{$item->name}}</a></h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@else
<div class="row mb-5">
    <div class="col-md-12 text-center">
        <h2>No products found</h2>
    </div>
</div>
@endif