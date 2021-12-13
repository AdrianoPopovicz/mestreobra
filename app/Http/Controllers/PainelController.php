<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Pedido;
use App\Models\User;
use Illuminate\Http\Request;

class PainelController extends Controller
{
    public function showPainel(){
        $areas = Area::all()->sortBy('areaprincipal');
        return view('prestador.dashboard',[
            'areas' => $areas,
        ]);
    }

    public function listagemPedidos($id){
        $pedidos = Pedido::all();
        /*foreach($pedidos as $pedido){
            if($pedido->diasEmAberto < strtotime("now")){
                $pedido['ativo'] = 2;
                $pedido->save();
            }
        }*/
        
        $user = User::where('id', auth()->user()->id)->first();
        $area = Area::where('id', $id)->first();
        $userArea = $user->atuacao()->get();
        foreach($userArea as $a){
            $userAreas[] = $a->areas;
        }
        return view('pedido.listagempedidos', [
            'area' => $area,
            'pedidos' => $pedidos,
            'userAreas' => $userAreas,
        ]);
    }

    public function pedidoInteressado($id){
        $pedido = Pedido::where('id', $id)->first();
        $orcamentos = $pedido->orcamento()->get();
        $areaPrincipal = $pedido->pedido()->first();
        $areaEspecifica = $pedido->especifico()->first();
        $areaDoPedido = $pedido->pedido()->first();
        $a = $areaDoPedido['areaprincipal'];
        $user = User::where('id', auth()->user()->id)->first();
        $userArea = $user->atuacao()->get();
        $fotos = $pedido->fotos()->get();
        foreach($orcamentos as $o){
            $numeroOrcamentos[] = $o->id;
        }
        if(!isset($numeroOrcamentos)){
            $numeroOrcamentos = 0;
        }
        foreach($userArea as $a){
            $userAreas[] = $a->areas;
        }
        if(in_array($areaDoPedido->areaprincipal, $userAreas)){
            return view('pedido.enviointeresse', [
                'pedido' => $pedido,
                'areaPrincipal' => $areaPrincipal,
                'areaEspecifica' => $areaEspecifica,
                'orcamentos' => $numeroOrcamentos,
                'fotos' => $fotos,
            ]);
        }else{
            return redirect()->back()->with('error', 'Ops! Parece que você não atua nesta área. Que tal indicar um amigo?');
        }
        
    }
}
