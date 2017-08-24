<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    protected $table = 'news';//資料庫中的資料表名稱
    protected $fillable = [
        'slug', 'title', 'content','img','publish', //這堆是欄位
    ];
}
