<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cohorts extends Model
{
    protected $table = 'cohorts';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = ['date', 'id','status'];
    protected $dates = ['date'];
}
