@extends('app')

@section('content')

<div class="rightside bg-grey-100">

    <div class="container-fluid">
        <!-- Stat Tile  -->
        <div class="row margin-top-10">
            <!-- Total Members -->
            <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                @include('dashboard._index.totalMembers')
            </div>

            <!-- Registrations This Weeks -->
            <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                @include('dashboard._index.registeredThisMonth')
            </div>

            <!-- Inactive Members -->
            <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                @include('dashboard._index.inActiveMembers')
            </div>
        </div>

        <!--Member Quick views -->
        <div class="row">
            <!--Main Row-->
            <div class="col-lg-6">
                <div class="panel">
                    <div class="panel-title">
                        <div class="panel-head"><i class="fa fa-users"></i><a
                                href="">Customers</a></div>
                        <div class="pull-right"><a href=""
                                class="btn-sm btn-primary active" role="button"><i class="fa fa-user-plus"></i>
                                Add</a></div>
                    </div>

                    <div class="panel-body with-nav-tabs">
                        <!-- Tabs Heads -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#expiring" data-toggle="tab">Expiring<span
                                        class="label label-warning margin-left-5"></span></a></li>
                            <li><a href="#expired" data-toggle="tab">Expired<span
                                        class="label label-danger margin-left-5"></span></a>
                            </li>
                            <li><a href="#recent" data-toggle="tab">Recent</a></li>
                        </ul>

                        <!-- Tab Content -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="expiring">
                            </div>

                            <div class="tab-pane fade" id="expired">
                            </div>

                            <div class="tab-pane fade" id="recent">
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="panel bg-white">
                        <div class="panel-title">
                            <div class="panel-head">Customers Per Service</div>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel bg-white">
                        <div class="panel-title bg-transparent no-border">
                            <div class="panel-head">Registration Trend</div>
                        </div>
                        <div class="panel-body no-padding-top">
                            <div id="gymie-registrations-trend" class="chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop

    @section('footer_scripts')
    <script src="{{ URL::asset('assets/plugins/morris/raphael-2.1.0.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/plugins/morris/morris.min.js') }}" type="text/javascript"></script>
    @stop

    @section('footer_script_init')
    <script type="text/javascript">
    $(document).ready(function() {
        gymie.loadmorris();
    });
    </script>
    @stop