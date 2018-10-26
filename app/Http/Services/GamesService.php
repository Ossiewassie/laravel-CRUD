<?php

namespace App\Http\Services;

use App\Game;

class GamesService
{
    public function all($with = [])
    {
        return Game::with($with)->get();
    }

    public function find($id, $with = [])
    {
        return Game::with($with)->find($id);
    }

    public function update($id, $values) {
        $game = $this->find($id);

        $game->update($values);

        return $game;
    }

    public function getPagination($id) {
        $games = $this->all();

        foreach ($games as $game) {
            $gameCounter[] = $game['id'];
        }

        $gameNr = array_search($id , $gameCounter);

        return ['gameNr' => $gameNr, 'gameCounter' => $gameCounter];
    }
}
