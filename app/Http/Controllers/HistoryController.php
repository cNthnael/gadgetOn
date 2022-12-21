<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $transact = Transaction::query()->where('user_id', Auth::user()->id)->where('status', '!=', 0)->get();

        return view('history.index', compact('transact'));
    }
}
