<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function show()
    {
        $areas = Area::all()->sortBy('areaprincipal');
        return view('admin.dashboard',[
            'areas' => $areas,
        ]);
    }
    public function getid($id)
    {
        $aread = Area::find($id);
        $aread->delete();
        return redirect()->route('admin');
    }
}
