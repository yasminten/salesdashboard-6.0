<?php

namespace App\Http\Controllers;

use App\ChargesDetail;
use DB;
use JavaScript;
use App\Invoice;
use App\Service;
use App\Setting;
use Carbon\Carbon;
use App\CounterTable;
use App\Customer;
use App\CustomerType;
use App\Subscription;
use App\NetworkOwner;
use App\Quotations;
use App\ServiceDetail;
use App\TerminationPoint;
use App\TerminationPoints;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Sofa\Eloquence\Eloquence;

class SubscriptionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $subscriptions = Subscription::all();
        $subscriptionTotal = Subscription::all();
        $count = $subscriptionTotal->count();

        if (! $request->has('drp_start') or ! $request->has('drp_end')) {
            $drp_placeholder = 'Select daterange filter';
        } else {
            $drp_placeholder = $request->drp_start.' - '.$request->drp_end;
        }

        $request->flash();

        return view('subscriptions.index', compact('subscriptions', 'count', 'drp_placeholder'));
    }

    public function expiring(Request $request)
    {
        $expirings = Subscription::expiring($request->sort_field, $request->sort_direction, $request->drp_start, $request->drp_end)->search('"'.$request->input('search').'"')->paginate(10);
        $count = $expirings->total();

        if (! $request->has('drp_start') or ! $request->has('drp_end')) {
            $drp_placeholder = 'Select daterange filter';
        } else {
            $drp_placeholder = $request->drp_start.' - '.$request->drp_end;
        }

        $request->flash();

        return view('subscriptions.expiring', compact('expirings', 'count', 'drp_placeholder'));
    }

    public function expired(Request $request)
    {
        $allExpired = Subscription::expired($request->sort_field, $request->sort_direction, $request->drp_start, $request->drp_end)->search('"'.$request->input('search').'"')->paginate(10);
        $count = $allExpired->total();

        if (! $request->has('drp_start') or ! $request->has('drp_end')) {
            $drp_placeholder = 'Select daterange filter';
        } else {
            $drp_placeholder = $request->drp_start.' - '.$request->drp_end;
        }

        $request->flash();

        return view('subscriptions.expired', compact('allExpired', 'count', 'drp_placeholder'));
    }

    public function create()
    {
        $networkowners = NetworkOwner::all();

        
        $date =Carbon::today();

        return view('subscriptions.create', compact('networkowners'));
    }

    public function createDetails($id)
    {
        $subscription = Subscription::findorfail($id)->first();

        
        return view('subscriptions._details', compact('subscription'));
    }

    public function createQuotations($id)
    {
        $subscription_id = $id;

        
        return view('subscriptions._quotation', compact('subscription_id'));
    }

    // public function store(Request $request)
    // {
    //     DB::beginTransaction();
    //         // Generate CID
        
    //         $servicec = Service::where('id', '=' , $request->service_id)->first();

    //         $customerc = Customer::where('id', '=', $request->member_id)->first();

    //         $customertype = CustomerType::where('id', '=', $customerc->customer_type)->first();
            
    //         $year =Carbon::today()->format('y');

    //         $zeros = '';        
    
    //         $cidNumberMode = \Utilities::getCounter('cid_number_mode');
    
    //         if ($cidNumberMode == \constNumberingMode::Auto) {
    //             if($lastData = Subscription::latest()->whereYear('created_at', '=', Carbon::today())){
    //                 $cidCounter = \Utilities::getCounter('cid_last_number') + 1;
    //             }else{
    //                 $cidCounter = 1;
    //             }
    //         }
    
    //         if (strlen($cidCounter) == 1) {
    //             $zeros = "00000";
    //         } elseif (strlen($cidCounter) == 2) {
    //             $zeros = "0000";
    //         } elseif (strlen($cidCounter) == 3) {
    //             $zeros = "000";
    //         } elseif (strlen($cidCounter) == 4) {
    //             $zeros = "00";
    //         } elseif (strlen($cidCounter) ==5) {
    //             $zeros = "0";
    //         } elseif (strlen($cidCounter) ==6) {
    //             $zeros = "";
    //         }   

            
    //     $counter = CounterTable::findOrFail(1);
    //     $counter->update(['value' => $cidCounter]);
    //     $counter->save();

    //         $service_code = $servicec->description; 
    //         $customer_code = $customertype->code;
    //         $CID = $year.$service_code.$customer_code.$zeros.$cidCounter;
        

    //         // dd($CID);
    //     try {

    //         // Storing Service Details
    //         $serviceDetailData = [
    //             'member_id' => $request->member_id,
    //             'service_id' => $request->service_id,
    //             // 'addservice_id' =>'',
    //             'cid' => $CID,
    //             'bandwidth' => $request->bandwidth,
    //             'bandwidth_type' => $request->bandwidth_type,
    //             'network_type' => $request->network_type,
    //             'memory' => $request->memory,
    //             'storage' => $request->storage,
    //             'processor' => $request->processor,
    //             'colocation' => $request->colocation,
    //             'rack' => $request->rack,
    //             'cage' => $request->cage,
    //         ];
    //         $serviceDetail = new ServiceDetail($serviceDetailData);
    //         $serviceDetail->createdBy()->associate(Auth::user());
    //         $serviceDetail->updatedBy()->associate(Auth::user());
    //         $serviceDetail->save();


    //         // Storing subscription
    //         $subscriptionData = [
    //             'member_id' => $request->member_id,
    //             'sales_id' => $request->sales_id,
    //             'service_id' => $request->service_id,
    //             'servicedetail_id' => $serviceDetail->id,
    //             'service_term' => $request->service_term,
    //             'rfs_date' => $request->rfs_date,
    //             'start_date' => $request->start_date,
    //             'end_date' => $request->end_date,
    //             'status'=> \constSubscription::onGoing,
    //             'is_renewal' => '0',
    //         ];

    //         $subscription = new Subscription($subscriptionData);
    //         $subscription->createdBy()->associate(Auth::user());
    //         $subscription->updatedBy()->associate(Auth::user());
    //         $subscription->save();

    //         //Termination Points Details
    //         $terminationPointData = [
    //             'servicedetail_id' => $serviceDetail->id,
    //             'A_End' => $request->A_End,
    //             'B_End' => $request->B_End,
    //             'network_type' => $request->network_type,
    //             'network_owner' => $request->network_owner,
    //         ];

    //         $terminationPoint = new TerminationPoints($terminationPointData);
    //         $terminationPoint->createdBy()->associate(Auth::user());
    //         $terminationPoint->updatedBy()->associate(Auth::user());
    //         $terminationPoint->save();

    //         //Charges Details
    //         $chargesData = [
    //             'servicedetail_id' => $serviceDetail->id,
    //             'subscription_fee' => $request->subscription_fee,
    //             'installation_fee' => $request->installation_fee,
    //             'additional_fee' => $request->additional_fee,
    //             'notes' => $request->notes,
    //         ];

    //         $charges_details = new ChargesDetail($chargesData);
    //         $charges_details->createdBy()->associate(Auth::user());
    //         $charges_details->updatedBy()->associate(Auth::user());
    //         $charges_details->save();

    //         // // Set the subscription status of the 'Renewed' subscription to Renew
    //         // if ($request->has('previousSubscriptions')) {
    //         //     Subscription::where('invoice_id', $invoice->id)->update(['is_renewal' => '1']);

    //         //     foreach ($request->previousSubscriptions as $subscriptionId) {
    //         //         $oldSubscription = Subscription::findOrFail($subscriptionId);
    //         //         $oldSubscription->status = \constSubscription::renewed;
    //         //         $oldSubscription->updatedBy()->associate(Auth::user());
    //         //         $oldSubscription->save();
    //         //     }
    //         // }

    //         $cidCounter = \Utilities::getSetting('cid_last_number') + 1;

    //         DB::commit();
    //         flash()->success('Subscription was successfully created');

    //         return redirect(action('SubscriptionsController@index'));
    //     } catch (\Exception $e) {

    //         dd($e);
    //         DB::rollback();
    //         flash()->error('Error while creating the Subscription');

    //         return redirect(action('SubscriptionsController@index'));
    //     }
    // }

    public function store(Request $request)
    {
        try{
            $created_by = auth()->user()->id;
            $updated_by = auth()->user()->id;

            // Storing subscription
            $subscriptionData = Subscription::create([
                'member_id' => $request->member_id,
                'sales_id' => $request->sales_id,
                'service_id' => $request->service_id,
                'bandwidth'=> $request->bandwidth,
                'bandwidth_type'=> $request->bandwidth_type,
                'network_type'=> $request->network_type,
                'memory'=> $request->memory,
                'storage'=> $request-> storage,
                'processor'=> $request->processor,
                'colocation'=> $request->colocation,
                'rack'=> $request->rack,
                'cage'=> $request->cage,
                'status'=> '1',
                'notes' => $request->notes,
                'created_by' => $created_by,
                'updated_by' => $updated_by
            ]);


            return redirect(action('SubscriptionsController@index'));
        } catch (\Exception $e) {

            dd($e);

            return redirect(action('SubscriptionsController@index'));
        }
    }

    public function storeQuotations(Request $request)
    {
        try{
            $created_by = auth()->user()->id;
            $updated_by = auth()->user()->id;

            $year =Carbon::today()->format('y');

            $quotation_number = 'TEMP'.$year.$request->subscription_id;

            // Storing quotation
            $quotationData = Quotations::create([
                'subscription_id' => $request->subscription_id,
                'quotation_no' => $quotation_number,
                'subscription_fee' => $request->subscription_fee,
                'installation_fee'=> $request->installation_fee,
                'additional_fee'=> $request->additional_fee,
                'status'=> '1',
                'notes' => $request->notes,
                'created_by' => $created_by,
                'updated_by' => $updated_by
            ]);


            return redirect(action('SubscriptionsController@index'));
        } catch (\Exception $e) {

            dd($e);

            return redirect(action('SubscriptionsController@index'));
        }
    }

    public function storeDetails(Request $request)
    {

    }

    public function storeSOF(Request $request)
    {

    }

    public function edit($id)
    {
        $subscription = Subscription::findOrFail($id);
        // $carbonToday = Carbon::today()->format('Y-m-d');
        // $subscriptionEndDate = $subscription->end_date->format('Y-m-d');
        $diff = Carbon::today()->diffInDays($subscription->end_date);
        //$gymieDiff = $diff->format('Y-m-d');
        $gymieDiff = $subscription->end_date->addDays($diff);


        return view('subscriptions.edit', compact('subscription'));
    }

    public function show($id)
    {
        $subscription = Subscription::findOrFail($id);
        $quotations = Quotations::where('subscription_id','=',$id)->get();

        return view('subscriptions.show', compact('subscription', 'quotations', 'servicedetail', 'charges_details', 'terminationPoint', 'settings'));
    }

    public function showsubs($id)
    {
        $subscription = Subscription::findOrFail($id);
        $servicedetail = ServiceDetail::where('id', '=', $subscription->servicedetail_id)->get();
        $charges_details = ChargesDetail::where('servicedetail_id', '=', $subscription->servicedetail_id)->first();

        return view('subscriptions.show_sub', compact('subscription', 'servicedetail', 'charges_details', 'terminationPoint', 'settings'));
    }

    public function showproj($id)
    {
        $subscription = Subscription::findOrFail($id);
        $servicedetail = ServiceDetail::where('id', '=', $subscription->servicedetail_id)->get();
        $charges_details = ChargesDetail::where('servicedetail_id', '=', $subscription->servicedetail_id)->first();

        return view('subscriptions.show_proj',compact('subscription', 'servicedetail', 'charges_details', 'terminationPoint', 'settings'));
    }
    public function update($id, Request $request)
    {
        $subscription = Subscription::findOrFail($id);

        $subscription->update($request->all());
        $subscription->updatedBy()->associate(Auth::user());
        $subscription->save();

        return redirect('subscriptions/all');
    }

    public function renew($id, Request $request)
    {

        $subscription = Subscription::findOrFail($id);
        $servicedetail = ServiceDetail::where('id', $subscription->servicedetail_id)->first();
        $diff = Carbon::today()->diffInDays($subscription->end_date);
        $gymieDiff = $subscription->end_date->addDays($diff);

        return view('subscriptions.change', compact('subscription','servicedetail'));
    }

    public function cancelSubscription($id)
    {
        DB::beginTransaction();
        try {
            $subscription = Subscription::findOrFail($id);

            $subscription->update(['status' => \constSubscription::cancelled]);

            $subscription->customer->update(['status' => \constStatus::InActive]);

            DB::commit();
            flash()->success('Subscription was successfully cancelled');

            return redirect('subscriptions/expired');
        } catch (Exception $e) {
            DB::rollback();
            flash()->error('Error while cancelling the Subscription');

            return redirect('subscriptions/expired');
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try{
            $subscription = Subscription::findOrFail($id);
            $service_detail = ServiceDetail::where('id', $subscription->servicedetail_id)->first();
            $charges_details = ChargesDetail::where('servicedetail_id', $service_detail->id)->first();

            $charges_details->delete();
            $subscription->delete();
            $service_detail->delete();

            DB::commit();

            return back();
        } catch (\Exception $e) {
            DB::rollback();

            return back();
        }
    }

    public function change($id)
    {
        $subscription = Subscription::findOrFail($id);
        $servicedetail = ServiceDetail::where('id', $subscription->servicedetail_id)->first();
        $terminationPoints = TerminationPoint::where('servicedetail_id', $servicedetail->id)->first();
        $charges_detail = ChargesDetail::where('servicedetail_id', $servicedetail->id)->first();


        return view('subscriptions.change', compact('subscription','servicedetail', 'terminationPoints', 'charges_detail'));
    }

    public function modify($id, Request $request)
    {
        $subscription = Subscription::findOrFail($id);
        $servicedetail = ServiceDetail::where('id', $subscription->servicedetail_id)->first();
        $charges_detail = ChargesDetail::where('servicedetail_id', $servicedetail->id)->first();
        try {
            DB::beginTransaction();
            $servicedetail->update($request->all());

        $charges_detail->update($request->all());
        $subscription->update($request->all());

        $subscription->updatedBy()->associate(Auth::user());
        $subscription->save();

            DB::commit();

            return redirect(action('SubscriptionsController@show', ['id' => $subscription->id]));
        } catch (\Exception $e) {
            DB::rollback();

            return back();
        }
    }

    

    
}