<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\View\View;
use App\Models\category;

class IndexController extends Controller
{
    public $category;

    public function __construct() 
    {
        $this->category  = category::orderBy('id', 'asc')->where('status',0)->take(5)->get();
    }

    public function index(): View
    {
        $product = Product::orderBy('updated_at', 'desc')->where('status',0)->take(10)->get();
        $category = $this->category;
        return view('index', compact('product', 'category'));
    }

    public function about_us(): View
    {
        $category = $this->category;
        return view('about_us', compact('category'));
    }

    public function what_we_do(): View
    {
        $category = $this->category;
        return view('what_we_do', compact('category'));
    }

    public function faq(): View
    {
        $category = $this->category;
        return view('faq', compact('category'));
    }

    public function our_team(): View
    {
        $category = $this->category;
        return view('our_team', compact('category'));
    }

    public function search(): View
    {
        $category = $this->category;
        return view('search', compact('category'));
    }

    public function searchproductlist($key= null)
    {
        $product = Product::orderBy('updated_at', 'desc')->where('status',0)->where('name', 'like', '%'.$key.'%')->get();

        return view('product', compact('product'));
    }

    public function contact(): View
    {
        $category = $this->category;
        return view('contact', compact('category'));
    }

    public function products(): View
    {
        $category = $this->category;
        $product = Product::orderBy('updated_at', 'desc')->where('status',0)->get();
        return view('products', compact('product', 'category'));
    }

    public function sortproduct($key): View
    {
        $sortBy = 'updated_at';
        $sortDirection = 'asc';

        switch ($key) {
            case 'asc':
                $sortBy = 'name';
                $sortDirection = 'asc';
                break;
            case 'desc':
                $sortBy = 'name';
                $sortDirection = 'desc';
                break;
            case 'low':
                $sortBy = 'price';
                $sortDirection = 'asc';
                break;
            case 'high':
                $sortBy = 'price';
                $sortDirection = 'desc';
                break;
            case 'old':
                $sortBy = 'updated_at';
                $sortDirection = 'asc';
                break;
            case 'new':
                $sortBy = 'updated_at';
                $sortDirection = 'desc';
                break;
        }
        
        $product = Product::orderBy($sortBy, $sortDirection)->where('status',0)->get();
        
        return view('product', compact('product'));
    }

    public function custom_formulations(): View
    {
        $category = $this->category;
        return view('custom_formulations', compact('category'));
    }

    public function label_design_how_does_it_work(): View
    {
        $category = $this->category;
        return view('label_design_how_does_it_work', compact('category'));
    }

    public function privacy_policy(): View
    {
        $category = $this->category;
        return view('privacy_policy', compact('category'));
    }

    public function term_and_conditions(): View
    {
        $category = $this->category;
        return view('term_and_conditions', compact('category'));
    }

    public function product_details($id): View
    {
        $category = $this->category;

        $products = Product::with('category','sizes')->where('status',0)->find($id);

        $product = Product::where('categories_id',$products->categories_id)->where('id', '!=',$id)->where('status',0)->orderBy('updated_at', 'desc')->take(5)->get();

        return view('product_details', compact('products','product', 'category'));
    }

    public function category($id): View
    {
        $category = $this->category;

        $products = Product::with('category','sizes')->where('status',0)->find($id);

        return view('product_details', compact('products','product', 'category'));
    }
}
