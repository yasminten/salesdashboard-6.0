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
        'bandwidth',
        'bandwidth_type',
        'network_type',
        'memory',
        'storage',
        'processor',
        'colocation',
        'rack',
        'cage',
        'status',
        'notes',
        'created_by',
        'updated_by',
    ];

    protected $dates = ['created_at', 'updated_at'];

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
