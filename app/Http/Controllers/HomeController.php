<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Product;

class HomeController extends Controller

{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories=Category::take(6)->latest()->get();
        $products=Product::with(['galleries'])->take(9)->get();

        return view('pages.home',[
            'categories' => $categories,
            'products' => $products
        ]);
    }
}
