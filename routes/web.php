<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AreaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\EditarController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PainelController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\UsuarioController;
use App\Mail\InteressePrestador;
use App\Models\Pedido;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[IndexController::class, 'index'])->name('index');
Route::get('/cadastro', [CadastroController::class, 'cadastro'])->name('cadastro');
Route::get('/cadastro/empresa/{id}', [CadastroController::class, 'salvarEmpresaPrestador'])->name('salvarEmpresaPrestador');
Route::get('/cadastro-empresa', [CadastroController::class, 'showCadastro'])->name('cadastroempresa');
Route::view('/finalizado', 'cadastro.cadastrofinalizado')->name('finalizado');
Route::view('/login', 'login')->name('login');
//Route::view('/admin', 'admin.dashboard')->name('admin');
Route::view('/cadastre-se', 'cadastro.selectCadastro')->name('select');
Route::post('/cadastro-cliente', [CadastroController::class, 'cadastroUser'])->name('cadastroUser');
Route::view('/cadastro-cliente', 'cadastro.cadastroCliente')->name('cadastroCliente');
Route::get('/selecione-empresa', [CadastroController::class, 'selecioneEmpresa'])->name('selecioneEmpresa');

Route::get('/pedido/{areaprincipal}/especificação',[PedidoController::class, 'pedidoShow'])->name('pedido');
Route::get('/pedido/{areaprincipal}/{areaespecifica}/finalizar', [PedidoController::class, 'finalpedido'])->name('finalizarPedido');
Route::post('/pedido/create/{areaprincipal}/{areaespecifica}', [PedidoController::class, 'createPedido'])->name('criarPedido');

Route::get('/painel-pedidos', [PainelController::class, 'showPainel'])->name('painel');
Route::get('/painel-pedidos/{id}', [PainelController::class, 'listagemPedidos'])->name('lista');
Route::get('/painel-pedidos/enviando-orcamento/{id}', [PainelController::class, 'pedidoInteressado'])->name('pedidoInteressado');
Route::post('/painel-pedidos/{id}/enviando-orcamento', [PedidoController::class,'orcamento'])->name('orcamento');
Route::get('/painel-pedidos/interesse/{id}', [PedidoController::class, 'enviarInteresse'])->name('enviarInteresse');
Route::get('/meus-orcamentos', [PerfilController::class, 'meusPedidos'])->name('meusPedidos');
Route::get('/{id}/detalhes', [PerfilController::class, 'detalhes'])->name('detalhes');
Route::get('/pedido/mail/{id}', [PedidoController::class, 'mailNotify'])->name('mailNotify');

Route::get('/admin', [AdminController::class, 'show'])->name('admin');
Route::get('/admin/{id}/delete', [AdminController::class, 'getid'])->name('getid');
Route::get('/admin/{id}/editar', [AreaController::class, 'showEdit'])->name('editarArea');
Route::post('/admin/editar/adicionar', [AreaController::class, 'adicionarAreaEspecifica'])->name('addespecifica');
Route::post('/cadastro',[CadastroController::class, 'cadastroPrestador'])->name('cadastro');
Route::post('/cadastro-empresa',[CadastroController::class, 'cadastroEmpresa'])->name('cadastroempresa');
Route::post('/login',[LoginController::class, 'login'])->name('loginvalidacao');
Route::put('/editar-perfil/{id}', [EditarController::class, 'editar'])->middleware(['auth'])->name('validaredit');
Route::post('/admin/adicionararea', [AreaController::class, 'adicionarArea'])->name('addarea');
Route::post('/perfil/addarea', [EditarController::class, 'addAreas'])->name('addAreaPrestador');

Route::get('/cliente/area-cliente', [UsuarioController::class, 'areaUsuario'])->middleware(['auth'])->name('cliente');
Route::get('/cliente/pedido/{id}', [UsuarioController::class, 'pedido'])->name('pedidoCliente');
Route::get('/cliente/pedido/{id}/fechar-negocio', [UsuarioController::class, 'aceitarOrcamento'])->name('fecharNegocio');
Route::get('/cliente/pedido-fechado/{id}', [UsuarioController::class, 'orcamentoAceito'])->name('fechado');
Route::get('/cliente/prestador/{id}', [UsuarioController::class, 'perfilPrestador'])->name('perfilPrestador');
Route::get('/cliente/avaliar-prestador/{nome}', [PerfilController::class, 'avaliar'])->name('avaliar');
Route::post('/cliente/prestador-avaliado', [PerfilController::class, 'salvarAvaliacao'])->name('save');
Route::get('/cleinte/{id}/delete', [UsuarioController::class, 'deletarPedido'])->name('deletarPedido');
Route::get('/cliente/encerrar/{id}', [PedidoController::class, 'encerrarPedidoCliente'])->name('encerrarPedidoCliente');
Route::get('/{id}/detalhes/encerrar', [PedidoController::class, 'encerrarPedidoPrestador'])->name('encerrarPedidoPrestador');
Route::get('/pedido-aceito/dados/contato{id}', [UsuarioController::class, 'dadosPrestador'])->name('dadosPrestador');

Route::get('/logout',[LoginController::class, 'logout'])->name('logout');
Route::get('/perfil',[PerfilController::class, 'showPerfil'])->middleware(['auth'])->name('perfil');

Route::get('/editar-perfil/{id}', [EditarController::class, 'editarshow'])->middleware(['auth'])->name('editarperfil');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/*Route::get('/email', function(){
    $user = new stdClass;
    $user->name = "Adriano";
    $user->email = "popoviczadriano@gmail.com";
    return new InteressePrestador($user);
});*/

require __DIR__.'/auth.php';
