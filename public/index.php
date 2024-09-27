<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use Slim\Factory\AppFactory;
use Models\Loyalty\DB;

require __DIR__ . '/../vendor/autoload.php';


$app = AppFactory::create();

include __DIR__ . '/../routes/loyalty/v1/routes.php';

$app->run();
