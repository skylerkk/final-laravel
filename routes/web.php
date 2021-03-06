<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/welcome', function () use ($router) {
    return "Hello World";
});

$router->post('/register', 'UsersController@register');

// $router->get('/users/{id}', 'UsersController@user');
$router->get('/all_users', 'UsersController@get_all_users');
$router->get('/users/{id}', 'UsersController@user');
$router->get('/user/sheets/{id}', 'CharacterSheetController@get_sheets');
$router->get('/character/{id}', 'CharacterSheetController@get_one_sheet');
$router->get('/charcter_skills', 'CharacterSheetController@get_skills');

$router->group(['middleware' => 'auth'], function () use ($router) {
    $router->post('user/get_user', 'UsersController@get_user');
    $router->get('/api/user', 'UsersController@get_curr_user');
    $router->post('/users/update', 'UsersController@update');
    $router->post('/create_sheet', 'CharacterSheetController@create_sheet');
    $router->post('/delete_sheet', 'CharacterSheetController@delete_sheet');
    $router->post('/update_sheet_stats', 'CharacterSheetController@update_sheet_stats');
    $router->post('/update_sheet_info', 'CharacterSheetController@update_sheet_info');
    $router->post('/update_sheet_skills', 'CharacterSheetController@update_sheet_skills');
});
