<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('adminLogout');
    }

    public function index()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        //Validate the form.
        $this->validate($request,[
            'userid' => 'required',
            'password' => 'required',
        ]);

        //Attempt to login the user.
        if(Auth::guard('admin')->attempt(['userid' => $request->userid, 'password' => $request->password],$request->remember)) {
            //If credentials valid, redirect to admin dashboard.
            return redirect()->route('admin-dashboard');
        }

        //If credentials invalid, redirect back with error.
        return back()->withInput([$request->only('userid','remember')]);
    }

    public function adminLogout()
    {
        Auth::guard('admin')->logout();
        if(!Auth::guard('web')->check())
            session()->invalidate();
        return redirect('/');
    }
}
