<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('index');
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

    public function contact()
    {
        return view('contact');
    }

    public function products()
    {
        return view('products');
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

    public function product_details()
    {
        return view('product_details');
    }
}
