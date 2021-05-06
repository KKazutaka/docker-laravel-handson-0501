<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habit extends Model
{
    use HasFactory;

    public function daily_habits()
    {
        // return $this->hasMany('App\Models\DailyHabit');
        return $this->hasMany(DailyHabit::class);
    }
}
