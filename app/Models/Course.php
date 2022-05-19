<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function attempts ()
    {
        return $this->hasMany(Attempt::class);
    }

    public function answer ()
    {
        return $this->belongsTo(Answer::class);
    }

    public function questions ()
    {
        return $this->hasMany(Question::class);
    }
}
