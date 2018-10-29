<?php

namespace App\Http\Services;

use App\Rating;

class RatingsService
{
    public function all($with = [])
    {
        return Rating::with($with)->get();
    }

    public function find($id, $with = [])
    {
        return Rating::with($with)->find($id);
    }

    public function update($id, $request) {
        Rating::find($id)->update($request);
        return Rating::find($id);
    }

    public function store($values) {
        return Rating::create($values);
    }

    public function getPagination($id) {
        $ratings = $this->all();

        foreach ($ratings as $rating) {
            $ratingCounter[] = $rating['id'];
        }

        $ratingNr = array_search($id , $ratingCounter);

        return ['ratingNr' => $ratingNr, 'ratingCounter' => $ratingCounter];
    }

    public function delete($id){
        return Rating::destroy($id);
    }
}
