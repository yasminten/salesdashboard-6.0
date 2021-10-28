<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class ChargesDetail extends Model
{

    use Eloquence;
    use createdByUser,updatedByUser;

    protected $table = 'trn_charges_details';


    protected $fillable = [
        'servicedetail_id',
        'subscription_fee',
        'installation_fee',
        'additional_fee',
        'notes',
        'created_by',
        'updated_by',
    ];
    
    
    public function servicedetail()
    {
        return $this->belongsTo('App\ServiceDetail', 'servicedetail_id');
    }

    
}
