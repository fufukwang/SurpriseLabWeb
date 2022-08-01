<?php

namespace App\model\dark3;

use Illuminate\Database\Eloquent\Model;

class TeamMail extends Model
{
    protected $table = 'dark3_team_mail';
    
    protected $fillable = ['name','tel','email','order_id'];
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];
}

