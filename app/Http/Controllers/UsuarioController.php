<?php

namespace App\Http\Controllers;

use App\Models\Orcamento;
use App\Models\Pedido;
use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function areaUsuario(){
        $user = User::where('id', auth()->user()->id)->first();
        $pedidos = $user->pedido()->get();
        return view('usuario.perfilUsuario',[
            'user' => $user,
            'pedidos' => $pedidos,
        ]);
    }

    public function perfilPrestador($nome){
        $prestador = User::where('name', $nome)->first();
        $avaliacoes = $prestador->avaliacao()->get();
        return view('usuario.perfilPrestador', [
            'prestador' => $prestador,
            'avaliacoes' => $avaliacoes,
        ]);
    }

    public function pedido($id){
        $pedido = Pedido::where('id', $id)->first();
        $orcamento = $pedido->orcamento()->get();
        $areaPrincipal = $pedido->pedido()->first();
        $areaEspecifica = $pedido->especifico()->first();
        $fotos = $pedido->fotos()->get();
        foreach($orcamento as $o){
            $numeroOrcamentos[] = $o->id;
        }
        if(!isset($numeroOrcamentos)){
            $numeroOrcamentos = 0;
        }
        
        return view('usuario.pedidoUsuario',[
            'pedido' => $pedido,
            'orcamentos' => $orcamento,
            'principal' => $areaPrincipal,
            'especifica' => $areaEspecifica,
            'fotos' => $fotos,
            'numeroOrcamentos' => $numeroOrcamentos,
        ]);
    }

    public function deletarPedido($id)
    {
        $pedido = Pedido::where('id', $id)->first();
        $pedido->delete();
        return redirect()->route('cliente');
    }
    
    public function aceitarOrcamento($id)
    {
        $orcamento = Orcamento::where('id', $id)->first();
        return view('usuario.aceitarProposta', [
            'orcamento' => $orcamento,
        ]);
    }

    public function orcamentoAceito($id){
        $orcamento = Orcamento::where('id', $id)->first();
        $prestador = User::where('name', $orcamento->prestador)->first();
        $pedido = $orcamento->pedido()->first();
        $orcamento['aceito'] = 1;
        $orcamento->save();
        $prestador->save();
        $pedido['ativo'] = 2;
        $pedido->save();

        return redirect()->route('dadosPrestador', $orcamento->id);
    }
    public function dadosPrestador($id)
    {
        $orcamento = Orcamento::where('id', $id)->first();
        $prestador = User::where('name', $orcamento->prestador)->first();
        return view('usuario.pedidoAceito', [
            'orcamento' => $orcamento,
            'prestador' => $prestador,
        ]);
    }
}
