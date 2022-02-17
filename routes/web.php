<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecetaController;

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

/*Route::get('/', function () {
    return view('welcome');
    // return "Hola";
});*/
// Route::get('/nosotros', function () {
//     return view('nosotros');
// });
//llamando a un controlador en este caso 'RecetaController'
Route::get('/',[RecetaController::class,'index'] ) -> name('recetas');
Route::get('/recetas',[RecetaController::class,'index'] ) -> name('recetas.index');
Route::get('/recetas/create', [RecetaController::class,'create']) -> name('recetas.create');
Route::post('/recetas', [RecetaController::class,'store']) -> name('recetas.store');
Route::get('/recetas/{receta}', [RecetaController::class,'show']) -> name('recetas.show');
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
