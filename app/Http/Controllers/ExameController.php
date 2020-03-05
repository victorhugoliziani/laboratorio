<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exame;

class ExameController extends Controller
{

    public function index()
    {
        $exames = Exame::all();
        if($exames) {
            return json_encode($exames);
        }
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        
    }
}
