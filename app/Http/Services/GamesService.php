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

    public function update($id, $request) {
        Game::find($id)->update($request);
        return Game::find($id);
    }

    public function store($values) {
        return Game::create($values);
    }

    public function getPagination($id) {
        $games = $this->all();

        foreach ($games as $game) {
            $gameCounter[] = $game['id'];
        }

        $gameNr = array_search($id , $gameCounter);

        return ['gameNr' => $gameNr, 'gameCounter' => $gameCounter];
    }

    public function delete($id){
        return Game::destroy($id);
    }
}
