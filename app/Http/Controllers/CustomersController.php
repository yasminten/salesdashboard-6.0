<?php

namespace App\Http\Controllers;

use App\Customer;
use App\User;
use Illuminate\Http\Request;

class CustomersController extends Controller
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
    public function index(Request $request)
    {
        $users = User::count();
        $customers = Customer::paginate(20);

        $drp_placeholder = $this->drpPlaceholder($request);

        $widget = [
            'users' => $users,

        ];

        return view('customers.index', compact('widget', 'customers', 'drp_placeholder'));
    }

    public function create($id)
    {
        dd($id);
        return view('customers.create');
    }

    public function show($id)
    {
        $customer = Customer::findordail($id);

        return view('customers.edit', compact('customer'));
    }

    public function edit()
    {

    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return string
     */
    private function drpPlaceholder(Request $request)
    {
        if ($request->has('drp_start') and $request->has('drp_end')) {
            return $request->drp_start.' - '.$request->drp_end;
        }

        return 'Select daterange filter';
    }


}
