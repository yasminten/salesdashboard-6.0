@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Customers') }}</h1>

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
                    <h6 class="m-0 font-weight-bold text-primary">Create Customer</h6>
                </div>

                <div class="card-body">

                    <form method="POST" action="{{ route('profile.update') }}" autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        {!! Form::label('customer_status','Customer Status') !!}
                                        {!! Form::select('customer_status',array('1' => 'HOT','2' => 'PROSPECT'),null,['class' =>
                                        'form-control
                                        selectpicker show-tick show-menu-arrow', 'id' => 'customer_status']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        {!! Form::label('sap_member_code','SAP Member Code') !!}
                                        {!! Form::text('sap_member_code',null,['class'=>'form-control', 'id' =>
                                        'sap_member_code'])
                                        !!}
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        {!! Form::label('client_name','Client Name') !!}
                                        {!! Form::text('client_name',null,['class'=>'form-control', 'id' =>
                                        'client_name'])
                                        !!}
                                    </div>
                                </div>
                            </div>
    
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        {!! Form::label('building','Building') !!}
                                        {!! Form::text('building',null,['class'=>'form-control', 'id' =>
                                        'building'])
                                        !!}
                                    </div>
                                </div>
    
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        {!! Form::label('floor','Floor') !!}
                                        {!! Form::text('floor',null,['class'=>'form-control', 'id' =>
                                        'floor'])
                                        !!}
                                    </div>
                                </div>
                            </div>
    
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        {!! Form::label('address','Address') !!}
                                        {!! Form::text('address',null,['class'=>'form-control', 'id' =>
                                        'address'])
                                        !!}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        {!! Form::label('zip_code','Zip Code') !!}
                                        {!! Form::text('zip_code',null,['class'=>'form-control', 'id' =>
                                        'zip_code'])
                                        !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        {!! Form::label('address_2','Address 2') !!}
                                        {!! Form::text('address_2',null,['class'=>'form-control', 'id' =>
                                        'address_2'])
                                        !!}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        {!! Form::label('zip_code_2','Zip Code 2') !!}
                                        {!! Form::text('zip_code_2',null,['class'=>'form-control', 'id' =>
                                        'zip_code_2'])
                                        !!}
                                    </div>
                                </div>
                            </div>
    
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        {!! Form::label('phone','Phone Number') !!}
                                        {!! Form::text('phone',null,['class'=>'form-control', 'id' =>
                                        'phone'])
                                        !!}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        {!! Form::label('pic','PIC Name') !!}
                                        {!! Form::text('pic',null,['class'=>'form-control', 'id' =>
                                        'pic'])
                                        !!}
                                    </div>
                                </div>
                            </div>
    
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        {!! Form::label('remarks','Remarks') !!}
                                        {!! Form::textarea('remarks',null,['class'=>'form-control', 'id' => 'remarks', 'rows' => 5]) !!}
                                    </div>
                                </div>
                            </div>
    
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        {!! Form::text('sales_id',Auth::user()->name,['class'=>'form-control', 'id' =>
                                        'sales_id','hidden' =>
                                        'hidden']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col text-center">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection
