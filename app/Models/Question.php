<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Question extends Model
{
    use HasFactory;

    protected static function booted ()
    {
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('theory', 'desc');
        });
    }

    public function options ()
    {
        return $this->hasMany(Option::class);
    }

    public function course ()
    {
        return $this->belongsTo(Course::class);
    }
}
