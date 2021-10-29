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

                <form method="POST" action="" autocomplete="off">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <input type="hidden" name="_method" value="PUT">

                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <?php
                                        $customer = App\Customer::where('id', '=', $subscription->member_id)->get();
                                    ?>
                                    {!! Form::label('member_id','Customers Code') !!}
                                    {!! Form::text('member_id',$subscription->member_id,['class'=>'form-control', 'id'
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
                                    <?php $services = App\Service::all();
                                    $serviceArray = [];
                                    foreach ($services as $service) {
                                        $serviceArray[$service['id']] = $service['name'];
                                    }
                                    ?>
                                    {!! Form::label('service_id','Services') !!}


                                    {!! Form::text('service_id',$subscription->service_id,['class'=>'form-control',
                                    'id'=>'service_id','readonly' =>'readonly' ]) !!}
                                </div>
                            </div>
                        </div>

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
                        </div>

                        <div id="matrixnet">
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

                    </div>


                </form>

            </div>

        </div>

    </div>

</div>



<div class="row">

    <div class="col-lg-12 order-lg-1">

        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Subscription Detail</h6>
            </div>

            <div class="card-body">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group focused">
                            {!! Form::label('cid','Circuit ID') !!}
                            {!! Form::text('cid',null,['class'=>'form-control',
                            'id'=>'cid','readonly' =>'readonly' ]) !!}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group focused">
                            {!! Form::label('network_type','Network Type') !!}
                            {!! Form::text('network_type',null,['class'=>'form-control',
                            'id'=>'network_type','readonly' =>'readonly' ]) !!}

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group focused">
                            {!! Form::label('network_owner','Network Owner') !!}
                            {!! Form::text('network_owner',null,['class'=>'form-control',
                            'id'=>'network_owner','readonly' =>'readonly' ]) !!}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group focused">
                            {!! Form::label('rfs_date','RFS Date') !!}
                            {!! Form::text('rfs_date',null,['class'=>'form-control',
                            'id'=>'rfs_date','readonly' =>'readonly' ]) !!}

                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group focused">
                            {!! Form::label('activation_date','Activation Date') !!}
                            {!! Form::text('activation_date',null,['class'=>'form-control',
                            'id'=>'activation_date','readonly' =>'readonly' ]) !!}

                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group focused">
                            {!! Form::label('end_date','End Date') !!}
                            {!! Form::text('end_date',null,['class'=>'form-control',
                            'id'=>'end_date','readonly' =>'readonly' ]) !!}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group focused">
                            {!! Form::label('subscription_fee','Subscription Fee') !!}
                            {!! Form::text('subscription_fee',null,['class'=>'form-control',
                            'id'=>'subscription_fee','readonly' =>'readonly' ]) !!}

                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group focused">
                            {!! Form::label('installation_fee','Installation Fee') !!}
                            {!! Form::text('installation_fee',null,['class'=>'form-control',
                            'id'=>'installation_fee','readonly' =>'readonly' ]) !!}

                        </div>
                    </div>

                </div>
                <div class="row">

                    <div class="col-sm-6">
                        <div class="form-group focused">
                            {!! Form::label('additional_fee','Additional Fee') !!}
                            {!! Form::text('additional_fee',null,['class'=>'form-control',
                            'id'=>'additional_fee','readonly' =>'readonly' ]) !!}

                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group focused">
                            {!! Form::label('notes','Notes') !!}
                            {!! Form::text('notes',null,['class'=>'form-control',
                            'id'=>'notes','readonly' =>'readonly' ]) !!}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group focused">
                            {!! Form::label('A_End','A-End') !!}
                            {!! Form::textarea('A_End',null,['class'=>'form-control', 'id' => 'A_End', 'rows' =>
                            5,'readonly' =>'readonly'])
                            !!}

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group focused">
                            {!! Form::label('B__End','B-End') !!}
                            {!! Form::textarea('B__End',null,['class'=>'form-control', 'id' => 'B__End', 'rows' =>
                            5,'readonly' =>'readonly'])
                            !!}
                        </div>
                    </div>
                </div>




                <!-- Button -->
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col text-center">
                            <button type="submit" class="btn btn-primary">Add Subscription Detail</button>
                        </div>
                    </div>
                </div>

            </div>


        </div>

    </div>

</div>

<div class="row">

    <div class="col-lg-12 order-lg-1">

        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Quotation History</h6>
            </div>

            <div class="card-body">




                <!-- Button -->
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col text-center">
                            <button type="submit" class="btn btn-primary">Generate Quotation</button>
                        </div>
                    </div>
                </div>

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