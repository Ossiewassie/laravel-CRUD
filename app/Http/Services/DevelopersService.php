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

    public function update($id, $values) {
        $developer = $this->find($id);

        $developer->update($values);

        return $developer;
    }

    public function getPagination($id) {
        $developers = $this->all();

        foreach ($developers as $developer) {
            $developerCounter[] = $developer['id'];
        }

        $developerNr = array_search($id , $developerCounter);

        return ['developerNr' => $developerNr, 'developerCounter' => $developerCounter];
    }
}
