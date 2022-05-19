<?php

namespace App\Models;

use Illuminate\{
    Database\Eloquent\Factories\HasFactory,
    Database\Eloquent\Builder,
    Database\Eloquent\Model,
};

class Answer extends Model
{
    use HasFactory;

    protected static function booted ()
    {
        $authUser =  auth()->user();

        static::addGlobalScope('order', function (Builder $builder) use ($authUser) {
            $builder->whereUserId($authUser->id);
        });
    }

    public function option ()
    {
        return $this->belongsTo(Option::class);
    }

    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    public function course ()
    {
        return $this->belongsTo(Course::class);
    }
}
