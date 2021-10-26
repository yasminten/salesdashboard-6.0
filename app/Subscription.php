<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{

    protected $table = 'trn_subscriptions';

    protected $fillable = [
        'member_id',
        'sales_id',
        'service_id',
        'servicedetail_id',
        'service_term',
        'rfs_date',
        'status',
        'start_date',
        'end_date',
        'is_renewal',
        'created_by',
        'updated_by',
    ];

    protected $dates = ['created_at', 'updated_at', 'rfs_date', 'start_date', 'end_date'];

    protected $searchableColumns = [
        'Customer.member_code' => 20,
        'start_date' => 20,
        'end_date' => 20,
        'Customer.name' => 20,
        'Plan.name' => 20,
        'Invoice.invoice_number' => 20,
    ];

    public function customer()
    {
        return $this->belongsTo('App\Customer', 'member_id');
    }


    public function service()
    {
        return $this->belongsTo('App\Service', 'service_id');
    }

    public function invoice()
    {
        return $this->belongsTo('App\Invoice', 'invoice_id');
    }

    public function servicedetail()
    {
        return $this->belongsTo('App\ServiceDetail', 'servicedetail_id');
    }
}
