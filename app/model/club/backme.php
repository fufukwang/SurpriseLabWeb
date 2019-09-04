<?php

namespace App\model\club;

use Illuminate\Database\Eloquent\Model;

class backme extends Model
{
    protected $table = 'club_backme';
    
    protected $fillable = ['sn','detail','num','money','name','email','tel','sponsor_id','is_sent','gen_coup','quarter','manage','p1','p4','p10'];
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];
}

