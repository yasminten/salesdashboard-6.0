<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusQuotation extends Model
{
    protected $table = 'status_quotation';

    protected $fillable = [
        'name',
        'status_id'
    ];
}
