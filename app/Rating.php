<?php

namespace App;

class Rating extends Model
{
    protected $fillable = ['rating', 'game_id', 'description'];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
