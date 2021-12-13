<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Avaliacao;
use App\Models\Empresa;
use App\Models\Orcamento;
use App\Models\Pedido;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    public function showPerfil()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $empresa = $user->empresa()->first();
        $avaliacoes = $user->avaliacao()->get();
        $areas = $user->atuacao()->get();
        $areasPrincipais = Area::all()->sortBy('areaprincipal');
        return view('prestador.perfil', [
            'user' => $user,
            'empresa' => $empresa,
            'avaliacoes' => $avaliacoes,
            'areasAtuacao' => $areas,
            'areasPrincipais' => $areasPrincipais,
        ]);
    }

    public function avaliar($id){
        $orcamento = Orcamento::where('id', $id)->first();
        $prestador = User::where('name', $orcamento->prestador)->first();
        $areasAtuacao = $prestador->atuacao()->get();
        return view('usuario.avaliar', [
            'prestador' => $prestador,
            'orcamento' => $orcamento,
            'areasAtuacao' => $areasAtuacao,
        ]);
    }

    public function salvarAvaliacao(Request $request)
    {
        $prestador = User::where('id', $request->prestadorId)->first();
        $orcamento = Orcamento::where('id', $request->orcamentoId)->first();
        $orcamento['avaliado'] = 1;
        $orcamento->save();
        $avalicao = new Avaliacao();
        $avalicao['prestador'] = $prestador->id;
        $avalicao['nota'] = $request->nota-1;
        if(isset($request->comentario)){
            $avalicao['comentario'] = $request->comentario;
        }
        $avalicao->save();
        return redirect()->route('cliente')->with('success', 'Agradecemos o seu feedback!');
    }

    public function meusPedidos()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $orcamentos = Orcamento::where('prestador', $user->name)->get();
        
        foreach($orcamentos as $orcamento){
            $pedidos[] = $orcamento->pedido()->first();
        }
        if(!isset($pedidos)){
            return redirect()->back()->with('error', 'Você não enviou nenhum orçamento ainda' );
        }
        //return $pedidos;
        return view('prestador.meusPedidos', [
            'orcamentos' => $orcamentos,
            'pedidos' => $pedidos,
        ]);
    }

    public function detalhes($id)
    {
        $pedido = Pedido::where('id', $id)->first();
        $orcamento = Orcamento::where('prestador', auth()->user()->name)->where('pedido', $pedido->id)->first();
        $orcamentos = $pedido->orcamento()->get();
        foreach($orcamentos as $o){
            $numeroOrcamentos[] = $o->id;
        }
        if(!isset($numeroOrcamentos)){
            $numeroOrcamentos = 0;
        }
        $areaPrincipal = $pedido->pedido()->first();
        $areaEspecifica = $pedido->especifico()->first();
        return view('prestador.detalhes', [
            'pedido' => $pedido,
            'orcamento' => $orcamento,
            'numeroOrcamentos' => $numeroOrcamentos,
            'areaPrincipal' => $areaPrincipal,
            'areaEspecifica' => $areaEspecifica,
        ]);
    }
}
