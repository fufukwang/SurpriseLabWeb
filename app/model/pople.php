<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class pople extends Model
{
    protected $table = 'Poples';
    protected $fillable = [
        'OID', 'Meal', 'Sort'
    ];
    protected $primaryKey = 'PID';

    public function order(){
	    return $this->belongsTo('App\model\orderlist', 'OID', 'OID');
	}
}

