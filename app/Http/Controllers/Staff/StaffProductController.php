<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\category;
use App\Models\Subcategory;
use App\Models\productsCategory;
use App\Models\productsSubcategory;
use App\Models\variation;
use Illuminate\Support\Facades\Log;

class StaffProductController extends Controller
{

    public function index()
    {
        $products = product::with('category')->whereNull('deleted_at')->get();
        return view('staff.product.index', compact('products'));
    }

    public function create()
    {
        $categories = category::where('status',0)->get();
        
        return view('staff.product.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'categories_id' => 'required|exists:categories,id',
            'subcategories_id' => 'required|exists:subcategories,id',
            'price' => 'nullable|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string',
        ], [
            'name.required' => 'The product name is required.',
            'categories_id.required' => 'Please select a category.',
            'categories_id.exists' => 'The selected category does not exist.',
            'subcategories_id.required' => 'Please select a subcategory.',
            'subcategories_id.exists' => 'The selected subcategory does not exist.',
            'image.required' => 'The product image is required.',
            'image.image' => 'The uploaded file must be an image.',
            'image.mimes' => 'Allowed image types are jpeg, png, jpg, gif, svg.',
            'image.max' => 'The image size should not be greater than 2MB.',
            'description.required' => 'The product description is required.',
        ]);
        try{
                $validatedData['status'] = 0;
                $validatedData['price'] = $validatedData['price'] ?? 0;
    
                $product = product::create($validatedData);

                if ($request->hasFile('images')) 
                {
                    foreach ($request->file('images') as $image) 
                    {
                        $imageName = time() . '_' . $image->getClientOriginalName();
                        $image->move(public_path('assets/images/products/'), $imageName);

                        $ProductImage = new ProductImage();
                        $ProductImage->products_id   = $product->id;
                        $ProductImage->image = $imageName;
                        $ProductImage->image = $imageName;
                        $ProductImage->status = 0;
                        $ProductImage->save();
                    }
                }

                $product->productsCategory()->attach($request->input('categories_id'));
                $product->productsSubcategory()->attach($request->input('subcategories_id'));

                $count = $request->input('count');
                $productsData = [];

                for ($i=1; $i<= $count; $i++) 
                {
                    variation::create([
                        'name' => implode(",", $request->input('variation_name_' . $i)),
                        'value' => implode(",", $request->input('variation_value_' . $i)),
                        'products_id' => $product->id,
                    ]); 
                }
                
                return redirect()->route('staff.product.index')->with('success', 'Product added successfully!');
            
        }catch(\Exception $e){
            return redirect()->route('staff.product.create')->with('error', 'Failed to add product. Please try again.');
        }
    }
   
    public function edit($id)
    {
        
        $variation = variation::where('products_id', $id)->get();
        $categories = category::where('status', 0)->get();
        $productsCategory = productsCategory::where('products_id', $id)->get();
        $productsSubcategory = productsSubcategory::where('products_id', $id)->get();
        $product = Product::with('category')->findOrFail($id);
        return view('staff.product.edit', compact('product', 'categories', 'variation', 'productsCategory', 'productsSubcategory'));
    }
    
    public function update(Request $request, $id)
    {
        productsSubcategory::where('products_id', $id)->forceDelete();
        productsCategory::where('products_id', $id)->forceDelete();
        variation::where('products_id', $id)->forceDelete();
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'categories_id' => 'required|exists:categories,id',
            'price' => 'nullable|numeric|min:0',
            'description' => 'required|string',
        ], [
            'name.required' => 'The product name is required.',
            'categories_id.required' => 'Please select a category.',
            'categories_id.exists' => 'The selected category does not exist.',
            'description.required' => 'The product description is required.',
        ]);

        try {
            
            $product = product::findOrFail($id);
            ProductImage::where('products_id',$id)->forceDelete();

            if ($request->hasFile('images')) 
            {
                foreach ($request->file('images') as $image) 
                {
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    $image->move(public_path('assets/images/products/'), $imageName);

                    $ProductImage = new ProductImage();
                    $ProductImage->products_id   = $id;
                    $ProductImage->image = $imageName;
                    $ProductImage->image = $imageName;
                    $ProductImage->status = 0;
                    $ProductImage->save();
                }
            }

            $product->update($validatedData);
            $product->productsCategory()->attach($request->input('categories_id'));
            $product->productsSubcategory()->attach($request->input('subcategories_id'));

            $count = $request->input('count');
            $productsData = [];

            for ($i = 1; $i <= $count; $i++) {
                variation::create([
                    'name' => $request->input('variation_name_' . $i), 
                    'value' => $request->input('variation_value_' . $i), 
                    'products_id' => $product->id,
                ]);
            }
            
            return redirect()->route('staff.product.index')->with('success', 'Product updated successfully!');
        } catch (\Exception $e) {
            return $e->getMessage();
            Log::error('Error updating product: ' . $e->getMessage());
            return redirect()->route('staff.product.edit', $id)->with('error', 'Failed to update product. Please try again.');
        }
    }
    
    
    public function destroy($id)
    {
        try {
            $product = product::findOrFail($id);
    
            $product->delete();
    
            return redirect()->route('staff.product.index')->with('success', 'Product deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('staff.product.index')->with('error', 'Failed to delete the product. Please try again.');
        }
    }
    
    public function toggleStatus(Request $request)
    {
        try {
            $product = product::findOrFail($request->id);
            $product->status = $request->status;
            $product->save();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to update status.']);
        }
    }

    public function sub_category(Request $request)
    {
        $id = explode(',', $request->id);
        $subcategory = Subcategory::whereIn('categories_id',$id)->get();
       
        return view('staff.product.subcategory', compact('subcategory'));  
    }

    public function subcategory(Request $request)
    {
        $id = explode(',', $request->id);
        $subcategory = Subcategory::whereIn('categories_id',$id)->get();
        $productsSubcategory = productsSubcategory::where('products_id',$request->product_id)->get();
       
        return view('staff.product.subcategorywithcategory', compact('subcategory', 'productsSubcategory'));  
    }
}
