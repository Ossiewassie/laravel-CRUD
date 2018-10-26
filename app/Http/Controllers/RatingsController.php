<?php

namespace App\Http\Controllers;

use App\Http\Services\RatingsService;
use Illuminate\Http\Request;
use App\Rating;
use App\Game;


class RatingsController extends Controller
{
    protected $ratingService;

    public function __construct(RatingsService $ratingService) {
        $this->ratingService = $ratingService;
    }

    public function index()
    {
        $ratings = $this->ratingService->all();

        return view('ratings.index', compact('ratings'));
    }

    public function edit($id)
    {
        $rating = $this->ratingService->find($id);

        $pagination = $this->ratingService->getPagination($id);

        return view('ratings.edit', compact('rating', 'pagination'));
    }

    public function update(Request $request, $id)
    {
        $this->validate( request(), [
            'rating' => 'required',
            'game_id' => 'required'
        ]);

        $this->ratingService->update($id, $request->only('rating', 'game_id'));

        return redirect()->route('ratings.edit', $id)->with('success', 'Rating Updated');
    }
    public function create()
    {
        return view('ratings.create');
    }

    public function store(Request $request)
    {
        $this->validate( request(), [
            'rating' => 'required',
            'game_id' => 'required'
        ]);

        Rating::create($request->only('rating', 'game_id'));

        return redirect()->route('ratings.index')->with('success', 'Rating Added');

    }

    public function delete($id)
    {
        Rating::destroy($id);

        return redirect()->route('ratings.index')->with('success', 'Rating Removed');
    }
}
