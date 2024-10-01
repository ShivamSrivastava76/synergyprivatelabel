<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\View\View;
use App\Models\category;
use App\Models\variation;
use App\Models\Subcategory;
use App\Models\User;
use App\Models\enquiry;
use App\Models\EnquiryProduct;
use App\Models\contactUs;
use Carbon\Carbon; 


class IndexController extends Controller
{
    public $category;

    public function __construct() 
    {
        $this->category  = category::orderBy('id', 'asc')->where('status',0)->take(5)->get();

        $this->categories = category::with('subcategories')->get();
        
    }

    public function index()
    {
        $product = product::orderBy('updated_at', 'desc')->where('features',0)->where('status',0)->take(10)->get();
        $category = $this->category;
        $categories = $this->categories;
        
        return view('index', compact('product', 'category', 'categories'));
    }

    public function about_us(): View
    {
        $category = $this->category;
        $categories = $this->categories;
        return view('about_us', compact('category', 'categories'));
    }

    public function what_we_do(): View
    {
        $category = $this->category;
        $categories = $this->categories;
        return view('what_we_do', compact('category', 'categories'));
    }

    public function faq(): View
    {
        $category = $this->category;
        $categories = $this->categories;
        return view('faq', compact('category', 'categories'));
    }

    public function our_team(): View
    {
        $category = $this->category;
        $categories = $this->categories;
        return view('our_team', compact('category', 'categories'));
    }

    public function search(): View
    {
        $category = $this->category;
        $categories = $this->categories;
        return view('search', compact('category', 'categories'));
    }

    public function searchproductlist($key= null): View
    {
        $product = Product::orderBy('updated_at', 'desc')->where('status',0)->where('name', 'like', '%'.$key.'%')->get();

        return view('product', compact('product'));
    }

    public function contact(): View
    {
        $category = $this->category;
        $categories = $this->categories;
        return view('contact', compact('category', 'categories'));
    }

    public function products(): View
    {
        $category = $this->category;
        $categories = $this->categories;
        $product = Product::orderBy('updated_at', 'desc')->where('status',0)->get();
        return view('products', compact('product', 'category', 'categories'));
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
    public function categorysortproduct($key, $id)
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
        
        $products = category::with('products')->where('status',0)->find($id);
        
        return view('categorysortproduct', compact('products'));
    }

    public function custom_formulations(): View
    {
        $category = $this->category;
        $categories = $this->categories;
        return view('custom_formulations', compact('category', 'categories'));
    }

    public function label_design_how_does_it_work(): View
    {
        $category = $this->category;
        $categories = $this->categories;
        return view('label_design_how_does_it_work', compact('category', 'categories'));
    }

    public function privacy_policy(): View
    {
        $category = $this->category;
        $categories = $this->categories;
        return view('privacy_policy', compact('category', 'categories'));
    }

    public function term_and_conditions(): View
    {
        $category = $this->category;
        $categories = $this->categories;
        return view('term_and_conditions', compact('category', 'categories'));
    }

    public function product_details($id): View
    {
        $category = $this->category;
        $categories = $this->categories;
         $products = Product::where('status',0)->find($id);

         $subcategories = Subcategory::with('products')->get();

        $variation = variation::where('products_id', $id)->get();


        return view('product_details', compact('products', 'variation' , 'category', 'subcategories', 'categories'));
    }

    public function category($id): View
    {
        $category = $this->category;
        $categories = $this->categories;
        $products = category::with('products')->where('status',0)->find($id);

        return view('categoryproducts', compact('products', 'category', 'categories'));
    }

    public function subcategory($id): View
    {
        $category = $this->category;
        $categories = $this->categories;
        $products = Subcategory::with('products')->where('status',0)->find($id);

        return view('subcategoryproducts', compact('products', 'category', 'categories'));
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

        $ipCount = enquiry::where('ip_address', $ip)->where('status', 1)->count();
        if($ipCount > 0)
            return redirect()->back()->with('error', 'You IP Address Blocked By Admin Please contact to Admin!');
        
        $count = enquiry::where('ip_address', $ip)->where('created_at', '>=', Carbon::today()->subDay())->where('created_at', '<', Carbon::now())->count();

        if($count <= 10)
        {
            $enquiry = new enquiry();
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

            return redirect()->back()->with('success', 'Enquiry created successfully');
        }
        else
            return redirect()->back()->with('error', 'You have reached the daily limit of 10  products enquiry!');
    }

    public function contact_us(Request $request)
    {
        $contactus = new contactUs();
        $contactus->name = $request->name;
        $contactus->email = $request->email;
        $contactus->subject = $request->subject;
        $contactus->phone = $request->phone;
        $contactus->description = $request->description;
        $contactus->status = 0;
        $contactus->save();
    
        return redirect()->back()->with('success', 'Your message has been sent successfully!');

       
    }
}
