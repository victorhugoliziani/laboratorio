<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostoColeta;

class PostoColetaController extends Controller
{
    
    public function index()
    {
        $posto_coletas = PostoColeta::all();
        if($posto_coletas) {
            return json_encode($posto_coletas);
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
