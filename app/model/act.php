<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class act extends Model
{
    protected $table = 'Acts';
    protected $fillable = [
        'ADay', 'Pop', 'STime','ETime'
    ];
    protected $primaryKey = 'AID';
    protected $dates = ['ADay'];

    public function order(){
        return $this->hasMany('App\model\orderlist', 'AID', 'AID');
    }
}

