<?php

namespace App\model\tgt2;

use Illuminate\Database\Eloquent\Model;

class ListenMp3 extends Model
{
    protected $table = 'tgt2_listen_mp3';
    
    protected $fillable = [
    	'file',
    	'pwd',
    	'name',
    	'email',
    ];
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];
}

