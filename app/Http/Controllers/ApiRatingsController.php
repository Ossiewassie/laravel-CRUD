<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\RatingsService;




class ApiRatingsController extends Controller
{
    protected $RatingsService;

    public function __construct(RatingsService $RatingsService)
    {
        $this->RatingsService = $RatingsService;
    }

    public function index()
    {
        return $this->RatingsService->all();
    }

    public function store(Request $request)
    {
        return $this->RatingsService->store($request->only('rating', 'game_id', 'description'));
    }

    public function update(Request $request, $id)
    {
        return $this->RatingsService->update($id, $request->only('rating', 'game_id', 'description'));
    }

    public function delete($id)
    {
        return $this->RatingsService->delete($id);
    }

    public function view($id) {

        return $this->RatingsService->find($id);
    }
}
