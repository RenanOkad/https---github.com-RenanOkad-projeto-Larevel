<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HojeController;
use App\Http\Controllers\PiramideController;
use App\Http\Controllers\ConeController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProdutosPedidoController;
use App\Http\Controllers\AmazonController;

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

// Route::get('/', function () {
//     return 'Home Get';
// });

// Route::post('/', function () {
//     return 'Home Post';
// });

// Route::put('/', function () {
//     return 'Home Put';
// });

// Route::delete('/', function () {
//     return 'Home Delete';
// });

// Route::redirect('/players', '/jogadores');


// Route::get('/jogadores', function(){
//     echo "1 - Neymar<br>";
//     echo "2 - Pelé<br>";
//     echo "1 - Zico<br>";
// });

// Route::get('/tab/{ini}/{fim}/{valor}', function ($valor, $ini,$fim) {
//     for($x = $ini; $x<=$fim; $x++){
//         $resultado = $valor*$x;
//         echo $x. " * ". $valor." = ". $resultado."</br>";
//     }
// });

// Route::get('/valida/{texto}/{numero}', function ($texto,$numero) {
//     return "Texto: $texto </br>Número: $numero";

// })->where("texto", "[A-z] + ") -> where("numero", "[0-9]+");

// Route::prefix('/app')-> group(function(){
//     Route::get('/', function(){
//         return "app -home";
//     });

//     Route::get('/teste', function(){
//         return "app - teste";
//     });
// });

// Route::get('/redirect', [HojeController::class, 'teste']);

// Route::get('/piramide/{altura}/{ab}/{tipoTinta}', [PiramideController::class, 'calcular'])-> where("altura", "[+-]?([0-9]+([.][0-9]*)?|[.][0-9]+)") -> where("ab", "[+-]?([0-9]+([.][0-9]*)?|[.][0-9]+)")-> where("tipoTinta", "[0-9]+");

// Route::get('/cone/{altura}/{raio}/{tipoTinta}', [ConeController::class, 'calcular'])-> where("altura", "[+-]?([0-9]+([.][0-9]*)?|[.][0-9]+)") -> where("ab", "[+-]?([0-9]+([.][0-9]*)?|[.][0-9]+)")-> where("tipoTinta", "[0-9]+");

// Route::resource('/agenda', AgendaController::class);

Route::resource('/contato', ContatoController::class);

Route::resource('/usuario', UsuarioController::class);

Route::resource('/estado', EstadoController::class);

Route::resource('/config', ConfigController::class);

Route::resource('/categoria', CategoriaController::class);

Route::resource('/cidade', CidadeController::class);

Route::resource('/endereco', EnderecoController::class);

Route::resource('/pedido', PedidoController::class);

Route::resource('/carrinho', CarrinhoController::class);

Route::resource('/produto', ProdutoController::class);

Route::resource('/produtos_pedido', ProdutosPedidoController::class);

Route::resource('/Amazon', AmazonController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
