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
                <h6 class="m-0 font-weight-bold text-primary">Subscriptions Details</h6>
            </div>

            <div class="card-body">

                <form method="POST" action="{{ route('profile.update') }}" autocomplete="off">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <input type="hidden" name="_method" value="PUT">

                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <?php
                                        $members = App\Customer::where('status', '=', '1')->get();

                                        $memberArray = [];
                                        foreach ($members as $member) {
                                            $memberArray[$member['id']] = $member['member_code'].' - '.$member['name'];
                                        }
                                    ?>
                                    {!! Form::label('member_id','Customers Code') !!}
                                    {!! Form::select('member_id',$memberArray,null,['class'=>'form-control
                                    selectpicker show-tick
                                    show-menu-arrow','id'=>'member_id','data-live-search' => 'true']) !!}
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    {!! Form::label('sales_id','Sales Name') !!}
                                    {!! Form::text('sales_id',Auth::user()->name,['class'=>'form-control', 'id' =>
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


                                    {!! Form::select('service_id',$serviceArray,null,['class'=>'form-control
                                    selectpicker show-tick
                                    show-menu-arrow','id'=>'service_id','data-live-search' => 'true']) !!}
                                </div>
                            </div>
                        </div>

                        <div id="generalservice">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group focused">
                                        {!! Form::label('bandwidth','Bandwidth') !!}
                                        {!! Form::text('bandwidth',null,['class'=>'form-control', 'id' =>
                                        'Waris_contact'])
                                        !!}
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group focused">
                                        {!! Form::label('bandwidth_type','') !!}
                                        {!! Form::select('bandwidth_type',array('Mbps' => 'Mbps', 'Gbps' =>
                                        'Gbps'),null,['class'=>'form-control
                                        selectpicker
                                        show-tick show-menu-arrow', 'id' => 'bandwidth_type']) !!}

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="matrixnet">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group focused">
                                        {!! Form::label('network_type','Network Type') !!}

                                        {!! Form::select('network_type',array('Local' => 'Local', 'International' =>
                                        'International', 'Mix' => 'Mix'),null,['class'=>'form-control
                                        selectpicker
                                        show-tick show-menu-arrow', 'id' => 'network_type']) !!}

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="matrixcloud">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group focused">
                                        {!! Form::label('memory','Memory') !!}
                                        {!! Form::text('memory',null,['class'=>'form-control', 'id' =>
                                        'memory'])
                                        !!}
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group focused">
                                        {!! Form::label('storage','Storage') !!}
                                        {!! Form::text('storage',null,['class'=>'form-control', 'id' =>
                                        'storage'])
                                        !!}
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group focused">
                                        {!! Form::label('processor','Processor') !!}

                                        {!! Form::text('processor',null,['class'=>'form-control', 'id' =>
                                        'processor']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="matrixdatacenter">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group focused">
                                        {!! Form::label('colocation','Colocation') !!}

                                        {!! Form::text('colocation',null,['class'=>'form-control', 'id' =>
                                        'colocation']) !!}
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group focused">
                                        {!! Form::label('rack','Rack') !!}
                                        {!! Form::text('rack',null,['class'=>'form-control', 'id' => 'rack'])
                                        !!}
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group focused">
                                        {!! Form::label('cage','Cage') !!}

                                        {!! Form::text('cage',null,['class'=>'form-control', 'id' => 'cage'])
                                        !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Button -->
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary">Create Subscription</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>

</div>

@endsection


@section('footer_script_init')
    <script type="text/javascript">
        $(document).ready(function () {
            gymie.servicedetails();
            gymie.subscription();
        });
    </script>
@endsection
