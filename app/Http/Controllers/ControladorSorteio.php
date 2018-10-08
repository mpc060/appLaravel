<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grupo;

class ControladorSorteio extends Controller
{
    
    public function __construct() 
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $gps = Grupo::orderByRaw('RAND()')->take(1)->get();
        return view('sorteio', compact('gps'));
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
    
    public function indexJson()
    {
        $gps = Grupo::all();
        
        return json_encode($gps);
    }
}




