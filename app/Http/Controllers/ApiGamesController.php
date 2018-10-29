<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\GamesService;




class ApiGamesController extends Controller
{
    protected $gamesService;

    public function __construct(GamesService $gamesService, Request $request)
    {
        $this->gamesService = $gamesService;
    }

    public function index()
    {
        return $this->gamesService->all();
    }

    public function store(Request $request)
    {
        return $this->gamesService->store($request->only('title', 'genre', 'online', 'developer_id'));
    }

    public function update(Request $request, $id)
    {
        return $this->gamesService->update($id, $request->only('title', 'genre', 'online', 'developer_id'));
    }

    public function delete($id)
    {
        return $this->gamesService->delete($id);
    }

    public function view($id) {

        return $this->gamesService->find($id);
    }
}