<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControladorIndex extends Controller
{
    
    public function index()
    {
        if (Auth::check()){
           
        }else{
            echo "<h4> Você não está logado <//h4>";
        }
    }  
}