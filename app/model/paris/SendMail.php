<?php

namespace App\model\paris;

use Illuminate\Database\Eloquent\Model;

class SendMail extends Model
{
    protected $table = 'paris_team_send_mail';
    
    protected $fillable = ['email','order_id','type'];
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];
}

