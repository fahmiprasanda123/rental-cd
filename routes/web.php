<?php
use Illuminate\Support\Str;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });

//generate app key
$router->get('/key', function (){
    return Str::random(32);
});

$router->get('/', function () use ($router) {
    $res['success'] = true;
    $res['result'] = "Rental CD created by Fahmi Prasanda";
    return response($res);
  });
  //auth
  $router->post('/login', 'LoginController@index');
  $router->post('/register', 'UserController@register');
  $router->get('/user/{id}', ['middleware' => 'auth', 'uses' =>  'UserController@get_user']);

  //cd
  $router->get('/cd', 'CdController@index');
  $router->get('/cd/{id_cd}', 'CdController@show');
  $router->post('/cd/save', 'CdController@store');
  $router->post('/cd/{id_cd}/update', 'CdController@update');
  $router->post('/cd/delete/{id_cd}', 'CdController@destroy');

  //transaction
  $router->get('/transaction', 'TransactionController@index');
  $router->get('/transaction/{id_transaksi}', 'TransactionController@show');
  $router->post('/transaction/save', 'TransactionController@store');
  $router->post('/transaction/{id_transaksi}/update', 'TransactionController@update');
  $router->post('/transaction/delete/{id_transaksi}', 'TransactionController@destroy');

    //category
    $router->get('/category', 'CategoryController@index');
    $router->get('/category/{id_category}', 'CategoryController@show');
    $router->post('/category/save', 'CategoryController@store');
    $router->post('/category/{id_category}/update', 'CategoryController@update');
    $router->post('/category/delete/{id_category}', 'CategoryController@destroy');