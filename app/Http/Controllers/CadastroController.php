<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Atuacao;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Empresa;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;


class CadastroController extends Controller
{
    public function cadastroPrestador(Request $request){
        /*$request->validate([
            'nomeprestador'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users',
            'telefoneprestador'=>'required|numeric|max:255',
            'password' => ['required', 'confirmed', Rules\Password::default()],
        ]);*/
        $user = new User;
        $user['name'] = $request->nomeprestador;
        $user['email'] = $request->emailprestador;
        $user['telefone'] = $request->telefoneprestador;
        $user['password'] = Hash::make($request->password);
        $user['nivel'] = 1;
        $user['orcamentos'] = 0;
        $user['orcamentosFinalizados'] = 0;
        $user->save();
        Auth::login($user);
        $atuacao = new Atuacao();
        $atuacao['areas'] = $request->area;
        $atuacao['prestador'] = auth()->user()->id;
        $atuacao->save();

        event(new Registered($user));
        return redirect()->route('selecioneEmpresa');
    }
    public function selecioneEmpresa()
    {
        $empresas = Empresa::all();
        return view('cadastro.selecioneSuaEmpresa',[
            'empresas' => $empresas,
        ]);
    }

    public function pesquisa(){

    }

    public function showCadastro()
    {
        $areas = Area::all()->sortBy('areaprincipal');
        return view('cadastro.cadastroprestador2',[
            'areas' => $areas,
        ]);
    }
    public function cadastro()
    {
        $areas = Area::all()->sortBy('areaprincipal');
        return view('cadastro.cadastroprestador',[
            'areas' => $areas,
        ]);
    }

    public function cadastroEmpresa(Request $request){
        $empresa = new Empresa();
        $empresa['nomeempresa'] = $request->nomeempresa;
        $empresa['nomefantasia'] = $request->nomefantasia;
        $empresa['rua'] = $request->rua;
        $empresa['numero'] = $request->numero;
        $empresa['complemento'] = $request->complemento;
        $empresa['cep'] = $request->cep;
        $empresa['bairro'] = $request->bairro;
        $empresa['cidade'] = $request->cidade;
        $empresa['cnpj'] = $request->cnpj;
        /*$empresa = Empresa::create([
            'nomeempresa' => $request->nomeempresa,
            'nomefantasia' => $request->nomefantasia,
            'rua' => $request->rua,
            'numero' => $request->numero,
            'complemento' => $request->complemento,
            'cep' => $request->cep,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'cnpj' => $request->cnpj,

        ]);*/
        if($request->hasFile('logoEmpresa') && $request->file('logoEmpresa')->isValid()){
            $extension = $request->logoEmpresa->extension();
            $imgName = md5($request->logoEmpresa->getClientOriginalName() . strtotime("now")) . "." .$extension;
            $request->logoEmpresa->move(public_path('storage/empresas'), $imgName);
            $empresa['logoEmpresa'] = $imgName;
        }
        $empresa->save();
        /*$user = User::where('id', auth()->user()->id)->first();
        $user['empresa'] = $empresa->id;
        $user->save();*/
        return redirect()->route('finalizado');
    }
    public function salvarEmpresaPrestador($id)
    {
        $user = User::where('id', auth()->user()->id)->first();
        $user['empresa'] = $id;
        $user->save();
        return redirect()->route('finalizado');
    }

    public function cadastroUser(Request $request){
        $user = new User();
        $user['name'] = $request->nomeuser;
        $user['email'] = $request->emailuser;
        $user['telefone'] = $request->telefoneuser;
        $user['password'] = Hash::make($request->password);
        $user['nivel'] = 0;
        $user['orcamentos'] = 0;
        $user['orcamentosFinalizados'] = 0;
        $user->save();
        /*$user = User::create([
            'name' => $request->nomeuser,
            'email' => $request->emailuser,
            'telefone' => $request->telefoneuser,
            'password' => Hash::make($request->password),
            'nivel' => 0,
            'orcamentos' => 0,
            'orcamentosFinalizados' => 0,
        ]);*/

        Auth::login($user);
        return redirect()->route('cliente');
    }
}
