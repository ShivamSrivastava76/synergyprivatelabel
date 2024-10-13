<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rules;
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
use App\Models\AddToCard;
use Carbon\Carbon; 


class IndexController extends Controller
{

    public function __construct() 
    {
        $this->category  = category::orderBy('id', 'asc')->where('status',0)->take(5)->get();

        $this->categories = category::with('subcategories')->get();
        
        
    }

    public function index(): View
    {
        $product = product::with('Image')->orderBy('updated_at', 'desc')->where('features',0)->where('status',0)->take(10)->get();
        $category = $this->category;
        $categories = $this->categories;
        $group_categories = Subcategory::where('status',0)->where('in_group',0)->limit(3)->get();
        
        return view('index', compact('product', 'category', 'categories','group_categories'));
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

    // public function searchproductlist($key= null): View
    // {
    //     $product = Product::orderBy('updated_at', 'desc')->where('status',0)->where('name', 'like', '%'.$key.'%')->get();

    //     return view('product', compact('product'));
    // }
    public function searchproductlist(Request $request)
    {
        $query = $request->input('query');

        $products = Product::with('Image')->where('name', 'like', "%{$query}%")->get();
    
        return view('search-results', compact('products'));
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
        $product = Product::with('Image')->orderBy('updated_at', 'desc')->where('status',0)->get();
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
        
        $product = Product::with('Image')->orderBy($sortBy, $sortDirection)->where('status',0)->get();
        
        return view('product', compact('product'));
    }

    public function categorysortproduct($key, $name)
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
        
        $products = category::with('products')->where('status',0)->where('name',$name)->first();
        
        return view('categorysortproduct', compact('products'));
    }

    public function subcategorysortproduct($key, $name)
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
        
        $products = Subcategory::with('products')->where('status',0)->where('name',$name)->first();
        
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

    public function product_details($name): View
    {
        $category = $this->category;
        $categories = $this->categories;
        $products = Product::with('Image')->where('status',0)->where('name',$name)->first();

         $subcategories = Subcategory::with('products')->get();

        $variation = variation::where('products_id', $products->id)->get();


        return view('product_details', compact('products', 'variation' , 'category', 'subcategories', 'categories'));
    }

    public function category($name)
    {
        $category = $this->category;
        $categories = $this->categories;
        $products = category::with('products')->where('status',0)->where('name',$name)->first();
        

        return view('categoryproducts', compact('products', 'category', 'categories', 'name'));
    }

    public function subcategory($name): View
    {
        $category = $this->category;
        $categories = $this->categories;
        $products = Subcategory::with('products')->where('status',0)->where('name',$name)->first();

        return view('subcategoryproducts', compact('products', 'category', 'categories', 'name'));
    }

    public function enquiry(Request $request)
    {
        
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'], 
            'email' => ['required', 'email', 'max:255'], 
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'password_confirmation' => ['required'],
        ], [
            'first_name.required' => 'The first name is required.',
            'first_name.string' => 'The first name must be a valid string.',
            'first_name.max' => 'The first name cannot be longer than 255 characters.',
            'last_name.required' => 'The last name is required.',
            'last_name.string' => 'The last name must be a valid string.',
            'last_name.max' => 'The last name cannot be longer than 255 characters.',
            'company.string' => 'The company must be a valid string.',
            'company.max' => 'The company cannot be longer than 255 characters.',
            'email.required' => 'The email address is required.',
            'email.email' => 'Please provide a valid email address.',
            'phone.required' => 'Please provide a phone number.',
            'phone.regex' => 'The phone number format is invalid.',
            'phone.min' => 'The phone number must be at least 10 digits.',
            'password.required' => 'A password is required.',
            'password.confirmed' => 'The password confirmation does not match.',
            'password_confirmation.required' => 'Please confirm your password.',
        ]);

        $count = User::where('email', $request->email);

        if($count->count() === 0)
        {
            $user = new User();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->company = $request->company ?? null;
            $user->password = $request->password;
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

            $productIds = AddToCard::where('ip_address', $ip)->get();
           
            foreach ($productIds as $key => $productId) 
            {
                $enquiryproduct = new EnquiryProduct();
                $enquiryproduct->enquiries_id = $enquiry->id;
                $enquiryproduct->products_id = $productId->products_id; 
                $enquiryproduct->Key = $productId->Key; 
                $enquiryproduct->value = $productId->value; 
                $enquiryproduct->indices = $productId->indices; 
                $enquiryproduct->custom = $productId->custom; 
                if($request->customiable[$key] != '')
                {
                    $enquiryproduct->customiable = 0;
                    $enquiryproduct->formula = $request->customiable[$key];
                }
                else
                    $enquiryproduct->customiable = 1;
                $enquiryproduct->status = 0;
                $enquiryproduct->save();
                AddToCard::where('ip_address', $ip)->forceDelete();
            }

            return redirect()->back()->with('success', 'Enquiry created successfully');
        }
        else
            return redirect()->back()->with('error', 'You have reached the daily limit of 10  products enquiry!');
    }

    public function contactUs(Request $request)
    {
        // Define validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'description' => 'required|string|min:10|max:1000',
        ];

        // Define custom messages
        $messages = [
            'name.required' => 'The full name is required.',
            'name.string' => 'The full name must be a valid string.',
            'name.max' => 'The full name cannot be longer than 255 characters.',
            'email.required' => 'The email address is required.',
            'email.email' => 'Please provide a valid email address.',
            'subject.required' => 'Please enter a subject.',
            'subject.string' => 'The subject must be a valid string.',
            'subject.max' => 'The subject cannot be longer than 255 characters.',
            'phone.required' => 'Please provide a phone number.',
            'phone.regex' => 'The phone number format is invalid.',
            'phone.min' => 'The phone number must be at least 10 digits.',
            'description.required' => 'Please write your message.',
            'description.max' => 'Your message cannot exceed 1000 characters.',
        ];

        // Validate the request with custom messages
        $validatedData = $request->validate($rules, $messages);
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

    public function checkout()
    {
        $category = $this->category;
        $categories = $this->categories;
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
        {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } 
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else 
        {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        
        $addtocard =  AddToCard::with('products')->where('ip_address', $ip)->where('status', 0)->get();
      
        return view('checkout', compact('addtocard', 'category', 'categories'));
    }

    public function addtocart(Request $request)
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
        {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } 
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else 
        {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
    
        $existingItem = AddToCard::where('ip_address', $ip)->where('products_id', $request->id) ->count();

    
        if ($existingItem == 0) 
        {
            $addtocard = new AddToCard();
            $addtocard->ip_address = $ip;
            $addtocard->products_id = $request->id;
            $addtocard->Key = $request->keys;
            $addtocard->value = $request->vals;
            $addtocard->indices = $request->indices;
            $addtocard->custom = $request->va;
            $addtocard->status = 0;
            $addtocard->save();

            $cartCount = AddToCard::where('ip_address', $ip)->count();
            
            return response()->json(['status' => true, 'message' => $cartCount]);
        } 
        else
            return response()->json(['status' => false, 'message' => "This product is already in your cart"]);
    }

    public function addtocartview(Request  $request)
    {
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

        return AddToCard::where('ip_address', $ip)->count();
    }
}
