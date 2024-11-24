<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
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
use App\Models\HearAboutOption;
use App\Models\HearAbout;
use Carbon\Carbon; 


class IndexController extends Controller
{

    public function __construct() 
    {
        $this->category  = category::orderBy('id', 'asc')->where('status',0)->take(5)->get();

        $this->categories = category::with('subcategories')->get();
        
        $this->HearAboutOption = HearAboutOption::where('status',0)->get();
    }

    public function index()
    {
        $HearAboutOption = HearAboutOption::where('status',0)->get();
        $category = $this->category;
        $categories = $this->categories;
        $HearAboutOption = $this->HearAboutOption;
        $group_categories = Subcategory::where('status',0)->where('in_group',0)->limit(3)->get();
        
        return view('index', compact('HearAboutOption', 'category', 'categories','group_categories'));
    }

    public function about_us(): View
    {
        $category = $this->category;
        $categories = $this->categories;
        $HearAboutOption = $this->HearAboutOption;
        return view('about_us', compact('category', 'categories', 'HearAboutOption'));
    }

    public function what_we_do(): View
    {
        $category = $this->category;
        $categories = $this->categories;
        $HearAboutOption = $this->HearAboutOption;
        return view('what_we_do', compact('category', 'categories', 'HearAboutOption'));
    }

    public function faq(): View
    {
        $category = $this->category;
        $categories = $this->categories;
        $HearAboutOption = $this->HearAboutOption;
        return view('faq', compact('category', 'categories', 'HearAboutOption'));
    }

    public function our_team(): View
    {
        $category = $this->category;
        $categories = $this->categories;
        $HearAboutOption = $this->HearAboutOption;
        return view('our_team', compact('category', 'categories', 'HearAboutOption'));
    }

