<?php

namespace App\Http\Controllers;

use App\Http\Services\DevelopersService;
use Illuminate\Http\Request;
use App\Developer;

class DevelopersController extends Controller
{
    protected $developerService;

    public function __construct(DevelopersService $developerService) {
        $this->developerService = $developerService;
    }

    public function index()
    {
        $developers = $this->developerService->all();

        return view('developers.index', compact('developers'));
    }

    public function edit($id)
    {
        $developer = $this->developerService->find($id);

        $pagination = $this->developerService->getPagination($id);

        return view('developers.edit', compact('developer', 'pagination'));
    }

    public function update(Request $request, $id)
    {
        $this->validate( request(), [
            'name' => 'required',
            'country' => 'required',
            'employees' => 'required',
            'date_of_creation' => 'required',
        ]);

        $this->developerService->update($id, $request->only('name', 'country', 'employees', 'date_of_creation'));

        return redirect()->route('developers.edit', $id)->with('success', 'Developer Updated');
    }
    public function create()
    {
        return view('developers.create');
    }

    public function store(Request $request)
    {
        $this->validate( request(), [
            'name' => 'required',
            'country' => 'required',
            'employees' => 'required',
            'date_of_creation' => 'required',
        ]);

        Developer::create($request->only('name', 'country', 'employees', 'date_of_creation'));

        return redirect()->route('developers.index')->with('success', 'Developer Added');

    }

    public function delete($id)
    {
        Developer::destroy($id);

        return redirect()->route('developers.index')->with('success', 'Developer Removed');
    }
}
