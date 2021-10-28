<?php
use Carbon\Carbon;
?>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <?php
            $members = App\Customer::where('status', '=', '1')->get();

            $memberArray = [];
            foreach ($members as $member) {
                $memberArray[$member['id']] = $member['member_code'].' - '.$member['name'];
            }
            ?>
            {!! Form::label('member_id','Customers Code') !!}
            {!! Form::select('member_id',$memberArray,null,['class'=>'form-control selectpicker show-tick
            show-menu-arrow','id'=>'member_id','data-live-search' => 'true']) !!}
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <?php
                    // $usaleser= User::all()->roleUser->role->name == 'Users';
                    $sales = App\User::lists('name', 'id');
                    $sale = $sales->where('id', '==' , \Auth::user()->id) ?>
            @if(Auth::user()->roleUser->role->id == '3')
            {!! Form::label('sales_id','Sales Name') !!}
            {!! Form::text('sales_id',Auth::user()->name,['class'=>'form-control', 'id' => 'sales_id','readonly' =>
            'readonly']) !!}

            @endif

            @if(Auth::user()->roleUser->role->name == 'Super Admin')
            {!! Form::label('sales_id','Sales Name') !!}

            {!! Form::select('sales_id',$sales,null,['class'=>'form-control selectpicker show-tick
            show-menu-arrow','name'=>'sales_id','data-live-search'=> 'true']) !!}
            @endif
        </div>
    </div>
</div>
<div id="servicesContainer">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group plan-id">
                <?php $plans = App\Plan::where('status', '=', '1')->get(); ?>

                <?php $services = App\Service::all();
                    $serviceArray = [];
                    foreach ($services as $service) {
                        $serviceArray[$service['id']] = $service['name'];
                    }
                ?>
                {!! Form::label('service_id','Services') !!}


                {!! Form::select('service_id',$serviceArray,null,['class'=>'form-control selectpicker show-tick
                show-menu-arrow','id'=>'service_id','data-live-search' => 'true']) !!}

                <!-- {!! Form::select('service_id',array('2' => 'MATRIX CLOUD', '3' =>
                'MATRIX DATA CENTER', '1' => 'MATRIXNET'),null,['class'=>'form-control
                selectpicker
                show-tick show-menu-arrow', 'id' => 'service_id']) !!} -->
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group plan-id">
                {!! Form::label('service_term','Billing Term') !!}

                {!! Form::select('service_term',array( '1' =>
                'MONTHLY', '2' => 'YEARLY'),null,['class'=>'form-control
                selectpicker
                show-tick show-menu-arrow', 'id' => 'service_term']) !!}
            </div>
        </div>


    </div>

    <div class="row">
        <div class="col-sm-4">
            <div class="form-group plan-start-date">
                {!! Form::label('rfs_date','RFS Date') !!}

                {!! Form::text('rfs_date',Carbon::today()->format('Y-m-d'),['class'=>'form-control
                datepicker-startdate childStartDate', 'id' => 'rfs_date', 'data-row-id' => '0']) !!}
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group plan-start-date">
                {!! Form::label('start_date','Commencement Date') !!}

                {!! Form::text('start_date',Carbon::today()->format('Y-m-d'),['class'=>'form-control
                datepicker-startdate childStartDate', 'id' => 'start_date', 'data-row-id' => '0']) !!}
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group plan-end-date">
                {!! Form::label('end_date','End Date') !!}

                {!! Form::text('end_date',Carbon::tomorrow()->format('Y-m-d'),['class'=>'form-control datepicker-startdate childStartDate', 'id' => 'end_date','data-row-id' => '0']) !!}
            </div>
        </div>

    </div> <!-- / Row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                {!! Form::label('status','Status') !!}
                {!! Form::select('status',array('1' => 'Active', '0' =>
                'Expired',),null,['class'=>'form-control selectpicker show-tick show-menu-arrow', 'id' =>
                'status']) !!}
            </div>
        </div>

    </div> <!-- / Row -->
</div>
<!-- <div class="row">
    <div class="col-sm-2 pull-right">
        <div class="form-group">
            <span class="btn btn-sm btn-primary pull-right" id="addSubscription">Add</span>
        </div>
    </div>
</div> -->