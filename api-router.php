<?php
require_once('libs/Router.php');
require_once('Controller/api-controller.php');

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('ofertas', 'GET', 'apiController', 'obtenerOfertas');
$router->addRoute('ofertas', 'POST', 'apiController', 'agregarOferta');
$router->addRoute('ofertas/:ID', 'GET', 'apiController', ' obtenerOferta');
$router->addRoute('ofertas/:ID', 'DELETE', 'apiController', 'borrarOferta');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
