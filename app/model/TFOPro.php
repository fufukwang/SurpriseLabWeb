<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TFOPro extends Model
{
    // 資料表
    protected $table = 'TFOPro';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['dayparts','day','sites','money','wine','rangstart','rangend'];
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at','discount_start','discount_end'];

}