<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusList extends Model
{
    protected $table = 'status_list';

    protected $fillable = [
        'category',
        'variable',
        'name'
    ];
}
