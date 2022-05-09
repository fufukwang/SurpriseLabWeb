<?php

namespace App\model\tgt2;

use Illuminate\Database\Eloquent\Model;

class backme extends Model
{
    protected $table = 'tgt2backme';
    
    protected $fillable = ['sn','detail','num','money','name','email','tel','sponsor_id','last_four','is_sent','gen_coup','quarter','manage','eb1','p1','p2','p4','p6'];
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];
}

