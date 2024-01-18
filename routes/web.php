<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use Illuminate\Http\Request;
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

$router->get('/', ['uses' => 'HomeController@index']);
$router->get('/hello', ['uses' => 'HomeController@hello']);
$router->get('/home', ['middleware' => 'auth', 'uses' => 'HomeController@home']); //
$router->get('/home', ['middleware' => 'jwt.auth', 'uses' => 'HomeController@home']);





$router->get('/', ['uses' => 'HomeController@index']);
$router->get('/hello', ['uses' => 'HomeController@hello']); // route hello
$router->group(['prefix' => 'users'], function () use ($router) {
	$router->post('/default', ['uses' => 'HomeController@defaultUser']);
	$router->post('/new', ['uses' => 'HomeController@createUser']);
	$router->get('/all', ['uses' => 'HomeController@getUsers']);
});


// Auth
$router->group(['prefix' => 'auth'], function () use ($router) {
	$router->post('/register', ['uses' => 'AuthController@register']);
	$router->post('/login', ['uses' => 'AuthController@login']); // route login
});



// $router->get('/key', function () use ($router) {
//     return Str::random(32);
// });
// $router->get('/get', function () {
// return 'GET';
// });

// $router->post('/post', function () {
// 	return 'POST';
// });
// $router->put('/put', function () {
// 	return 'PUT';
// });
// $router->patch('/patch', function () {
// 	return 'PATCH';
// });
// $router->delete('/delete', function () {
// 	return 'DELETE';
// });
// $router->options('/options', function () {
// 	return 'OPTIONS';
// });


// $router->get('/user/{id}', function ($id) {
// 	return 'User Id = ' . $id;
// });

// $router->get('/post/{postId}/comments/{commentId}', function ($postId, $commentId) {
// 	return 'Post ID = ' . $postId . ' Comments ID = ' . $commentId;
// });

// $router->get('/users[/{userId}]', function ($userId = null) {
// 	return $userId === null ? 'Data semua users' : 'Data user dengan id ' . $userId;
// });



// $router->get('/auth/login', ['as' => 'route.auth.login', function () {
// 	return response()->json(['message' => 'Login page']);
// }]);

// $router->get('/profile', function (Request $request) {
// 	if ($request->isLoggedIn) {
// 		return redirect()->route('route.auth.login');
// 	}
// });


// $router->group(['prefix' => 'users'], function () use ($router) {
// 	$router->get('/', function () {
// 		return response()->json(['message' => 'data semua user']);
// 	});
// });

// $router->get('/admin/home/', ['middleware' => 'age', function () {
// 	return 'Dewasa';
// }]);
// $router->get('/fail', function () {
// 	return 'Dibawah umur';
// });






