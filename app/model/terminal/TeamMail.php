<?php

namespace App\model\terminal;

use Illuminate\Database\Eloquent\Model;

class TeamMail extends Model
{
    protected $table = 'terminal_team_mail';
    
    protected $fillable = ['name','tel','email','order_id'];
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];
}

