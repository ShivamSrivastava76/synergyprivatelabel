<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\category;
use App\Models\Subcategory;
use App\Models\productsCategory;
use App\Models\productsSubcategory;
use App\Models\ProductImage;
use App\Models\variation;
use Illuminate\Support\Facades\Log;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class StaffProductController extends Controller
{

    public function index()
    {
        $products = product::with(['category', 'Image'])->whereNull('deleted_at')->get();
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
            'description' => 'required|string',
            'features' => 'nullable',
        ], [
            'name.required' => 'The product name is required.',
            'categories_id.required' => 'Please select a category.',
            'categories_id.exists' => 'The selected category does not exist.',
            'subcategories_id.required' => 'Please select a subcategory.',
            'subcategories_id.exists' => 'The selected subcategory does not exist.',
            'description.required' => 'The product description is required.',
        ]);
        try{

                $validatedData['status'] = 0;
                $validatedData['price'] = $validatedData['price'] ?? 0;
                
                if( $request->features  == 'on')
                    $validatedData['features'] = 0;
                else
                    $validatedData['features'] = 1;
                    
                $validatedData['slug'] = str_replace(' ', '-', $request->name);
                
                $product = product::create($validatedData);
                
                 foreach ($request->file('images') as $image) 
                {

                    // Generate a unique name for the image
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    
                    // Define paths for each size
                    $path150 = public_path('assets/images/products/150x150/'.$imageName);
                    $path500 = public_path('assets/images/products/500x500/'.$imageName);
                    $path1500 = public_path('assets/images/products/1500x1500/'.$imageName);
                    
                    // create image manager with desired driver
                    $manager = new ImageManager(new Driver());

                    
                    // open an image file
                    $image1 = $manager->read($image);
                  $image1 = $manager->read($image);

                    // Resize and save 1500x1500 image
                    $image1500 = $image1->resize(1500, 1500);
                    $image1500->save($path1500);
            
                    // Resize and save 500x500 image
                    $image500 = $image1->resize(500, 500);
                    $image500->save($path500);
            
                    // Resize and save 150x150 image
                    $image150 = $image1->resize(150, 150);
                    $image150->save($path150);
               
                    // Save the original image name in the database (for reference)
                    $ProductImage = new ProductImage();
                    $ProductImage->products_id = $product->id;
                    $ProductImage->image = $imageName;
                    $ProductImage->status = 0;
                    $ProductImage->save();
                }
                
                $product->productsCategory()->attach($request->input('categories_id'));
                $product->productsSubcategory()->attach($request->input('subcategories_id'));

                $count = $request->input('count');
                $productsData = [];

                for ($i=1; $i<= $count; $i++) 
                {
                    $name = $request->input('variation_name_' . $i);
                    $value = $request->input('variation_value_' . $i);
                    
                    $name = is_array($name) ? implode(',', $name) : $name;
                    $value = is_array($value) ? implode(',', $value) : $value;
                    
                    variation::create([
                        'name' => $name, 
                        'value' => $value, 
                        'products_id' => $product->id,
                    ]);
                }
                
                return redirect()->route('admin.product.index')->with('success', 'Product added successfully!');
            
        }catch (\Exception $e) {
            Log::error('Image upload error: ' . $e->getMessage());
            return response()->json(['error' => 'Image upload failed.'], 500);
        }
    }
   
    public function edit($id)
    {
        
        $variation = variation::where('products_id', $id)->get();
        $categories = category::where('status', 0)->get();
        $productsCategory = productsCategory::where('products_id', $id)->get();
        $productsSubcategory = productsSubcategory::where('products_id', $id)->get();
        $product = Product::with(['category', 'Image'])->findOrFail($id);
        return view('staff.product.edit', compact('product', 'categories', 'variation', 'productsCategory', 'productsSubcategory'));
    }
    
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'categories_id' => 'required|exists:categories,id',
            'price' => 'nullable|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
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
            
            $product = product::findOrFail($id);
            variation::where('products_id', $id)->forceDelete();
        $count = $request->input('count');
            $productsData = [];

            for ($i = 1; $i <= $count; $i++) {
                $name = $request->input('variation_name_' . $i);
                $value = $request->input('variation_value_' . $i);
                
                $name = is_array($name) ? implode(',', $name) : $name;
                $value = is_array($value) ? implode(',', $value) : $value;
                
                variation::create([
                    'name' => $name, 
                    'value' => $value, 
                    'products_id' => $product->id,
                ]);
            }

            if ($request->hasFile('images')) 
            {
                
                ProductImage::where('products_id',$id)->forceDelete();
                
                foreach ($request->file('images') as $image) 
                {

                    // Generate a unique name for the image
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    
                    // Define paths for each size
                    $path150 = public_path('assets/images/products/150x150/'.$imageName);
                    $path500 = public_path('assets/images/products/500x500/'.$imageName);
                    $path1500 = public_path('assets/images/products/1500x1500/'.$imageName);
                    
                    // create image manager with desired driver
                    $manager = new ImageManager(new Driver());

                    
                    // open an image file
                    $image1 = $manager->read($image);
                  $image1 = $manager->read($image);

                    // Resize and save 1500x1500 image
                    $image1500 = $image1->resize(1500, 1500);
                    $image1500->save($path1500);
            
                    // Resize and save 500x500 image
                    // $image500 = $image1->scale(width: 500);
                    $image500 = $image1->resize(500, 500);
                    $image500->save($path500);
            
                    // Resize and save 150x150 image
                    $image150 = $image1->resize(150, 150);
                    $image150->save($path150);
               
                    // Save the original image name in the database (for reference)
                    $ProductImage = new ProductImage();
                    $ProductImage->products_id = $id;
                    $ProductImage->image = $imageName;
                    $ProductImage->status = 0;
                    $ProductImage->save();
                }
            }
           
            $validatedData['slug'] = str_replace(' ', '-', $request->name);
            $validatedData['slug'] = str_replace(' ', '-', $request->name);
            $product->update($validatedData);
            
            productsCategory::where('products_id', $id)->forceDelete();
            $product->productsCategory()->attach($request->input('categories_id'));
            
            productsSubcategory::where('products_id', $id)->forceDelete();
            $product->productsSubcategory()->attach($request->input('subcategories_id'));

            
            
            return redirect()->route('admin.product.index')->with('success', 'Product updated successfully!');
        } catch (\Exception $e) {
            return $e->getMessage();
            Log::error('Error updating product: ' . $e->getMessage());
            return redirect()->route('admin.product.edit', $id)->with('error', 'Failed to update product. Please try again.');
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
