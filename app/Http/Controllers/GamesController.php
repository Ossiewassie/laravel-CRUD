<?php

namespace App\Http\Controllers;

use App\Http\Services\GamesService;
use Illuminate\Http\Request;
use App\Game;
use App\Developer;

class GamesController extends Controller
{
    protected $gamesService;

    public function __construct(GamesService $gamesService) {
        $this->gamesService = $gamesService;
    }

    public function index()
    {
        $games = $this->gamesService->all(['developer', 'ratings']);

        return view('games.index', compact('games'));
    }

    public function edit($id)
    {
        $game =  $this->gamesService->find($id, ['developer', 'ratings']);
        $pagination = $this->gamesService->getPagination($id);

        $developers = Developer::all();

        return view('games.edit', compact('game', 'pagination', 'developers'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'genre' => 'required'
        ]);

        $this->gamesService->update($id, $request->only('title', 'genre', 'online', 'developer_id'));

        return redirect()->route('games.edit', $id)->with('success', 'Game Updated');
    }
    public function create()
    {
        $developers = Developer::all();

        return view('games.create', compact('developers'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'genre' => 'required'
        ]);

        Game::create($request->only('title', 'genre', 'online', 'developer_id'));

        return redirect()->route('games.index')->with('success', 'Game Added');
    }

    public function delete($id)
    {
        Game::destroy($id);

        return redirect()->route('games.index')->with('success', 'Game Removed');
    }
}
