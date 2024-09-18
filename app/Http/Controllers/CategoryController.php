<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // Fetch all categories from the database
        // $categories = Category::all(); // You can also use pagination here if needed

        // Return the view with the list of categories
        // return view('admin.category.index', compact('categories'));
        return view('admin.category.index');
        
    }
}
