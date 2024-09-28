<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('admin.product.index', compact('products'));
    }
    
    public function create()
    {
        $categories = Category::where('status',0)->get();
        
        return view('admin.product.create', compact('categories'));
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
            
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $imagePath = public_path('assets/images/products/' . $imageName);
                $image->move(public_path('assets/images/products/'), $imageName);
                $validatedData['image'] = $imageName;
            
                $validatedData['status'] = 0;
                $validatedData['price'] = $validatedData['price'] ?? 0;
    
                $product = Product::create($validatedData);

                $product->productsCategory()->attach($request->input('categories_id'));
                $product->productsSubcategory()->attach($request->input('subcategories_id'));

                return redirect()->route('admin.product.index')->with('success', 'Product added successfully!');
            }
        }catch(\Exception $e){
            return $e;
            return redirect()->route('admin.product.create')->with('error', 'Failed to add product. Please try again.');
        }
    }
   
    public function edit($id)
    {
        
        $categories = Category::where('status', 0)->get();
        $product = Product::with('category')->findOrFail($id);
        return view('admin.product.edit', compact('product', 'categories'));
    }
    
    public function update(Request $request, $id)
    {
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'categories_id' => 'required|exists:categories,id',
            'price' => 'nullable|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string',
        ], [
            'name.required' => 'The product name is required.',
            'categories_id.required' => 'Please select a category.',
            'categories_id.exists' => 'The selected category does not exist.',
            'image.image' => 'The uploaded file must be an image.',
            'image.mimes' => 'Allowed image types are jpeg, png, jpg, gif, svg.',
            'image.max' => 'The image size should not be greater than 2MB.',
            'description.required' => 'The product description is required.',
        ]);

        try {
            
            $product = Product::findOrFail($id);

            if ($request->hasFile('image')) {
                
                if ($product->image) {
                    $oldImagePath = public_path('assets/images/products/' . $product->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $imagePath = public_path('assets/images/products/' . $imageName);
                $image->move(public_path('assets/images/products/'), $imageName);

                $validatedData['image'] = $imageName;
            }

            $product->update($validatedData);
            
            return redirect()->route('admin.product.index')->with('success', 'Product updated successfully!');
        } catch (\Exception $e) {
            Log::error('Error updating product: ' . $e->getMessage());
            return redirect()->route('admin.product.edit', $id)->with('error', 'Failed to update product. Please try again.');
        }
    }
    
    
    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
    
            $product->delete();
    
            return redirect()->route('admin.product.index')->with('success', 'Product deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('admin.product.index')->with('error', 'Failed to delete the product. Please try again.');
        }
    }
    
    public function toggleStatus(Request $request)
    {
        try {
            $product = Product::findOrFail($request->id);
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
       
        return view('admin.product.subcategory', compact('subcategory'));  
    }
}
