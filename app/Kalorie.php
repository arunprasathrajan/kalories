<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kalorie extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date', 'time', 'meal', 'calories', 'calorie_limit',
    ];

    public $timestamps = false;

}
