<?php

namespace App\Http\Controllers;

use App\Mail\InteressePrestador;
use App\Mail\NovoPedidoNaArea;
use App\Models\Area;
use App\Models\Atuacao;
use App\Models\Especifica;
use App\Models\FotoPedido;
use App\Models\Orcamento;
use App\Models\Pedido;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PedidoController extends Controller
{
    public function pedidoShow($areaprincipal)
    {
        $area = Area::where('id', $areaprincipal)->first();
        $especificas = $area->especifica()->get();
        return view('pedido.especificação' ,[
            'especificas' => $especificas,
            'areaprincipal' => $area->id,
        ]);
    }
    public function finalpedido($areaprincipal, $areaespecifica){
        $areaprincipalPedido = Area::where('id',$areaprincipal)->first();
        $areaespecificaPedido = Especifica::where('id',$areaespecifica)->first();
        return view('pedido.finalizar',[
            'areaprincipalPedido' => $areaprincipalPedido,
            'areaespecificaPedido' => $areaespecificaPedido,
        ]);

    }

    public function createPedido(Request $request, $areaprincipalPedido, $areaespecificaPedido){
        $pedido = new Pedido;
        $emailUsuario = $request->emailusuario;
        $busca = User::where('email', $emailUsuario)->first();
        if($busca == null){
            $user = new User;
            $user['name'] = $request->nomeusuario;
            $user['email'] = $request->emailusuario;
            $user['telefone'] = $request->telefoneusuario;
            $user['password'] = Hash::make($request->userpassword);
            $user['nivel'] = 0;
            $user['orcamentos'] = 0;
            $user['orcamentosFinalizados'] = 0;
            $user->save();
            Auth::login($user);
            $pedido['descricao'] = $request->descricao;
            $pedido['orcamentos'] = $request->orcamentos;
            $pedido['user'] = auth()->user()->id;
            $pedido['pedido'] = $areaprincipalPedido;
            $pedido['especifico'] = $areaespecificaPedido;
            $pedido['ativo'] = 1;
            $pedido['valorCliente'] = $request->valorCliente;
            $pedido['encerrarCliente'] = 0;
            $pedido['encerrarPrestador'] = 0;
            if($request->urgencia == 1){
                $pedido['urgencia'] = "Esta semana";
            }elseif($request->urgencia == 2){
                $pedido['urgencia'] = "Próximas semanas";
            }elseif($request->urgencia == 3){
                $pedido['urgencia'] = "Próximo mês";
            }elseif($request->urgencia == 4){
                $pedido['urgencia'] = "Próximos 6 meses";
            }
            $pedido['diasEmAberto'] = strtotime($request->diasEmAberto, strtotime("now"));
            $pedido->save();
            
            if(isset($request->fotosPedidos)){
                foreach($request->fotosPedidos as $fotoPedido){
                    if($fotoPedido->isValid()){
                        $fotos = new FotoPedido();
                        $extension = $fotoPedido->extension();
                        $imgName = md5($fotoPedido->getClientOriginalName() . strtotime("now")) . "." .$extension;
                        $fotoPedido->move(public_path("storage/pedidos/"), $imgName);
                        $fotos['fotoName'] = $imgName;
                        $fotos['pedido'] = $pedido->id;
                        $fotos->save();
                    }
                }
            }else{
                unset($request->fotosPedidos);
            }
            return redirect()->route('mailNotify', $pedido->pedido);
        }
        else{
            $pedido['descricao'] = $request->descricao;
            $pedido['orcamentos'] = $request->orcamentos;
            $pedido['user'] = $busca->id;
            $pedido['pedido'] = $areaprincipalPedido;
            $pedido['especifico'] = $areaespecificaPedido;
            $pedido['ativo'] = 1;
            $pedido['valorCliente'] = $request->valorCliente;
            $pedido['diasEmAberto'] = strtotime($request->diasEmAberto, strtotime("now"));
            $pedido['encerrarCliente'] = 0;
            $pedido['encerrarPrestador'] = 0;
            if($request->urgencia == 1){
                $pedido['urgencia'] = "Esta semana";
            }elseif($request->urgencia == 2){
                $pedido['urgencia'] = "Próximas semanas";
            }elseif($request->urgencia == 3){
                $pedido['urgencia'] = "Próximo mês";
            }elseif($request->urgencia == 4){
                $pedido['urgencia'] = "Próximos 6 meses";
            }
            $pedido->save();
            if(isset($request->fotosPedidos)){
                foreach($request->fotosPedidos as $fotoPedido){
                    if($fotoPedido->isValid()){
                        $fotos = new FotoPedido();
                        $extension = $fotoPedido->extension();
                        $imgName = md5($fotoPedido->getClientOriginalName() . strtotime("now")) . "." .$extension;
                        $fotoPedido->move(public_path("storage/pedidos/"), $imgName);
                        $fotos['fotoName'] = $imgName;
                        $fotos['pedido'] = $pedido->id;
                        $fotos->save();
                    }
                }
            }else{
                unset($request->fotosPedidos);
            }
            return redirect()->route('mailNotify', $pedido->pedido);
            //return redirect()->route('cliente');

        }
        
    }
    public function mailNotify($id)
    {
        $area = Area::where('id', $id)->first();
        $atuacao = Atuacao::where('areas', $area->areaprincipal)->get();
        foreach($atuacao as $a){
            $user = User::where('id', $a->prestador)->first();
            Mail::send(new NovoPedidoNaArea($user));
            unset($user);
        }
        return redirect()->route('cliente');
    }
    public function orcamento(Request $request, $id){
        $pedido = Pedido::where('id', $id)->first();
        $user = User::where('id', auth()->user()->id)->first();
        $orcamento = Orcamento::create([
            'pedido' => $pedido->id,
            'valor' => $request->valor,
            'tempo' => $request->tempo,
            'diaInicio' => $request->dataInicio,
            'prestador' => $user->name,
            'avaliado' => 0,
            'aceito' => 0,
        ]);
        $pedido['prestador'] = $user->id;
        $pedido->save();
        $user['orcamentos'] = $user['orcamentos']+1;
        $user->save();
        return redirect()->route('enviarInteresse', $pedido->id);
    }

    public function enviarInteresse($id){
        $pedido = Pedido::where('id', $id)->first();
        $user = $pedido->user()->first();
        Mail::send(new InteressePrestador($user));
        //return new InteressePrestador($user);
        return redirect()->route('detalhes', $pedido->id)->with('success', 'Seu interesse pelo pedido foi enviado com sucesso!');
    }
    public function encerrarPedidoCliente($id){
        $pedido = Pedido::where('id', $id)->first();
        $pedido['ativo'] = $pedido['ativo'] + 1;
        $pedido['encerrarCliente'] = 1;
        $pedido->save();
        return redirect()->route('cliente')->with('success', 'Seu pedido foi encerrado e aguarda confirmação.'); 
    }
    public function encerrarPedidoPrestador($id){
        $prestador = User::where('id', auth()->user()->id)->first();
        $pedido = Pedido::where('id', $id)->first();
        $pedido['ativo'] = $pedido['ativo'] + 1;
        $pedido['encerrarPrestador'] = 1;
        $pedido->save();
        $prestador['orcamentosFinalizados'] = $prestador['orcamentosFinalizados']+1;
        return redirect()->route('perfil')->with('success', 'Seu pedido foi encerrado e aguarda confirmação.'); 
    }
}
