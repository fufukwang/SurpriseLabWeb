<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class orderlist extends Model
{
    protected $table = 'OrderLists';
    protected $fillable = [
        'Name', 'EMail', 'SN','Notes','Tel','Pay','AID'
    ];
    protected $primaryKey = 'OID';

    public function pople(){
        return $this->hasMany('App\model\pople', 'OID', 'OID');
    }
    public function act(){
	    return $this->belongsTo('App\model\act', 'AID', 'AID');
	}
}

