<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if ($request->has('search')){
            $products = Product::query()->where('name', 'LIKE', '%' .$request->search. '%')->get();
        } else {
            $products = Product::all();
        }

        return view('home', compact('products'));
    }

    public function showLogin()
    {
        return view('auth.passwords.register');
    }
}
