<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TFOOrder extends Model
{
    // 資料表
    protected $table = 'TFOOrder';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','tel','email','paystatus','paytype','sn','tfopro_id','tfogift_id','meal','money','notes','story','manage','result','item','pople','mv'];
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];






}