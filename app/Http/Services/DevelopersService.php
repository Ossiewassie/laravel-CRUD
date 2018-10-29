<?php

namespace App\Http\Services;

use App\Developer;

class DevelopersService
{
    public function all($with = [])
    {
        return Developer::with($with)->get();
    }

    public function find($id, $with = [])
    {
        return Developer::with($with)->find($id);
    }

    public function update($id, $request) {
        Developer::find($id)->update($request);
        return Developer::find($id);
    }

    public function store($values) {
        return Developer::create($values);
    }

    public function getPagination($id) {
        $developers = $this->all();

        foreach ($developers as $developer) {
            $developerCounter[] = $developer['id'];
        }

        $developerNr = array_search($id , $developerCounter);

        return ['developerNr' => $developerNr, 'developerCounter' => $developerCounter];
    }
    
    public function delete($id){
        return Developer::destroy($id);
    }
}
