<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Size;
use App\Models\products_size;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use DB;
// use Intervention\Image\Facades\Image;
class ProductController extends Controller
{
    
    // Display a listing of the products
    public function index()
    {
        $products = Product::with('category')->get();
        return view('admin.product.index', compact('products'));
    }
    // Show the form for creating a new product
    public function create()
    {
        $categories = Category::where('status',0)->get();
        $size = Size::all();
        return view('admin.product.create', compact('categories','size'));
    }
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'categories_id' => 'required|exists:categories,id',
            'size' => 'required|exists:sizes,id|array',
            'price' => 'nullable|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string',
        ], [
            'name.required' => 'The product name is required.',
            'categories_id.required' => 'Please select a category.',
            'categories_id.exists' => 'The selected category does not exist.',
            'image.required' => 'The product image is required.',
            'image.image' => 'The uploaded file must be an image.',
            'image.mimes' => 'Allowed image types are jpeg, png, jpg, gif, svg.',
            'image.max' => 'The image size should not be greater than 2MB.',
            'description.required' => 'The product description is required.',
        ]);
        try{
            // Handle the image upload if an image is provided
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $imagePath = public_path('assets/images/products/' . $imageName);
                $image->move(public_path('assets/images/products/'), $imageName);
                // Store the image name in the validated data array
                $validatedData['image'] = $imageName;
            
                $validatedData['status'] = 0;
                $validatedData['price'] = $validatedData['price'] ?? 0;
    
                // Create a new product with the validated data
                $product = Product::create($validatedData);
                $product->sizes()->attach($request->input('size'));
                // Redirect back with a success message
                return redirect()->route('admin.product.index')->with('success', 'Product added successfully!');
            }
        }catch(\Exception $e){
            // Redirect back with an error message
            return  $e;

            //  return redirect()->route('admin.product.create')->with('error', 'Failed to add product. Please try again.');

        }
    }
    /**
     * Show the form for editing the specified product.
     */
    public function edit($id)
    {
        // Retrieve all categories to populate the select dropdown
        $categories = Category::where('status', 0)->get();
        $product = Product::with('category','sizes')->findOrFail($id);
        $size = Size::all();
        return view('admin.product.edit', compact('product', 'categories', 'size'));
    }
    /**
 * Update the specified product in storage.
 */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'categories_id' => 'required|exists:categories,id',
            'size' => 'required|exists:sizes,id|array',
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
            // Find the product to update
            $product = Product::findOrFail($id);

            products_size::where('products_id', $id)->delete();

            // Handle the image upload if a new image is provided
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($product->image) {
                    $oldImagePath = public_path('assets/images/products/' . $product->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                // Upload the new image
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $imagePath = public_path('assets/images/products/' . $imageName);
                $image->move(public_path('assets/images/products/'), $imageName);

                // Add the image name to the validated data
                $validatedData['image'] = $imageName;
            }

            // Update the product with validated data
            $product->update($validatedData);
            $product->sizes()->attach($request->input('size'));
            // Redirect back with a success message
            return redirect()->route('admin.product.index')->with('success', 'Product updated successfully!');
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Error updating product: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->route('admin.product.edit', $id)->with('error', 'Failed to update product. Please try again.');
        }
    }
    /**
     * Remove the specified category from storage.
     */
    public function destroy($id)
    {
        try {
            // Find the category or fail
            $product = Product::findOrFail($id);
    
            // Perform soft delete
            $product->delete();
    
            // Redirect to the index page with a success message
            return redirect()->route('admin.product.index')->with('success', 'Product deleted successfully!');
        } catch (\Exception $e) {
            // Redirect back with an error message in case of failure
            return redirect()->route('admin.product.index')->with('error', 'Failed to delete the product. Please try again.');
        }
    }

    // Change product status
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

}
