<?php

namespace App\Http\Controllers;

use \App\Models\Product;

class DetailController extends Controller
{

    public function index($id)
    {
        $detail = Product::query()->where('id',$id)->first();
        return view('detail.view', compact('detail'));
    }
}
