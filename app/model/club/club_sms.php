<?php

namespace App\model\club;

use Illuminate\Database\Eloquent\Model;

class club_sms extends Model
{
    protected $table = 'club_sms';
    
    protected $fillable = ['dial_code','agree','phone','day_sent_ok',
    	'is_sent',
    	'sent_result',
	];
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];
}

