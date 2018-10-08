<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grupo;

class ControladorGrupo extends Controller
{
   
    public function index()
    {
        $gps = Grupo::all();
        return view('grupos', compact('gps'));
    }

   
    public function create()
    {
        return view('novogrupo');
    }

    public function store(Request $request)
    {
        $gp = new Grupo();
        $gp->nome = $request->input('nomeGrupo');
        $gp->save();
        return redirect('/grupos');
    }

    public function show($id)
    {
       
    }

    public function edit($id)
    {
        $gp = Grupo::find($id);
        if (isset($gp)){
            return view('editargrupo', compact('gp'));
        }
        return redirect('/grupos');
    }

    public function update(Request $request, $id)
    {
        
        $gp = Grupo::find($id);
        if (isset($gp)){
            $gp->nome = $request->input('nomeGrupo');
            $gp->save();
        }
        return redirect('/grupos');
    }

    public function destroy($id)
    {
        $gp = Grupo::find($id);
        if (isset($gp)){
            $gp->delete();
        }
        return redirect('/grupos');
    }
    
    public function indexJson()
    {
        $gps = Grupo::all();
        
        return json_encode($gps);
    }
}














