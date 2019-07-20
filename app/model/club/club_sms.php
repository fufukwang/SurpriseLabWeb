<?php

namespace App\model\club;

use Illuminate\Database\Eloquent\Model;

class club_sms extends Model
{
    protected $table = 'club_sms';
    
    protected $fillable = ['dial_code','agree','phone','day_sent_ok',
    	'is_sent_0',
    	'is_sent_1',
    	'is_sent_2',
    	'is_sent_3',
    	'is_sent_4',
    	'is_sent_5',
    	'is_sent_6',
    	'is_sent_7',
    	'sent_result_0',
    	'sent_result_1',
    	'sent_result_2',
    	'sent_result_3',
    	'sent_result_4',
    	'sent_result_5',
    	'sent_result_6',
    	'sent_result_7',
	];
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];
}

