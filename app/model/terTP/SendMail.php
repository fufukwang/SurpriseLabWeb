<?php

namespace App\model\terTP;

use Illuminate\Database\Eloquent\Model;

class SendMail extends Model
{
    protected $table = 'tertp_team_send_mail';
    
    protected $fillable = ['email','order_id','type'];
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];
}

