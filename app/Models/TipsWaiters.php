<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipsWaiters extends Model
{
    protected $table    = 'tips_waiters';
    protected $fillable = ['amount', 'tip_id','waiter_id'];
    public $timestamps  = false;
}
