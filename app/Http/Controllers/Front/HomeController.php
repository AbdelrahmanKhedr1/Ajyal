<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

        $products = Product::with('category')->active()->latest()->limit(8)->get(); //عملت هنا ويز كاتيجوري عشان في صفحه الهوم عامل فورايتش علي البرودكت  ودي اسمها ايجر لودنج
        return view('front.home',compact('products'));
    }
}
