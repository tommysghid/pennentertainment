<?php

use Slim\Routing\RouteCollectorProxy;

$app->group('/loyalty/api/v1', function (RouteCollectorProxy $group) {

            //Get all users
            $group->get('/users', [App\Controllers\Loyalty\V1\UserController::class,'getAll']);
           
            //Create a User
            $group->post('/users', [App\Controllers\Loyalty\V1\UserController::class,'createUser']);

            //Delete specific user
            $group->get('/users/delete/{id}',[App\Controllers\Loyalty\V1\UserController::class,'deleteUser']);
            
            
           /*
            * need to add these but ran out of time
            * 
            
            //redeme points for user
            $app->post('/users/{id}/redeem', [,]);
            
            
           //give points to users account
           $app->post('/users/{id}/earn', [,]);
            */
});

