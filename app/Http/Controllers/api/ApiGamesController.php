<?php

namespace App\Http\Controllers;

use App\Http\Services\GamesService;




class ApiGamesController extends Controller
{
    protected $gamesService;

    public function __construct(GamesService $gamesService)
    {
        $this->gamesService = $gamesService;
    }

    public function index()
    {
        $games = $this->gamesService->all(['developer', 'ratings']);

        $this->jsonResponse($games);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'genre' => 'required'
        ]);

        Game::create($request->only('title', 'genre', 'online', 'developer_id'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'genre' => 'required'
        ]);

        $this->gamesService->update($id, $request->only('title', 'genre', 'online', 'developer_id'));
    }

    public function delete($id)
    {
        Game::destroy($id);

    }
}