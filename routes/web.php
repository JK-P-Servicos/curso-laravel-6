<?php

use Illuminate\Support\Facades\Route;

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

//Route::redirect('/redirect2', '/');
/*
Route::name('produtos.')->group(function(){
    Route::get('produtos', 'ProductController@index')->name('index');
    Route::get('/produtos/create', 'ProductController@create')->name('create'); 
    Route::get('/produtos/{id}','ProductController@show')->name('show');
    Route::get('/produtos/{id}/edit', 'ProductController@edit')->name('edit');
    Route::post('/produtos', 'ProductController@store')->name('store');
});

Route::group([
    'name'=>'produtos.',
    'prefix'=>'produtos'
], function(){
    Route::delete('/{id}', 'ProductController@destroy')->name('destroy');
    Route::put('/{id}', 'ProductController@update')->name('update');
    Route::get('/', 'ProductController@index')->name('index');
    Route::get('/create', 'ProductController@create')->name('create'); 
    Route::get('/{id}','ProductController@show')->name('show');
    Route::get('/{id}/edit', 'ProductController@edit')->name('edit');
    Route::post('/', 'ProductController@store')->name('store');
});
*/
//isso de baixo é o resumo daquilo de cima 😂😂😂😂
Route::resource('produtos', 'ProductController');

Route::get('/login', function(){
    return view('login');
})->name('login');
/*
Route::middleware([])->group(function(){
Route::prefix('/admin')->group(function(){
Route::namespace('Admin')->group(function(){
    
    Route::get('/financeiro', 'TesteController@teste');
    
    Route::get('/dashboard', 'TesteController@teste');
    
    Route::get('/produtos', 'TesteController@teste');

    Route::get('/', 'TesteController@teste');
    
});
});

});
*/
Route::group([
    'middleware'=>[],
    'prefix'=>'/admin',
    'namespace'=>'Admin',
    'name'=>'admin.'
], function(){
    Route::get('/financeiro', 'TesteController@teste')->name('financeiro');
    
    Route::get('/dashboard', 'TesteController@teste')->name('dashboard');
    
    Route::get('/produtos', 'TesteController@teste')->name('produtos');

    Route::get('/', 'TesteController@teste')->name('home');
});

Route::get('/redirect1', function(){
    return redirect()->route('rota2');
});

Route::get('/redirect2', function(){
    return "chegaste ao redirect 2";
})->name('rota2');

Route::match(['put', 'post'], '/match', function(){
    return "Rotas especificas";
});

Route::any('/qualquer', function(){
    return "Qualquer coisa";
});

Route::get('/musica/{flag?}', function($flag=1){
    return 'teu id '.$flag;
}); 

Route::get('/', function () {
    return view('welcome');
});
