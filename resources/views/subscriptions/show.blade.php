@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Subscriptions') }}</h1>

@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger border-left-danger" role="alert">
    <ul class="pl-4 my-2">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="row">

    <div class="col-lg-12 order-lg-1">

        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Subscription</h6>
            </div>

            <div class="card-body">

                <form>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <?php
                                        $customer = App\Customer::where('id', '=', $subscription->member_id)->first();
                                    ?>
                                    {!! Form::label('member_id','Customers') !!}
                                    {!! Form::text('member_id',$customer->name,['class'=>'form-control', 'id'
                                    =>
                                    'member_id','readonly' =>
                                    'readonly']) !!}
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    {!! Form::label('sales_id','Sales Name') !!}
                                    {!! Form::text('sales_id',$subscription->sales_id,['class'=>'form-control', 'id' =>
                                    'sales_id','readonly' =>
                                    'readonly']) !!}

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group focused">
                                    <?php
                                        $service = App\Service::where('id', '=', $subscription->service_id)->first();
                                    ?>  
                                    {!! Form::label('service_id','Services') !!}


                                    {!! Form::text('service_id',$service->name,['class'=>'form-control',
                                    'id'=>'service_id','readonly' =>'readonly' ]) !!}
                                </div>
                            </div>
                        </div>



                        @if($subscription->service_id == 2)
                        <div id="matrixcloud">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group focused">
                                        {!! Form::label('memory','Memory') !!}
                                        {!! Form::text('memory',$subscription->memory,['class'=>'form-control',
                                        'id'=>'memory','readonly' =>'readonly' ]) !!}

                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group focused">
                                        {!! Form::label('storage','Storage') !!}
                                        {!! Form::text('storage',$subscription->storage,['class'=>'form-control',
                                        'id'=>'storage','readonly' =>'readonly' ]) !!}

                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group focused">
                                        {!! Form::label('processor','Processor') !!}
                                        {!! Form::text('processor',$subscription->processor,['class'=>'form-control',
                                        'id'=>'processor','readonly' =>'readonly' ]) !!}

                                    </div>
                                </div>
                            </div>
                        </div>

                        @elseif($subscription->service_id == 3)
                        <div id="matrixdatacenter">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group focused">
                                        {!! Form::label('colocation','Colocation') !!}
                                        {!! Form::text('colocation',$subscription->colocation,['class'=>'form-control',
                                        'id'=>'colocation','readonly' =>'readonly' ]) !!}

                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group focused">
                                        {!! Form::label('rack','Rack') !!}
                                        {!! Form::text('rack',$subscription->rack,['class'=>'form-control',
                                        'id'=>'rack','readonly' =>'readonly' ]) !!}

                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group focused">
                                        {!! Form::label('cage','Cage') !!}
                                        {!! Form::text('cage',$subscription->cage,['class'=>'form-control',
                                        'id'=>'cage','readonly' =>'readonly' ]) !!}

                                    </div>
                                </div>
                            </div>
                        </div>

                        @else
                        <div id="generalservice">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group focused">
                                        {!! Form::label('bandwidth','Bandwidth') !!}

                                        {!! Form::text('bandwidth',$subscription->bandwidth,['class'=>'form-control',
                                        'id'=>'bandwidth','readonly' =>'readonly' ]) !!}
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group focused">
                                        {!! Form::label('bandwidth_type','') !!}
                                        {!!
                                        Form::text('bandwidth_type',$subscription->bandwidth_type,['class'=>'form-control',
                                        'id'=>'bandwidth_type','readonly' =>'readonly' ]) !!}

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group focused">
                                        {!! Form::label('network_type','Network Type') !!}
                                        {!!
                                        Form::text('network_type',$subscription->network_type,['class'=>'form-control',
                                        'id'=>'network_type','readonly' =>'readonly' ]) !!}

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                    </div>


                </form>

            </div>

        </div>

    </div>

</div>


<!-- Subscription Detail -->
<div class="row">
    <div class="col-lg-12 order-lg-1">

        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Subscription Detail</h6>
            </div>

            <div class="card-body">
                <?php $servicedetails = App\ServiceDetail::where('subscription_id', '=', $subscription->id)->get();
                $countdetail = $servicedetails->count(); ?>


                <!-- Detail -->
                @if($countdetail ==0)
                    No Data
                @else
                    @include('subscriptions._subsdetail')
                @endif
                
            </div>


        </div>

    </div>
</div>


<!-- Quotation Detail -->
<div class="row">

    <div class="col-lg-12 order-lg-1">

        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Quotation History</h6>
            </div>

            <div class="card-body">


                @if($quotations->count() == 0)
                <h4 class="text-center padding-top-15">Sorry! No records found</h4>


                <!-- Button -->
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col text-center">
                            <button type="submit" class="btn btn-primary">
                                <a
                                    href="{{ action('SubscriptionsController@createQuotations',['id' => $subscription->id]) }}">

                                    Generate Quotation
                                </a>
                            </button>
                        </div>
                    </div>
                </div>

                @else
                <table id="quotations" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Quotation #</th>
                            <th>Generated By</th>
                            <th>Generated On</th>
                            <th>Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach ($quotations as $quotation)

                        <tr>
                            <td> {{$quotation->quotation_no}}</td>
                            <?php
                                        $user = App\User::where('id', '=', $quotation->created_by)->first();
                                    ?>  

                            <td> {{$user->name}}</td>
                            <td> {{$quotation->created_at}}</td>

                            <?php $status = App\StatusList::where('category', 'quotation')->where('variable', $quotation->status)->first(); ?>

                            <td> {{$status->name}}</td>
                            <td> 
                                <a href="#">Accept</a>
                                <a href="#">Terminate</a>
                            </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
                @endif

            </div>

        </div>

    </div>

</div>

@endsection


@section('footer_script_init')
<script type="text/javascript">
$(document).ready(function() {
    gymie.subscription();
});
</script>
@endsection