<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    public function shops()
    {
        // 6の書き方 return $this->hasMany('App\Models\Shop');
        return $this->hasMany(Shop::class);
    }
}
