<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::query()->where('id', Auth::user()->id)->first();

        return view('profile.index', compact('user'));
    }

    public function edit(Request $request){

        $this->validate($request, [
            'password' => 'confirmed',
        ]);

        $user = User::query()->where('id', Auth::user()->id)->first();
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->address = $request->address;

        if (!empty($request->password))
        {
            $user->password = Hash::make($request->password);
        }
        $user->update();

        Alert::success('Profile Updated!', 'Your profile has been saved.');
        return redirect('profile');

    }
}
