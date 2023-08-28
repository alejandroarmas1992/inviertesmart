<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;

use Controllers\PaginasController;
use Controllers\RegistroController;


$router = new Router();


// Boleto virtual
$router->get('/boleto', [RegistroController::class, 'boleto']);

// Área Pública
$router->get('/', [PaginasController::class, 'index']);
$router->get('/evento', [PaginasController::class, 'evento']);
$router->get('/paquetes', [PaginasController::class, 'paquetes']);
$router->get('/workshops-conferencias', [PaginasController::class, 'conferencias']);
$router->get('/404', [PaginasController::class, 'error']);

$router->get('/inversion-corta', [PaginasController::class, 'inversioncorta']);
$router->post('/inversion-corta', [PaginasController::class, 'inversioncorta']);
$router->get('/inversion-larga', [PaginasController::class, 'inversionlarga']);
$router->post('/inversion-larga', [PaginasController::class, 'inversionlarga']);
$router->get('/acciones', [PaginasController::class, 'acciones']);
$router->get('/bitcoins', [PaginasController::class, 'bitcoins']);
$router->get('/simuladores', [PaginasController::class, 'simuladores']);


$router->comprobarRutas();