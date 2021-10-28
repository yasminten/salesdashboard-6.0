<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quotations extends Model
{
    protected $table = 'trn_quotations';

    protected $fillable = [
        'subscription_id',
        'quotation_no',
        'subscription_fee',
        'installation_fee',
        'additional_fee',
        'notes',
        'status',
        'created_by',
        'updated_by',
    ];
}
