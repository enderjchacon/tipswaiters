<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Waiters extends Model
{
    protected $table    = 'waiters';
    protected $fillable = ['name', 'porcentaje','status'];
}
