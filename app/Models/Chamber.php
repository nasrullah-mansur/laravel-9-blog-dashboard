<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chamber extends Model
{
    use HasFactory;

    public function days()
    {
        return $this->belongsToMany(Day::class);
    }

    public function times()
    {
        return $this->belongsToMany(Time::class);
    }
}
