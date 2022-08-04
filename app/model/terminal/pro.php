<?php

namespace App\model\terminal;

use Illuminate\Database\Eloquent\Model;

class pro extends Model
{
    protected $table = 'terminalpro';
    
    protected $fillable = ['open','day_parts','day','rang_start','rang_end','sites','money','cash','special','ticket_type'];
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];

    public function orders()
    {
        return $this->belongsToMany('App\model\terminal\order','terminal_pro_order','pro_id','order_id');
    }
}

