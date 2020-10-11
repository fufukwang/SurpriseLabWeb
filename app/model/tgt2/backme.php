<?php

namespace App\model\tgt2;

use Illuminate\Database\Eloquent\Model;

class backme extends Model
{
    protected $table = 'tgt2backme';
    
    protected $fillable = ['sn','detail','num','money','name','email','tel','sponsor_id','is_sent','gen_coup','quarter','manage','l1','a1','a4'];
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];
}

