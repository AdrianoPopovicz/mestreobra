<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Especifica;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class AreaController extends Controller
{
    public function adicionarArea(Request $request)
    {
        $area = Area::create([
            'areaprincipal' => $request->areaprincipal,
        ]);
        event(new Registered($area));
        return redirect()->route('admin');
    }

    public function teste($id){
        $area = Area::where('id', $id)->first();
        $teste = $area->especifica()->get();
        return $teste;
    }

    public function showEdit($id)
    {
        $area = Area::where('id', $id)->first();
        $especificas = $area->especifica()->get();
        return view('admin.areaespecifica',[
            'especificas' => $especificas,
            'id' => $id,
        ]);
    }

    public function adicionarAreaEspecifica(Request $request){
        $especifica = Especifica::create([
            'areaespecifica' => $request->areaespecifica,
            'principal' => $request->id,
        ]);
        event(new Registered($especifica));
        return redirect()->route('admin');
    }
}
