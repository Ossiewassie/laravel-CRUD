<?php

namespace App;

class Game extends Model
{
    protected $fillable = ['title', 'genre', 'online', 'developer_id'];

    public function getAverageRatingAttribute() {
        if ($this->ratings->count()) {
            $total = 0;

            foreach ($this->ratings as $rating) {
                $total += $rating->rating;
            }

            return ($total / $this->ratings->count());
        }

        return null;
    }

    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}