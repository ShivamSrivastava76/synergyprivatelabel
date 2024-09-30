@if(count($subcategory) >  0)
    <option value="">Select a SubCategory</option>
    @foreach($subcategory as $val)
        <option value="{{ $val->id }}">
            {{ $val->name }}
        </option>
    @endforeach
@else
    <option value="">No any  subcategory found</option>

@endif