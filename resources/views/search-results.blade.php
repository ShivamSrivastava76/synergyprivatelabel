
@if($products->count() > 0)
    
    @foreach($products as $product)
        <li>
            <a href="{{ url('/product_details/' . $product->name) }}" class="header">
                <img src="{{asset('asset/img/products/Moxx.jpg')}}"> {{ $product->name }}
            </a>
        </li>
    @endforeach
    
@else
    <p>No results found</p>
@endif

