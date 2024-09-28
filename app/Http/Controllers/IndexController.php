<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function index(): View
    {
        $product = Product::orderBy('created_at', 'desc')->where('status',0)->take(10)->get();
        return view('index', compact('product'));
    }

    public function about_us()
    {
        return view('about_us');
    }

    public function what_we_do()
    {
        return view('what_we_do');
    }

    public function faq()
    {
        return view('faq');
    }

    public function our_team()
    {
        return view('our_team');
    }

    public function search()
    {
        return view('search');
    }

    public function searchproductlist($key= null)
    {
        $product = Product::orderBy('updated_at', 'desc')->where('status',0)->where('name', 'like', '%'.$key.'%')->get();

        return view('product', compact('product'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function products()
    {
        $product = Product::orderBy('updated_at', 'desc')->where('status',0)->get();
        return view('products', compact('product'));
    }

    public function sortproduct($key)
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

    public function custom_formulations()
    {
        return view('custom_formulations');
    }

    public function label_design_how_does_it_work()
    {
        return view('label_design_how_does_it_work');
    }

    public function privacy_policy()
    {
        return view('privacy_policy');
    }

    public function term_and_conditions()
    {
        return view('term_and_conditions');
    }

    public function product_details($id)
    {

        $products = Product::with('category','sizes')->where('status',0)->find($id);

        $product = Product::where('categories_id',$products->categories_id)->where('id', '!=',$id)->where('status',0)->orderBy('updated_at', 'desc')->take(5)->get();

        return view('product_details', compact('products','product'));
    }
}
