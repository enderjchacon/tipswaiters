<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tips extends Model
{
    protected $table = 'tips';
    protected $fillable = ['cash', 'card','date','cohorte','status'];
    protected $dates = ['date'];
}
