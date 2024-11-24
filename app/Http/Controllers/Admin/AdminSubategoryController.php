<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\category;

class AdminSubategoryController extends Controller
{
  
    public function index()
    {
        $subcategory = Subcategory::all();
        return view('admin.subcategory.index', compact('subcategory'));        
    }
    
    public function create()
    {
        $category = category::where('status', 0)->get();
        return view('admin.subcategory.create',compact('category'));
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'subcategoryName' => 'required',
            'categories_id' => 'required|exists:categories,id',
            'description' => 'nullable',
        ], [
            'subcategoryName.required' => 'The tilte field is required.'
        ]);

        try {
            $subcategory = new Subcategory();
            $subcategory->name = $validatedData['subcategoryName'];
            $subcategory->categories_id = $validatedData['categories_id'];
            $subcategory->description = $request['description'];
            $subcategory->status = 0;
            $subcategory->in_group = 1;
            $subcategory->slug = str_replace(' ', '-', $request->subcategoryName);
            $subcategory->save();
        
            return redirect()->route('admin.subcategory.index')->with('success', 'Subcategory added successfully!');
        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => 'There was a problem saving the subcategory. Please check your input and try again.']);
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An unexpected error occurred. Please try again later.']);
        }
    }
    
    public function edit($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $category = category::where('status', 0)->get();
        return view('admin.subcategory.edit', compact('subcategory', 'category'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'categories_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
        ], [
            'name.required' => 'The category title is required.',
            'categories_id.required' => 'Select categorie.',
        ]);

        try {
            $subcategory = Subcategory::findOrFail($id);
            $validatedData['slug'] = str_replace(' ', '-', $request->name);
            $subcategory->update($validatedData);
    
            return redirect()->route('admin.subcategory.index')->with('success', 'Subcategory updated successfully!');
        } catch (\Exception $e) {

            return redirect()->route('admin.subcategory.index')->with('error', 'Failed to update the subcategory. Please try again.');
        }
    }
    
    public function destroy($id)
    {
        try {
            $subcategory = Subcategory::findOrFail($id);
    
            $subcategory->delete();
    
            return redirect()->route('admin.subcategory.index')->with('success', 'Subcategory deleted successfully!');
        } catch (\Exception $e) {

            return redirect()->route('admin.subcategory.index')->with('error', 'Failed to delete the category. Please try again.');
        }
    }
    public function toggleStatus(Request $request)
    {
        try {
            $subcategory = Subcategory::findOrFail($request->id);
            $subcategory->status = $request->status;
            $subcategory->save();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to update status.']);
        }
    }
    public function toggleStatusGroup(Request $request)
    {
        // echo $request->group;
        try {
            $subcategory = Subcategory::findOrFail($request->id);
            $subcategory->in_group = $request->group;
            $subcategory->save();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to update status.']);
        }
    }
}
