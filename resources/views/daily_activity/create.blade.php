@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Daily Activity') }}</h1>

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
                <h6 class="m-0 font-weight-bold text-primary">Create Daily Activity</h6>
            </div>

            <div class="card-body">

                <form method="POST" action="#">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="pl-lg-4">
                        <div class="row">
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
                            <div class="col-lg-12">
                                <div class="form-group focused">
                                    {!! Form::label('address','Address') !!}
                                    {!! Form::text('address',null,['class'=>'form-control', 'id' =>
                                    'address'])
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
                            <div class="col text-right">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>

</div>

@endsection


@section('footer_scripts')
<!-- <script src="{{ URL::asset('assets/js/subscription.js') }}" type="text/javascript"></script> -->
@endsection
@section('footer_script_init')
<script type="text/javascript">
$(document).ready(function() {
    gymie.servicedetails();
    gymie.subscription();
});
</script>
@endsection