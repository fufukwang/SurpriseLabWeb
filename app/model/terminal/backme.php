<?php

namespace App\model\terminal;

use Illuminate\Database\Eloquent\Model;

class backme extends Model
{
    protected $table = 'terminalbackme';
    
    protected $fillable = ['sn','detail','num','money','name','email','tel','sponsor_id','last_four','is_sent','gen_coup','quarter','manage','p2','p4'];
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at','buy_at'];
}

