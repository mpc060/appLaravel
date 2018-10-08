<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class ControladorUsuario extends Controller
{
    public function indexView()
    {
        return view('usuarios');
    }
    
    public function index()
    {
        $users = Usuario::all();
        return $users->toJson();
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $us = new Usuario();
        $us->nome = $request->input('nome');
        $us->email = $request->input('email');
        $us->telefone = $request->input('telefone');
        $us->grupo_id = $request->input('grupo_id');
        $us->save();
        return json_encode($us);
    }

    public function show($id)
    {
        $us = Usuario::find($id);
        if (isset($us)){
            return json_encode($us);
        }    
        return response('Usuário não encontado', 404);  
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        $us = Usuario::find($id);
        if (isset($us)){
            $us->nome = $request->input('nome');
            $us->email = $request->input('email');
            $us->telefone = $request->input('telefone');
            $us->grupo_id = $request->input('grupo_id');
            $us->save();
            return json_encode($us);
        }
        return response('Usuário não encontado', 404);     
    }

    public function destroy($id)
    {
        $us = Usuario::find($id);
        if (isset($us)){
            $us->delete();
            return response('OK', 200);
        }
        return response('Usuário não encontado', 404);
    }
}














