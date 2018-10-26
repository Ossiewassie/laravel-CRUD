<?php

namespace App;

class Developer extends Model
{
    protected $fillable = ['name', 'country', 'employees', 'date_of_creation'];

    /**
     * Get the games for the developer.
     */
    public function games()
    {
        return $this->hasMany(Game::class);
    }
}
