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
        
        /*
        *
        *   ADDRESS
        *
        */
        // Matches "/Kintelligence/addressregister 
        $router->post('addressregister', 'AddressController@addressRegister');

        /*
        *
        *   ADDRESSES JUNCTION
        *
        */
        // Matches "/Kintelligence/newJunctionController 
        $router->post('newJunctionController', 'JunctionAddressesController@JunctionAdressesRegister');

        /*
        *
        *   USER
        *
        */
        // Matches "/Kintelligence/userregister
        $router->post('userregister', 'AuthController@userregister');
        // Matches "/Kintelligence/usereditor
        $router->post('usereditor', 'AuthController@usereditor');
        // Matches "/Kintelligence/login
        $router->post('login', 'AuthController@login');
        // Matches "/Kintelligence/getOneUserByName
        $router->get('getOneUserByName', 'AuthController@getOneUserByName');
       

        /*
        *
        *   PRODUCTS
        *
        */
        // Matches "/Kintelligence/productregister
        $router->post('productregister', 'ProductController@productRegister');

        /*
        *
        *   EMPLOYES
        *
        */
        // Matches "/Kintelligence/employeeregister
        $router->post('employeeregister', 'EmployeeController@employeeregister');

        /*
        *
        *   FAVORITES
        *
        */
        // Matches "/Kintelligence/favoriteregister
        $router->post('favoriteregister', 'FavoritesController@favoriteRegister');

        /*
        *
        *   TICKETS
        *
        */
        // Matches "/Kintelligence/ticketregister
        $router->post('ticketregister', 'TicketsController@ticketRegister');
    
        /*
        *
        *   CATEGORIES
        *
        */
        // Matches "/Kintelligence/categoryregister
        $router->post('categoryregister', 'CategoryController@CategoryRegister');
        
        /*
        *
        *   ACQUIRES
        *
        */
        // Matches "/Kintelligence/acquireProductRegister
        $router->post('acquireProductRegister', 'AcquireProductController@AcquireProductRegister');
    
    });
});