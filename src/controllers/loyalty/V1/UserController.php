<?php

namespace App\Controllers\Loyalty\V1;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

//need to comment the parameters and return variables incl types for the below


class UserController{
    
        public function getAll(Request $request, Response $response){

           $db = new \App\Models\Loyalty\V1\DatabaseModel();
           $dbConn = $db->getConnection();
           
           //need to capture db/connection errors and return error to entity calling api

           $usersObj = new \App\Models\Loyalty\V1\UserModel($dbConn);
           $allUsers = $usersObj->getAll();

           $response->getBody()->write(json_encode($allUsers));

           return $response
             ->withHeader('content-type', 'application/json')
             ->withStatus(200);
                   
  
        }
        
        
       public function createUser(Request $request, Response $response){
           
          
           $params = (array)$request->getParsedBody();
           //process/filter in method to avoid redundancies

           $userOBJ = new \stdClass();
           
           $userOBJ->name = null;
            if((isset($params['name'])) && (gettype(trim($params['name']))=='string')){
               $userOBJ->name = strip_tags(trim($params['name']));
            }
            
            $userOBJ->email = null;
            
            if((isset($params['email'])) && (filter_var(trim($params['email']), FILTER_VALIDATE_EMAIL))){
               $userOBJ->email = strip_tags(trim($params['email']));
            }
            
            //obviously the program would terminate and return an error should these required values be null/empty;
                
           $userOBJ->points = 0;           
           
           $db = new \App\Models\Loyalty\V1\DatabaseModel();
           $dbConn = $db->getConnection();
           
           //need to capture db/connection errors and return error to entity calling api

           $usersOBJ = new \App\Models\Loyalty\V1\UserModel($dbConn);
           $newUserID = $usersOBJ->createUser($userOBJ);
           
           $newUserOBJ = $usersOBJ->getSpecificUser($newUserID);

           $response->getBody()->write(json_encode($newUserOBJ));

           return $response
             ->withHeader('content-type', 'application/json')
             ->withStatus(200);
           
       }
       
       
       public function deleteUser(Request $request, Response $response){
           
            $id = $request->getAttribute("id");
 
            $userID = null;
            if(isset($id)){
               $userID = (int)strip_tags(trim($id));
            }

           $db = new \App\Models\Loyalty\V1\DatabaseModel();
           $dbConn = $db->getConnection();
           
           //need to capture db/connection errors and return error to entity calling api

           $usersObj = new \App\Models\Loyalty\V1\UserModel($dbConn);
           $usersObj->deleteSpecificUser($userID);

           $response->getBody()->write(json_encode("User $userID was successfully deleted"));

           return $response
             ->withHeader('content-type', 'application/json')
             ->withStatus(200);
                   
  
        }

}