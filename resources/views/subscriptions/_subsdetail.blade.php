<div id="subscriptiondetail">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group focused">
                                {!! Form::label('cid','Circuit ID') !!}
                                {!! Form::text('cid',$service_details->cid,['class'=>'form-control',
                                'id'=>'cid','readonly' =>'readonly' ]) !!}

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group focused">
                                {!! Form::label('network_type','Network Type') !!}
                                {!! Form::text('network_type',$service_details->network_type,['class'=>'form-control',
                                'id'=>'network_type','readonly' =>'readonly' ]) !!}

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group focused">
                                {!! Form::label('network_owner','Network Owner') !!}
                                {!! Form::text('network_owner',$service_details->network_owner,['class'=>'form-control',
                                'id'=>'network_owner','readonly' =>'readonly' ]) !!}

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group focused">
                                {!! Form::label('rfs_date','RFS Date') !!}
                                {!! Form::text('rfs_date',$service_details->rfs_date,['class'=>'form-control',
                                'id'=>'rfs_date','readonly' =>'readonly' ]) !!}

                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group focused">
                                {!! Form::label('activation_date','Activation Date') !!}
                                {!! Form::text('activation_date',$service_details->activation_date,['class'=>'form-control',
                                'id'=>'activation_date','readonly' =>'readonly' ]) !!}

                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group focused">
                                {!! Form::label('end_date','End Date') !!}
                                {!! Form::text('end_date',$service_details->end_date,['class'=>'form-control',
                                'id'=>'end_date','readonly' =>'readonly' ]) !!}

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group focused">
                                {!! Form::label('subscription_fee','Subscription Fee') !!}
                                {!! Form::text('subscription_fee',$service_details->subscription_fee,['class'=>'form-control',
                                'id'=>'subscription_fee','readonly' =>'readonly' ]) !!}

                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group focused">
                                {!! Form::label('installation_fee','Installation Fee') !!}
                                {!! Form::text('installation_fee',$service_details->installation_fee,['class'=>'form-control',
                                'id'=>'installation_fee','readonly' =>'readonly' ]) !!}

                            </div>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group focused">
                                {!! Form::label('additional_fee','Additional Fee') !!}
                                {!! Form::text('additional_fee',$service_details->additional_fee,['class'=>'form-control',
                                'id'=>'additional_fee','readonly' =>'readonly' ]) !!}

                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group focused">
                                {!! Form::label('notes','Notes') !!}
                                {!! Form::text('notes',$service_details->notes,['class'=>'form-control',
                                'id'=>'notes','readonly' =>'readonly' ]) !!}

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group focused">
                                {!! Form::label('A_End','A-End') !!}
                                {!! Form::textarea('A_End',$service_details->A_End,['class'=>'form-control', 'id' => 'A_End', 'rows' =>
                                5,'readonly' =>'readonly'])
                                !!}

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group focused">
                                {!! Form::label('B_End','B-End') !!}
                                {!! Form::textarea('B_End',$service_details->B_End,['class'=>'form-control', 'id' => 'B_End', 'rows' =>
                                5,'readonly' =>'readonly'])
                                !!}
                            </div>
                        </div>
                    </div>
                </div>