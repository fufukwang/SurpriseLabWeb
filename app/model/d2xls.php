<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class d2xls extends Model
{
    protected $table = 'd2xls';
    
    protected $fillable = ['sn','detail','num','money','name','email','tel','sponsor_id','ot1','ot1text','ot2','ot2text','ot3','ot3text','ot4','ot4text','ot5','ot5text','result','is_sent'];
    protected $guarded = [];
    protected $primaryKey = 'id';
    //protected $dates = ['created_at', 'updated_at'];
}

