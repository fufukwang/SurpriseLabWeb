<?php

namespace App\model\dark3;

use Illuminate\Database\Eloquent\Model;

class ListenMp3 extends Model
{
    protected $table = 'dark3_listen_mp3';
    
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

