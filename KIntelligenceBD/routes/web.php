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

        // // Matches "/api/users/1 
        // //get one user by id
        // $router->get('users/{id}', 'UserController@singleUser');

        // // Matches "/api/users
        // $router->get('users', 'UserController@allUsers');



        // //Exercício 1: Criar função que recebe uma string e devolve a mesma string como resposta
        // $router->post('palavra', 'AuthController@excercise1');
        // //Exercício 2: Criar função que recebe 2 números e devolve a soma dos dois
        // $router->post('soma', 'AuthController@excercise2');
        // //Exercício 3: Receber 1 número e verificar se é par ou impar
        // $router->post('par', 'AuthController@excercise3');
        // //Exercício 4: Receber tipo de conversão (DollarParaEuro ou EuroParaDollar), o valor  e converter
        // $router->post('conversao', 'AuthController@excercise4');
        // //Exercício 5: Receber uma string com varios números separados por um espaço e calcular a soma de todos
        // $router->post('NumeroString', 'AuthController@excercise5');
        // //Exercício 6: Adicionar um novo campo à tabela users, (exemplo: morada, cc, telefone) atualizar a base de dados e as funções afetadas
        // //Função - Users Table //// Register - AuthController // User php
        // //Exercício 7: Criar função que faz update ao campo adicionado ( no UserController)
        // $router->post('UpdateCC', 'UserController@updateuserCC');
        // //Exercício 8:
        // //Função - Users Table //// Register - AuthController // User php
        // //Exercício 9: Criar função que faz update a todos os campos ( no UserController)
        // $router->post('UpdateCC', 'UserController@updateuser');

        // //Registo de Produto
        // $router->post('productRegister', 'ProductController@registoProduto');
        // //Devolve todos os produtos
        // $router->get('showAllProduct', 'ProductController@allProducts');

        // $router->get('showDeterminateProduct', 'ProductController@UserProducts');

        
    });
});