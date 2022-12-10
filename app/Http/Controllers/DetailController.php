<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use \App\Models\Product;
use \App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class DetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $detail = Product::query()->where('id',$id)->first();
        return view('detail.view', compact('detail'));
    }

    public function checkout(Request $request, $id)
    {
        $detail = Product::query()->where('id',$id)->first();
        $date = Carbon::now();

        $transac_check = Transaction::query()->where('user_id', Auth::user()->id)->where('status', 0)->first();

        if (empty($transac_check))
        {
            $check = new Transaction;
            $check->user_id = Auth::user()->id;
            $check->transaction_date = $date;
            $check->total_price = 0;
            $check->status = 0;
            $check->save();
        }

        $new_transac = Transaction::query()->where('user_id', Auth::user()->id)->where('status', 0)->first();

        $val_check_detail = Cart::query()->where('product_id', $detail->id)->where('transaction_id', $new_transac->id)->first();

        if(empty($val_check_detail))
        {
            $check_detail = new Cart;
            $check_detail->product_id = $detail->id;
            $check_detail->transaction_id = $new_transac->id;
            $check_detail->quantity = $request->quantity_check;
            $check_detail->total_price = $detail->price*$request->quantity_check;
            $check_detail->save();
        } else
        {
            $check_detail = Cart::query()->where('product_id', $detail->id)->where('transaction_id', $new_transac->id)->first();
            $check_detail->quantity = $check_detail->quantity+$request->quantity_check;
            $new_total_price = $detail->price + $request->quantity_check;
            $check_detail->total_price = $check_detail->total_price+$new_total_price;
            $check_detail->update();
        }

        $check = $transac_check = Transaction::query()->where('user_id', Auth::user()->id)->where('status', 0)->first();
        $check->total_price = $check->total_price+$detail->price+$request->quantity_check;
        $check->update();

        Alert::success('Added to Cart!', 'New item has been added to your cart.');
        return redirect('home');
    }
}
