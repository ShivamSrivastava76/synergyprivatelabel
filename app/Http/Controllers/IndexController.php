<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\View\View;
use App\Models\category;
use App\Models\variation;
use App\Models\Subcategory;
use App\Models\User;
use App\Models\Enquiry;
use App\Models\EnquiryProduct;
use Carbon\Carbon; 


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

         $products = Product::where('status',0)->find($id);

         $subcategories = Subcategory::with('products')->get();

        $variation = variation::where('products_id', $id)->get();


        return view('product_details', compact('products', 'variation' , 'category', 'subcategories'));
    }

    public function category($id): View
    {
        $category = $this->category;

        $products = Product::with('category')->where('status',0)->find($id);

        return view('product_details', compact('products','product', 'category'));
    }

    public function enquiry(Request $request)
    {
        $count = User::where('email', $request->email);

        if($count->count() === 0)
        {
            $user = new User();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->role = 2;
            $user->save();
        }
        else
            $user = $count->first();
       
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            // Check if the IP is from shared internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            // Check if the IP is passed from a proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            // Default to REMOTE_ADDR
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        
        $count = Enquiry::where('ip_address', $ip)->where('created_at', '>=', Carbon::today()->subDay())->where('created_at', '<', Carbon::now())->count();

        if($count <= 10)
        {
            $enquiry = new Enquiry();
            $enquiry->user_id = $user->id;
            $enquiry->ip_address =  $ip;
            $enquiry->status = 0;
            $enquiry->save();

            $productIds = $request->product_id;
            if (is_string($productIds))
                $productIds = explode(',', $productIds);
            
           
            foreach ($productIds as $productId) 
            {
                $enquiryproduct = new EnquiryProduct();
                $enquiryproduct->enquiries_id = $enquiry->id;
                $enquiryproduct->products_id = $productId; 
                if(isset($request->customiable) != null)
                {
                    $enquiryproduct->customiable = 0;
                    $enquiryproduct->formula = $request->formula;
                }
                else
                    $enquiryproduct->customiable = 1;
                $enquiryproduct->status = 0;
                $enquiryproduct->save();
            }

            return redirect()->back()->with('success', 'Product added successfully!');
        }
        else
            return redirect()->back()->with('error', 'You have reached the daily limit of 10  products enquiry!');




    }
}
