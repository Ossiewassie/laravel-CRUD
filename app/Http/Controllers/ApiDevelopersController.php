<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\DevelopersService;




class ApiDevelopersController extends Controller
{
    protected $developersService;

    public function __construct(DevelopersService $DevelopersService)
    {
        $this->developersService = $DevelopersService;
    }

    public function index()
    {
        return $this->developersService->all();
    }

    public function store(Request $request)
    {
        return $this->developersService->store($request->only('name', 'country', 'employees', 'date_of_creation'));
    }

    public function update(Request $request, $id)
    {
        return $this->developersService->update($id, $request->only('name', 'country', 'employees', 'date_of_creation'));
    }

    public function delete($id)
    {
        return $this->developersService->delete($id);
    }

    public function view($id) {

        return $this->developersService->find($id);
    }
}