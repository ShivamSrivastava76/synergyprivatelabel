<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;

class AdminCategoryController extends Controller
{
    
    /**
     * Display a listing of the categories.
     */
    public function index()
    {
        // Fetch all categories from the database
        $categories = category::whereNull('deleted_at')
                      ->get();
        return view('admin.category.index', compact('categories'));        
    }
    
    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'categoryName' => 'required',
            'description' => 'nullable|string',
        ], [
            'categoryName.required' => 'The tilte field is required.',
            'description.string' => 'The description must be a string.',
        ]);

        try {
            $category = new category();
            $category->name = $validatedData['categoryName'];
            $category->description = $request['description'];
            $category->status = 0;
            $category->slug = str_replace(' ', '-', $request->categoryName);
            $category->save();
        
            return redirect()->route('admin.category.index')->with('success', 'Category added successfully!');
        } catch (QueryException $e) {
            // Return a user-friendly message for database errors
            return redirect()->back()->withErrors(['error' => 'There was a problem saving the category. Please check your input and try again.']);
        } catch (Exception $e) {
            // Return a user-friendly message for general errors
            return redirect()->back()->withErrors(['error' => 'An unexpected error occurred. Please try again later.']);
        }
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit($id)
    {
        $category = category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'nullable|string',
        ], [
            'name.required' => 'The category title is required.',
            'description.string' => 'The description must be a string.',
        ]);

        try {
            // Find the category and update it
            $category = category::findOrFail($id);
            $validatedData['slug'] = str_replace(' ', '-', $request->name);
            $category->update($validatedData);
    
            // Redirect to the index page with a success message
            return redirect()->route('admin.category.index')->with('success', 'Category updated successfully!');
        } catch (\Exception $e) {
            // Redirect back with an error message
            return redirect()->route('admin.category.index')->with('error', 'Failed to update the category. Please try again.');
        }
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy($id)
    {
        try {
            // Find the category or fail
            $category = category::findOrFail($id);
    
            // Perform soft delete
            $category->delete();
    
            // Redirect to the index page with a success message
            return redirect()->route('admin.category.index')->with('success', 'Category deleted successfully!');
        } catch (\Exception $e) {
            // Redirect back with an error message in case of failure
            return redirect()->route('admin.category.index')->with('error', 'Failed to delete the category. Please try again.');
        }
    }
    public function toggleStatus(Request $request)
    {
        try {
            $category = category::findOrFail($request->id);
            $category->status = $request->status;
            $category->save();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to update status.']);
        }
    }

}
