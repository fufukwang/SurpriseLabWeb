<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class DarkContact extends Model
{
    protected $table = 'DarkContact';
    
    protected $fillable = ['tel','email','name','status','notes','manage'];
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];
}

