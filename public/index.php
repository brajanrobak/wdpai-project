<?php

declare(strict_types=1);

use App\Controller\DefaultController;
use App\Controller\PantryController;
use App\Controller\SecurityController;
use App\Routing;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$routing = new Routing();

$routing->get('/', DefaultController::class, 'index');
$routing->get('/pantry', PantryController::class, 'index');
$routing->get('/pantry/add', PantryController::class, 'create');
$routing->get('/pantry/{id}', PantryController::class, 'show');
$routing->get('/history', PantryController::class, 'history');
$routing->get('/login', SecurityController::class, 'login');

$routeFound = $routing->dispatch(
    $_SERVER['REQUEST_METHOD'],
    $_SERVER['REQUEST_URI'],
);

if (!$routeFound) {
    http_response_code(404);
    (new DefaultController())->notFound();
}
