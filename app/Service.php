<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'mst_services';

    protected $fillable = [
        'name',
        'description',
    ];

    protected $searchableColumns = [
        'name' => 20,
        'description' => 10,
    ];

    public function plans()
    {
        return $this->hasMany('App\Plan', 'service_id');
    }

    public function servicedetail()
    {
        return $this->hasMany('App\ServiceDetail', 'service_id');

    }
}
