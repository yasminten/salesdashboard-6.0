<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyActivities extends Model
{
    protected $table = 'daily_activities';

    protected $fillable = [
        

        'created_by',
        'updated_by',
    ];

    protected $dates = ['created_at', 'updated_at'];

    protected $searchableColumns = [
     
    ];
}
