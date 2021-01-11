<?php

namespace App\model\tgt2;

use Illuminate\Database\Eloquent\Model;

class SendMail extends Model
{
    protected $table = 'tgt2_team_send_mail';
    
    protected $fillable = ['email','order_id'];
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];
}

