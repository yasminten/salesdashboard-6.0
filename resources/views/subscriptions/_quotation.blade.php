@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Generate Quotations') }}</h1>

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
                <h6 class="m-0 font-weight-bold text-primary">Quotations Details</h6>
            </div>

            <div class="card-body">

                <form method="POST" action="{{ route('subscriptions.storequotations') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="pl-lg-4">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group focused">
                                    {!! Form::label('subscription_id','Subscription ID') !!}
                                    {!! Form::text('subscription_id',$subscription_id,['class'=>'form-control',
                                    'id'=>'subscription_id','readonly' =>'readonly' ]) !!}

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group focused">
                                    {!! Form::label('subscription_fee','Subscription Fee') !!}
                                    {!! Form::text('subscription_fee',null,['class'=>'form-control',
                                    'id'=>'subscription_fee' ]) !!}

                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group focused">
                                    {!! Form::label('installation_fee','Installation Fee') !!}
                                    {!! Form::text('installation_fee',null,['class'=>'form-control',
                                    'id'=>'installation_fee' ]) !!}

                                </div>
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-sm-6">
                                <div class="form-group focused">
                                    {!! Form::label('additional_fee','Additional Fee') !!}
                                    {!! Form::text('additional_fee',null,['class'=>'form-control',
                                    'id'=>'additional_fee' ]) !!}

                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group focused">
                                    {!! Form::label('notes','Notes') !!}
                                    {!! Form::text('notes',null,['class'=>'form-control',
                                    'id'=>'notes' ]) !!}

                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Button -->

                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary">Create Quotation</button>
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