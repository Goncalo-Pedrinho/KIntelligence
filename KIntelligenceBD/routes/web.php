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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['middleware' => 'cors'], function () use ($router) {
    //All the routes you want to allow CORS for
  
    $router->options('/{any:.*}', function (Request $req) {
      return;
    });

    // API route group
    $router->group(['prefix' => 'Kintelligence'], function () use ($router) {
        // Matches "/Kintelligence/addressregister 
        $router->post('addressregister', 'AddressController@addressRegister');

        // Matches "/Kintelligence/userregister
        $router->post('userregister', 'AuthController@userregister');

        // Matches "/Kintelligence/productregister
        $router->post('productregister', 'ProductController@productRegister');

        // Matches "/Kintelligence/employeeregister
        $router->post('employeeregister', 'EmployeeController@employeeregister');

        // Matches "/Kintelligence/favoriteregister
        $router->post('favoriteregister', 'FavoritesController@favoriteRegister');

        // Matches "/Kintelligence/login
        $router->post('login', 'AuthController@login');

        // Matches "/Kintelligence/ticketregister
        $router->post('ticketregister', 'TicketsController@ticketRegister');
    
        // Matches "/Kintelligence/categoryregister
        $router->post('categoryregister', 'CategoryController@CategoryRegister');
        
        // Matches "/Kintelligence/acquireProductRegister
        $router->post('acquireProductRegister', 'AcquireProductController@AcquireProductRegister');
    
    });
});