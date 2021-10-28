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
                <h6 class="m-0 font-weight-bold text-primary">All Customers Data</h6>
            </div>

            <div class="card-body">

                <table id="$customers" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <!-- <th>Photo</th> -->
                            <th>Code</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($customers as $customer)

                        <tr>
                            <td><a
                                    href="{{ action('CustomersController@show',['id' => $customer->id]) }}">{{ $customer->member_code}}</a>
                            </td>
                            <td><a
                                    href="{{ action('CustomersController@show',['id' => $customer->id]) }}">{{ $customer->name}}</a>
                            </td>
                            <td>{{ $customer->contact}}</td>
                            
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-info">Actions</button>
                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown"
                                        aria-expanded="false">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ action('CustomersController@show',['id' => $customer->id]) }}">View
                                                details</a>
                                        </li>
                                        <li>
                                            <a href="{{ action('CustomersController@edit',['id' => $customer->id]) }}">Edit
                                                details</a>
                                        </li>
                                        
                                    </ul>
                                </div>


                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>



            </div>

        </div>

    </div>

</div>

@endsection