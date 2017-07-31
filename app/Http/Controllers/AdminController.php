<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\package;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //Only the admin authenticated users should visit it.
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin');
    }
    public function add(Request $request)
    {
        $package = new package();
        $package->insert(['name'=>$request->pname,'details'=>$request->pdetails,'price'=>$request->pprice]);
        return back()->with('feed','success');
    }
}
