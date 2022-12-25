<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormRequest;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Manage Product
    public function create()
    {
        $products = Product::all();
        return view('admin.create', compact('products'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'release' => 'required',
            'desc' => 'required',
            'price' => 'required',
            'image_path' => 'required|mimes:jpg,jpeg,png',
        ]);

        $file_name = $request->file('image_path')->getClientOriginalName();
        $image = $request->image_path->storeAs('upload', $file_name);

        $data = Product::query()->create([
            'name' => $request['name'],
            'release' => $request['release'],
            'desc' => $request['desc'],
            'price' => $request['price'],
            'image_path' => $image
        ]);

        Alert::success('Added to list!', 'New product has been added to list.');
        return redirect('list');
    }

    public function list(Request $request)
    {
        if ($request->hasAny('search')){
            $products = Product::query()->where('name', 'LIKE', '%' .$request->search. '%')->get();
        } else {
            $products = Product::all();
        }

        return view('admin.list', compact('products'));
    }

    public function destroy($id)
    {
        $products = Product::query()->where('id', $id)->first();

        $products->delete();
        Alert::error('Removed from list!', 'Your item has been removed from the list.');
        return redirect('list');
    }

    public function update($id)
    {
        $products = Product::query()->where('id', $id)->first();

        return view('admin.update', compact('products'));
    }

    public function update_store( $id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'release' => 'required',
            'desc' => 'required',
            'price' => 'required',
            'image_path' => 'required|mimes:jpg,jpeg,png',
        ]);

        $file_name = $request->file('image_path')->getClientOriginalName();
        $image = $request->image_path->storeAs('upload', $file_name);

        $products = Product::query()->where('id', $id)->first();
        $products->name = $request->name;
        $products->release = $request->release;
        $products->desc = $request->desc;
        $products->price = $request->price;
        $products->image_path = $image;

        $products->update();

        Alert::success('Product Updated!', 'Your product has been updated.');
        return redirect('list');
    }


    //Cart & Checkout
    public function cart()
    {
        $transact = Transaction::query()->where('user_id', Auth::user()->id)->where('status', 0)->first();
        if (!empty($transact))
        {
            $cart = Cart::query()->where('transaction_id', $transact->id)->get();
            return view('detail.cart', compact('transact', 'cart'));

        }
        return view('detail.cart', compact('transact'));
    }

    public function delete($id)
    {
        $cart = Cart::query()->where('id', $id)->first();

        $transact = Transaction::query()->where('id', $cart->transaction_id)->first();
        $transact->total_price = $transact->total_price-$cart->total_price;
        $transact->update();

        $cart->delete();

        Alert::error('Removed from Cart!', 'Your item has been removed from the cart.');
        return redirect('cart/{id}');

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
            $check_detail->quantity = $request->quantity;
            $check_detail->total_price = $detail->price*$request->quantity;
            $check_detail->save();
        } else
        {
            $check_detail = Cart::query()->where('product_id', $detail->id)->where('transaction_id', $new_transac->id)->first();
            $check_detail->quantity = $check_detail->quantity+$request->quantity;

            $new_total_price = $detail->price*$request->quantity;
            $check_detail->total_price = $check_detail->total_price+$new_total_price;
            $check_detail->update();
        }

        $check = Transaction::query()->where('user_id', Auth::user()->id)->where('status', 0)->first();
        $check->total_price = $check->total_price+$detail->price*$request->quantity;
        $check->update();

        Alert::success('Added to Cart!', 'New item has been added to your cart.');
        return redirect('cart/{id}');

    }

    public function confirm()
    {
        $transact = Transaction::query()->where('user_id', Auth::user()->id)->where('status', 0)->first();
        $transact->status = 1;
        $transact->update();

        Alert::success('Checkout Success!', "Thank You.");
        return redirect('cart/{id}');

    }
}
