<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TFOContact extends Model
{
    // 資料表
    protected $table = 'TFOContact';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['tel','email','name','status','notes','manage'];
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];

}