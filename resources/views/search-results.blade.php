
@if($products->count() > 0)
    @foreach($products as $product)
        @if(isset($product->Image) != null &&  count($product->Image) > 0)
            <li>
                <a href="{{ url('/product-details/' . $product->slug) }}" class="header">
                    <img src="{{url('assets/images/products/150x150').'/'.$product->Image[0]->image}}"> {{ $product->name }}
                </a>
            </li>
        @else
            <li>
                <a href="{{ url('/product-details/' . $product->slug) }}" class="header">
                    <img src="{{asset('asset/img/products/Moxx.jpg')}}"> {{ $product->name }}
                </a>
            </li>
        @endif
    @endforeach
@else
    <p>No results found</p>
@endif

