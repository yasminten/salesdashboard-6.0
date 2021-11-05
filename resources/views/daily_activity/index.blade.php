<style>
    .btn-primary, .btn-info
    {
        color: white;
        font-weight: 700;
        background-color: #151A48;
    }

</style>
@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<div class="d-flex flex-row">
    {{-- <div class="col-lg-3"> --}}
        <h1 class="h3 text-gray-800">{{ __('Daily Activity') }}</h1>
    {{-- </div> --}}
    <div class="col-lg-2 mt-1">
        <span class="btn-sm btn-primary" style="background-color:#151A48;">Add new</span>
    </div>
</div>
<h5 class="mb-10" style="font-size: 12px;">Detail activity today</h5>

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
                <h6 class="m-0 font-weight-bold" style="color:#151A48;">Data Daily Activity</h6>
            </div>

            <br>

            <div class="pl-lg-2">
                <div class="col-lg-12">
                    <a href="{{ action('DailyActivityController@create') }}" class="page-head-btn btn-sm btn-primary active"
                        role="button" style="padding: 10px 20px; background-color:#151A48;font-weight:700;"><i class="fa fa-plus"></i> ADD
                    </a>
                </div>
            </div>

            <div class="card-body">

                <table id="subscription" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Client Name</th>
                            <th>Building</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th>PIC</th>
                            <th>Remarks</th>
                            <th class="text-center" style="width:14%">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach ($dailys as $daily)

                        <tr>

                            <td>{{ $daily->client_name }}</td>
                            <td>{{ $daily->building }} Lt. {{ $daily->floor }}</td>
                            <td>{{ $daily->address }}</td>
                            <td>{{ $daily->phone }}</td>
                            <td>{{ $daily->pic }}</td>
                            <td>{{ $daily->remarks }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-info" style="background-color: #151A48;">
                                        <a href="{{ url('/customers/create/'.$daily->id) }}" style="color:white;">
                                            Add Cust
                                        </a>
                                    </button>
                                </div>
                            </td>

                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection