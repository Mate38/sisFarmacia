<?php

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('home', 'Venda_ProdutoController@create');

Route::get('vendas', 'Venda_ProdutoController@create');
Route::post('vendas', 'Venda_ProdutoController@store');
Route::delete('vendas/{id}', 'Venda_ProdutoController@destroy');
Route::post('vendas/finaliza', 'VendaController@store');
Route::get('vendas/prazo', 'VendaController@prazo');
Route::delete('vendas', 'VendaController@destroy');

/**
 * Suas rotas vão colocada daqui para baixo
 */

Route::resource('users', 'UserController');
Route::get('personals', 'PersonalController@edit');
Route::put('personals', 'PersonalController@update');

Route::resource('clientes', 'ClienteController');
Route::resource('produtos', 'ProdutoController');
Route::resource('estoques', 'EstoqueController');
Route::resource('fornecedores', 'FornecedorController');

Route::post('clientes/transacao/{id}', 'ClienteController@transacao')->name('clientes.transacao');


