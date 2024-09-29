@if(count($subcategory) >  0)
    @foreach($subcategory as $val)
        <option value="{{ $val->id }}" {{ in_array($val->id, $productsSubcategory->pluck('subcategories_id')->toArray()) ? 'selected' : '' }} >
            {{ $val->name }}
        </option>
    @endforeach
@else
    <option value="">No any  subcategory found</option>

@endif