<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyHabit extends Model
{
    use HasFactory;

    public function habit()
    {
        // return $this -> belongsTo('App\Models\Habit');
        return $this -> belongsTo(Habit::class);
    }
}
