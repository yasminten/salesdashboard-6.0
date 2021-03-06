@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Services') }}</h1>

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
                <h6 class="m-0 font-weight-bold text-primary">All Services</h6>
            </div>

            <div class="card-body">

                <table id="$customers" class="table table-bordered table-striped">
                    <thead>
                        <tr>

                            <th class="text-center">Service Name</th>
                            <th class="text-center">Service Code</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($services as $service)
                        <tr>
                            <td class="text-center">{{ $service->name}}</td>
                            <td class="text-center">{{ $service->description}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>



            </div>

        </div>

    </div>

</div>

@endsection