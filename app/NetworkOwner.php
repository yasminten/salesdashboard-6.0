<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class NetworkOwner extends Model
{

    protected $table = 'mst_network_owners';

    protected $fillable = [
        'name',
    ];

    protected $searchableColumns = [
        'name' => 20,
    ];
}
