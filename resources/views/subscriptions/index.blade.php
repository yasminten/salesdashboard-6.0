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
                <h6 class="m-0 font-weight-bold text-primary">All Subscriptions Data</h6>
            </div>

            <a href="{{ action('SubscriptionsController@create') }}" class="page-head-btn btn-sm btn-primary active"
                role="button">Add New</a>

            <div class="card-body">

                <table id="subscription" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Cust ID</th>
                            <th>Customers Name</th>
                            <th>Service Name</th>
                            <th>Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach ($subscriptions as $subscription)

                        <tr>

                            <td> {{ $subscription->customer->member_code}}</td>
                            <td>{{ $subscription->customer->name}}</td>
                            <td>{{ $subscription->service->name}}</td>

                            <?php $status = App\StatusList::where('category', 'subscription')->where('variable', $subscription->status)->first(); ?>

                            <td>{{ $status->name}}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-info">
                                        <a href="{{ action('SubscriptionsController@show',['id' => $subscription->id]) }}">
                                            View
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