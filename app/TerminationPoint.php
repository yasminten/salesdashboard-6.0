<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TerminationPoint extends Model
{
    protected $table = 'trn_termination_point';

    protected $fillable = [
        'servicedetail_id',
        'A_End',
        'B_End',
        'network_type',
        'network_owner',
        'created_by',
        'updated_by',
    ];

    protected $searchableColumns = [
        'A_End' => 20,
        'B_End' => 20,
        'network_type' => 20,
        'network_owner' => 20
    ];

    public function servicedetail()
    {
        return $this->belongsTo('App\ServiceDetail', 'servicedetail_id');
    }
}
