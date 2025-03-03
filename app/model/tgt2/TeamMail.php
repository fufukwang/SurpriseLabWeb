<?php

namespace App\model\tgt2;

use Illuminate\Database\Eloquent\Model;

class TeamMail extends Model
{
    protected $table = 'tgt2_team_mail';
    
    protected $fillable = ['name','tel','email','order_id'];
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];
}

