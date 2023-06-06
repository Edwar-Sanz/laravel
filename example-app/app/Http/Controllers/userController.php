<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;


// ejemplo de controlador con argumento específico
class userController extends Controller
{
    //este método tiene un argumento de tipo entero
    // y retorna una vista
    public function showUser(int $userId): view {
        return view("welcome");
    }
}