    public function search(): View
    {
        $category = $this->category;
        $categories = $this->categories;
        $HearAboutOption = $this->HearAboutOption;
        return view('search', compact('category', 'categories', 'HearAboutOption'));
    }

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
        $HearAboutOption = $this->HearAboutOption;
        return view('contact', compact('category', 'categories', 'HearAboutOption'));
    }

    public function quote(): View
    {
        $category = $this->category;
        $categories = $this->categories;
        $HearAboutOption = $this->HearAboutOption;
        return view('quote', compact('category', 'categories', 'HearAboutOption'));
    }

    public function products(): View
    {
        $category = $this->category;
        $categories = $this->categories;
        $HearAboutOption = $this->HearAboutOption;
        $product = Product::with('Image')->orderBy('updated_at', 'desc')->where('status',0)->paginate(10);
        return view('products', compact('product', 'category', 'categories','HearAboutOption'));
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
            case 'old':
                $sortBy = 'updated_at';
                $sortDirection = 'asc';
                break;
            case 'new':
                $sortBy = 'updated_at';
                $sortDirection = 'desc';
                break;
        }
        
        $product = Product::with('Image')->orderBy($sortBy, $sortDirection)->where('status',0)->paginate(10);
        
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
            case 'old':
                $sortBy = 'updated_at';
                $sortDirection = 'asc';
                break;
            case 'new':
                $sortBy = 'updated_at';
                $sortDirection = 'desc';
                break;
        }

        
        $category = Category::where('status', 0)
        ->where('name', $name)
        ->first();
    
    if ($category) {
        $products = $category->products()
            ->where('status', 0)
            ->with('Image')
            ->orderBy($sortBy, $sortDirection)
            ->paginate(10);
    } else {
        $products = collect();
    }
        
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
            case 'old':
                $sortBy = 'updated_at';
                $sortDirection = 'asc';
                break;
            case 'new':
                $sortBy = 'updated_at';
                $sortDirection = 'desc';
                break;
        }
        $subcategory = Subcategory::where('name', 0)
            ->where('slug', $name)
            ->first();

        if ($subcategory) {
            $products = $subcategory->products()
                ->where('status', 0)
                ->orderBy($sortBy, $sortDirection)
                ->with('Image')
                ->paginate(10); // Adjust the number of items per page as needed
        } else {
            $products = collect(); // Return an empty collection if the subcategory is not found
        }
        
        return view('categorysortproduct', compact('products'));
    }

    public function custom_formulations(): View
    {
        $category = $this->category;
        $categories = $this->categories;
        $HearAboutOption = $this->HearAboutOption;
        return view('custom_formulations', compact('category', 'categories','HearAboutOption'));
    }

    public function label_design_how_does_it_work(): View
    {
        $category = $this->category;
        $categories = $this->categories;
        $HearAboutOption = $this->HearAboutOption;
        return view('label_design_how_does_it_work', compact('category', 'categories','HearAboutOption'));
    }

    public function privacy_policy(): View
    {
        $category = $this->category;
        $categories = $this->categories;
        $HearAboutOption = $this->HearAboutOption;
        return view('privacy_policy', compact('category', 'categories', 'HearAboutOption'));
    }

    public function term_and_conditions(): View
    {
        $category = $this->category;
        $categories = $this->categories;
        $HearAboutOption = $this->HearAboutOption;
        return view('term_and_conditions', compact('category', 'categories', 'HearAboutOption'));
    }

    public function product_details($name): View
    {
        $category = $this->category;
        $categories = $this->categories;
        $HearAboutOption = $this->HearAboutOption;
        $products = Product::with('Image')->where('status',0)->where('slug',$name);

        if($products->count() != 0)
        {
            $products =  $products->first();

            $subcategories = Product::with('Image')
                ->whereHas('categories', function($query) use ($products) {
                    $query->whereIn('categories.id', $products->categories->pluck('id'));
                })
                ->where('id', '!=', $products->id)
                ->where('status', 0)
                ->inRandomOrder() 
                ->take(8)
                ->get();

            $variation = Variation::where('products_id', $products->id)->get();


            return view('product_details', compact('products', 'variation' , 'category', 'subcategories', 'categories', 'HearAboutOption'));
        }
        else
            return view('errors.404');
    }

    public function category($name)
    {
        $category = $this->category;
        $categories = $this->categories;
        $HearAboutOption = $this->HearAboutOption;
        $catego= Category::with('products.Image')
        ->where('status', 0)
        ->where('slug', $name)
        ->first();

        $products = $catego->products()->where('status',0)->paginate(10);
        
        return view('categoryproducts', compact('products', 'category', 'categories', 'name', 'HearAboutOption'));
    }

    public function subcategory($name)
    {
        $category = $this->category;
        $categories = $this->categories;
        $HearAboutOption = $this->HearAboutOption;
          
         $subcategory = Subcategory::where('status', 0)
        ->where('slug', $name)
        ->first();


        $name = $subcategory->name;
        
        $products = $subcategory->products()->with('image')->paginate(10);

        return view('subcategoryproducts', compact('products', 'category', 'categories', 'name', 'HearAboutOption'));
    }

    public function enquiry(Request $request)
    {
        if(!Auth::check())
            return redirect()->route('login');


        $output = [];
        exec('getmac', $output);

        // Loop through the command output to find the first valid MAC address
        $ip = null;
        foreach ($output as $line) {
            // Use regex to find a MAC address pattern
            if (preg_match('/([0-9A-F]{2}(-[0-9A-F]{2}){5})/i', $line, $matches)) {
                $ip = $matches[0]; // Extract the MAC address
                break;
            }
        }

        $ipCount = enquiry::where('ip_address', $ip)->where('status', 1)->count();
        if($ipCount > 0)
            return redirect()->back()->with('error', 'You IP Address Blocked By Admin Please contact to Admin!');
        
         $count = enquiry::where('ip_address', $ip)->where('created_at', '>=', Carbon::today()->subDay())->where('created_at', '<', Carbon::now())->count();

        if($count <= 10)
        {
            $enquiry = new enquiry();
            $enquiry->user_id = Auth::user()->id;
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

    public function quoteInfo(Request $request)
    {
        // Define validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'hearAbout' => 'required',
            'description' => 'required|string',
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
            'hearAbout.required' => 'Please Select any one option.',
            'phone.regex' => 'The phone number format is invalid.',
            'description.required' => 'Please write your message.',
        ];

        // Validate the request with custom messages
        $validatedData = $request->validate($rules, $messages);
        $hearaboutoption = new contactUs();
        $hearaboutoption->name = $request->name;
        $hearaboutoption->email = $request->email;
        $hearaboutoption->subject = $request->subject;
        $hearaboutoption->phone = $request->phone;
        $hearaboutoption->description = $request->description;
        $hearaboutoption->hear_about_options_id = $request->hearAbout;
        $hearaboutoption->status = 0;
        $hearaboutoption->save();
    
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }

    public function checkout()
    {
        $category = $this->category;
        $categories = $this->categories;
        $HearAboutOption = $this->HearAboutOption;
        $output = [];
        exec('getmac', $output);

        // Loop through the command output to find the first valid MAC address
        $ip = null;
        foreach ($output as $line) {
            // Use regex to find a MAC address pattern
            if (preg_match('/([0-9A-F]{2}(-[0-9A-F]{2}){5})/i', $line, $matches)) {
                $ip = $matches[0]; // Extract the MAC address
                break;
            }
        }
        
        $addtocard =  AddToCard::with(['products' => function ($query) {
        $query->with('Image'); 
        }])->where('ip_address', $ip)->where('status', 0)->get();
      
        return view('checkout', compact('addtocard', 'category', 'categories', 'HearAboutOption'));
    }

    public function addtocart(Request $request)
    {
        $output = [];
        exec('getmac', $output);

        // Loop through the command output to find the first valid MAC address
        $ip = null;
        foreach ($output as $line) {
            // Use regex to find a MAC address pattern
            if (preg_match('/([0-9A-F]{2}(-[0-9A-F]{2}){5})/i', $line, $matches)) {
                $ip = $matches[0]; // Extract the MAC address
                break;
            }
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

    public function addtocartdel(Request $request)
    {
        $output = [];
        exec('getmac', $output);

        // Loop through the command output to find the first valid MAC address
        $ip = null;
        foreach ($output as $line) {
            // Use regex to find a MAC address pattern
            if (preg_match('/([0-9A-F]{2}(-[0-9A-F]{2}){5})/i', $line, $matches)) {
                $ip = $matches[0]; // Extract the MAC address
                break;
            }
        }
    
        AddToCard::where('ip_address', $ip)->where('id', $request->id)->forceDelete();
        
        return response()->json(['status' => true]);
      
    }

    public function addtocartview(Request  $request)
    {
        $output = [];
        exec('getmac', $output);

        // Loop through the command output to find the first valid MAC address
        $ip = null;
        foreach ($output as $line) {
            // Use regex to find a MAC address pattern
            if (preg_match('/([0-9A-F]{2}(-[0-9A-F]{2}){5})/i', $line, $matches)) {
                $ip = $matches[0]; // Extract the MAC address
                break;
            }
        }

        return AddToCard::where('ip_address', $ip)->count();
    }
}
