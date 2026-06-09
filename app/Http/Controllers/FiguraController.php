<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FiguraController extends Controller
{

    public function index()
    {
        return view('figuras.index');
    }

public function create()
{
    return view('figuras.create');
}

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        return view('figuras.show');
    }

    public function edit(string $id)
    {
       return view('figuras.edit');
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
