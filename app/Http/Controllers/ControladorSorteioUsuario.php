<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class ControladorSorteioUsuario extends Controller
{
    
    public function __construct() 
    {
        $this->middleware('auth');
    }    
    
    public function indexView()
    {
        return view('usuarios');
    }
    
    public function index()
    {
        $users = Usuario::orderByRaw('RAND()')->take(1)->get();
        return view('sorteiousuario', compact('users'));
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



