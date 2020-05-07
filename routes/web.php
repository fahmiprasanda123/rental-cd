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