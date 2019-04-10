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
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

//Rota para Inserir o log de login no bd
Route::get('/loginlog', 'HomeController@updateLoginLogTable');


//Rotas Para Adm
Route::get('/aprovarDocumentos', 'AdmController@listarDocumentos');
Route::get('/cursosAdm', 'AdmController@listarCursos');
Route::get('/listaUsuarios', 'AdmController@listarUsuarios');
Route::get('/admView/user/{id}', 'AdmController@verUsuario');
Route::get('/editPermissions/{id}', 'AdmController@redirecionaEdicaoPermissao')->name('mostraPermissoes');
Route::get('/dashboards', 'AdmController@mostrarDashboards');
Route::get('/cadastroCurso', 'AdmController@redirecionaCadastroCurso');
Route::get('/cursosAdm/{id}', 'AdmController@mostraCurso');
Route::get('/deletaCurso/{id}', 'AdmController@deletaCurso');
Route::post('/cadastrarCurso', 'AdmController@cadastraCurso');
Route::post('/atualizaPermissao', 'AdmController@atualizaPermissao');