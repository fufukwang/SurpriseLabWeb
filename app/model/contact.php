<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    protected $table = 'Contacts';
    protected $fillable = [
        'Name', 'Email', 'Subject','Content','Tel','Status','Notes'
    ];
    protected $primaryKey = 'CID';
}

