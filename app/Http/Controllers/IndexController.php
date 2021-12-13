<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Pedido;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $areas = Area::all()->sortBy('areaprincipal');
        //$areas = $areas1->sortBy('areaprincipal');
        return view('index',[
            'areas' => $areas,
        ]);
    }
}
