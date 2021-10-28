<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceDetail extends Model
{
    protected $table = 'trn_service_details';

    protected $fillable = [           
        'member_id',
        'subscription_id', 

        'cid',
        'subscription_fee',
        'installation_fee',
        'additional_fee',
        'notes',

        'A_End',
        'B_End',
        'network_type',
        'network_owner',


        'created_by',
        'updated_by',
    ];
    
    protected $dates = ['created_at', 'updated_at'];

    protected $searchableColumns = [
        'Member.name' => 15,
        'Member.member_code' => 10,
    ];

    public function customer()
    {
        return $this->belongsTo('App\Customer', 'member_id');
    }

    public function terminationPoints()
    {
        return $this->hasMany('App\TerminationPoints');
    }

    public function chargesDetail()
    {
        return $this->hasMany('App\ChargesDetail');
    }

    public function subscription()
    {
        return $this->hasOne('App\Subscription');
    }
}
