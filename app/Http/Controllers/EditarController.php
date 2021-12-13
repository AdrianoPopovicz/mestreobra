<?php

namespace App\Http\Controllers;

use App\Models\Atuacao;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;



class EditarController extends Controller
{
    public function editarshow($id)
    {
        return view('prestador.editar');
    }

    public function editar(Request $request, $id)
    {
        $prestador = User::where('id', $id)->first();
        
        $prestador['name'] = $request->name;
        $prestador['email'] = $request->email;
        $prestador['telefone'] = $request->telefone;
        if($request->password !=null){
            if(Hash::check($request->actualpassword, auth()->user()->password)){
                $prestador['password'] = bcrypt($request->password);
            }
            else{
                return redirect()->back()->with('error', 'As senhas não conferem');
            }
        }
        else{
            $prestador['password'] = $prestador['password'];
        }
        if($request->hasFile('fotoPerfil') && $request->file('fotoPerfil')->isValid()){
            $extension = $request->fotoPerfil->extension();
            $imgName = md5($request->fotoPerfil->getClientOriginalName() . strtotime("now")) . "." .$extension;
            $request->fotoPerfil->move(public_path('storage/prestadorperfil'), $imgName);
            $prestador['fotoPerfil'] = $imgName;
        }
        $prestador->save();
        return redirect()->route('perfil');
    }
    public function addAreas(Request $request)
    {
        $prestador = User::where('id', auth()->user()->id)->first();
        $areas = new Atuacao();
        $areas['areas'] = $request->newarea;
        $areas['prestador'] = $prestador->id;
        $areas->save();
        return redirect()->route('perfil');
    }
}
