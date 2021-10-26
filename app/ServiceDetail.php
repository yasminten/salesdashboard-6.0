<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceDetail extends Model
{
    protected $table = 'trn_service_details';

// -	Subscription_id
    protected $fillable = [           
        'member_id',
        'service_id', 
        // 'addservice_id',
        'cid',
        'bandwidth',
        'bandwidth_type',
        'network_type',
        'memory',
        'storage',
        'processor',
        'colocation',
        'rack',
        'cage',
        'created_by',
        'updated_by',
    ];
    
    protected $dates = ['created_at', 'updated_at'];

    protected $searchableColumns = [
        'Member.name' => 15,
        'Member.member_code' => 10,
    ];

    public function scopeIndexQuery($query, $sorting_field, $sorting_direction, $drp_start, $drp_end)
    {
        $sorting_field = ($sorting_field != null ? $sorting_field : 'created_at');
        $sorting_direction = ($sorting_direction != null ? $sorting_direction : 'desc');

        if ($drp_start == null or $drp_end == null) {
            return $query->leftJoin('mst_members', 'trn_service_details.member_id', '=', 'mst_members.id')->select('trn_service_details.*', 'mst_members.name as member_name')->orderBy($sorting_field, $sorting_direction);
        }

        return $query->leftJoin('mst_members', 'trn_service_details.member_id', '=', 'mst_members.id')->select('trn_service_details.*', 'mst_members.name as member_name')->whereBetween('trn_service_details.created_at', [$drp_start, $drp_end])->orderBy($sorting_field, $sorting_direction);
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer', 'member_id');
    }

    public function terminationPoints()
    {
        return $this->hasMany('App\TerminationPoints');
    }

    public function chargesDetail()
    {
        return $this->hasMany('App\ChargesDetail');
    }

    public function subscription()
    {
        return $this->hasOne('App\Subscription');
    }
}
