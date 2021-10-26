<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'mst_customers';

    protected $fillable = [
        'customer_type',
        'member_code',
        'sap_member_code',
        'name',
        'address',
        'npwp_address',
        'urban',
        'city',
        'sub_district',
        'province',
        'zip_code',
        'npwp_urban',
        'npwp_city',
        'npwp_sub_district',
        'npwp_province',
        'npwp_zip_code',
        'priority',
        'ID_no',
        'NPWP_no',
        'id_photo',
        'npwp_photo',
        'email',
        'contact',
        'cellphone',
        'status',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by'
    ];
    
    protected $dates = ['created_at', 'updated_at'];

    protected $searchableColumns = [
        'member_code' => 20,
        'name' => 20,
        'email' => 20,
        'contact' => 20,
    ];


    //Relationships
    public function subscriptions()
    {
        return $this->hasMany('App\Subscription');
    }

    public function broadband()
    {
        return $this->hasOne('App\CustomerBroadband');
    }

    public function corporate()
    {
        return $this->hasOne('App\CustomerCorporate');
    }

    public function invoices()
    {
        return $this->hasMany('App\Invoice');
    }

    public function revenues()
    {
        return $this->hasMany('App\Revenue');
    }

}
