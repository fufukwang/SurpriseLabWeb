<?php

namespace App\model\club;

use Illuminate\Database\Eloquent\Model;

class collect_info extends Model
{
    protected $table = 'club_collect_info';
    
    protected $fillable = [
    	'dial_code',
    	'phone',
    	'email',
	];
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];
}

