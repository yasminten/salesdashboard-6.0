<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyActivity extends Model
{
    protected $table = 'daily_activity';

    protected $fillable = ['client_name','building','floor','address','phone','pic','created_by','remarks'];
}
