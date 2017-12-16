<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TFOGift extends Model
{
    // 資料表
    protected $table = 'TFOGift';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code','satatus','paystatus','tfoorder_id','bname','btel','bemail','rname','rtel','remail','address','send','manage','admin_id','sendtype','backresult','result','InvitationText','sn'];
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];



}