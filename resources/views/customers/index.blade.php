@extends('app')

@section('content')

<div class="rightside bg-grey-100">

    

    <div class="container-fluid">
        <div class="row">
            <!-- Main row -->
            <div class="col-lg-12">
                <!-- Main Col -->
                <div class="panel no-border ">
                    <div class="panel-title bg-blue-grey-50">
                        <div class="panel-head font-size-15">

                            <div class="row">
                                <div class="col-sm-12 no-padding">
                                    {!! Form::Open(['method' => 'GET']) !!}

                                    <div class="col-sm-3">

                                        {!! Form::label('member-daterangepicker','Date range') !!}

                                        <div id="member-daterangepicker"
                                            class="gymie-daterangepicker btn bg-grey-50 daterange-padding no-border color-grey-600 hidden-xs no-shadow">
                                            <i class="ion-calendar margin-right-10"></i>
                                            <span>{{$drp_placeholder}}</span>
                                            <i class="ion-ios-arrow-down margin-left-5"></i>
                                        </div>

                                        {!! Form::text('drp_start',null,['class'=>'hidden', 'id' => 'drp_start']) !!}
                                        {!! Form::text('drp_end',null,['class'=>'hidden', 'id' => 'drp_end']) !!}
                                    </div>

                                    <div class="col-sm-2">
                                        {!! Form::label('sort_field','Sort By') !!}
                                        {!! Form::select('sort_field',array('created_at' => 'Date','name' => 'Name',
                                        'member_code' => 'Customer code', 'status' =>
                                        'Status'),old('sort_field'),['class' => 'form-control selectpicker show-tick
                                        show-menu-arrow', 'id' => 'sort_field']) !!}
                                    </div>

                                    <div class="col-sm-2">
                                        {!! Form::label('sort_direction','Order') !!}
                                        {!! Form::select('sort_direction',array('desc' => 'Descending','asc' =>
                                        'Ascending'),old('sort_direction'),['class' => 'form-control selectpicker
                                        show-tick show-menu-arrow', 'id' => 'sort_direction']) !!}</span>
                                    </div>

                                    <div class="col-xs-3">
                                        {!! Form::label('search','Keyword') !!}
                                        <input value="{{ old('search') }}" name="search" id="search" type="text"
                                            class="form-control padding-right-35" placeholder="Search...">
                                    </div>

                                    <div class="col-xs-2">
                                        {!! Form::label('&nbsp;') !!} <br />
                                        <button type="submit" class="btn btn-primary active no-border">GO</button>
                                    </div>

                                    {!! Form::Close() !!}
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="panel-body bg-white">

                        @if($customers->count() == 0)
                        <h4 class="text-center padding-top-15">Sorry! No records found</h4>

                        @else
                        <table id="$customers" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <!-- <th>Photo</th> -->
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Status</th>
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
                                    <td>{{ $customer->status}}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info">Actions</button>
                                            <button type="button" class="btn btn-info dropdown-toggle"
                                                data-toggle="dropdown" aria-expanded="false">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a
                                                        href="{{ action('CustomersController@show',['id' => $customer->id]) }}">View
                                                        details</a>
                                                </li>
                                                <li>
                                                    <a
                                                        href="{{ action('CustomersController@edit',['id' => $customer->id]) }}">Edit
                                                        details</a>
                                                </li>
                                                <!-- <li>
                                                    @permission(['manage-gymie','manage-customers','delete-member'])
                                                    <a href="#" class="delete-record"
                                                        data-delete-url="{{ url('customers/'.$customer->id.'/archive') }}"
                                                        data-record-id="{{$customer->id}}">Delete member</a>
                                                    @endpermission
                                                </li> -->
                                            </ul>
                                        </div>


                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div><!-- / Panel Body -->
                    @endif
                </div><!-- / Panel-no-border -->
            </div><!-- / Main Col -->
        </div><!-- / Main Row -->
    </div><!-- / Container -->
</div><!-- / RightSide -->
@stop
@section('footer_script_init')
<script type="text/javascript">
$(document).ready(function() {
    gymie.deleterecord();
});
</script>
@stop