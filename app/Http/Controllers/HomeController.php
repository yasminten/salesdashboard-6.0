<?php

namespace App\Http\Controllers;

use App\User;
use App\Customer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::count();
        $customers = Customer::count();
        $active = Customer::where('status','=', 1)->count();
        $inactive = Customer::where('status','=', 0)->count();


        $widget = [
            'users' => $users,
            'customers' => $customers,
            'active'=> $active,
            'inactive'=> $inactive,

            //...
        ];

        // return view('dashboard.index', compact('widget'));
        return view('home', compact('widget'));

    }
}
