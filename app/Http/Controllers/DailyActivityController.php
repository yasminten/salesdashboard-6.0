<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\DailyActivity;


class DailyActivityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $today = Carbon::now();

        $dailys = DB::table('daily_activity')
        ->select('client_name','building','floor','address','phone','pic','remarks')
        ->whereDate('created_at','=',$today)
        ->orderBy('created_at')
        ->get();

        return view('daily_activity.index',compact('dailys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('daily_activity.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $created_by = auth()->user()->id;

            // Storing Daily Activity
            $dailyActivityData = DailyActivity::create([
                'client_name' => $request->client_name,
                'building' => $request->building,
                'floor' => $request->floor,
                'address' => $request->address,
                'phone' => $request->phone,
                'pic' => $request->pic,
                'created_by' => $created_by,
                'remarks' => $request->remarks
            ]);


            return redirect(action('DailyActivityController@index'));
        } catch (\Exception $e) {

            dd($e);

            return redirect(action('DailyActivityController@index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
