<?php

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return function (RouteBuilder $routes): void {
    $routes->setRouteClass(DashedRoute::class);
    
    $routes->scope('/', function (RouteBuilder $routes): void {
        // Rutas principales
        $routes->connect('/', ['controller' => 'Users', 'action' => 'login'], ['_name' => 'home']);
        $routes->connect('/login', ['controller' => 'Users', 'action' => 'login'], ['_name' => 'login']);
        $routes->connect('/logout', ['controller' => 'Users', 'action' => 'logout'], ['_name' => 'logout']);
        
        // Rutas de usuarios - específicas primero (mayor prioridad)
        $routes->connect('/users/add', ['controller' => 'Users', 'action' => 'add'], ['_name' => 'users-add']);
        $routes->connect('/users/view/:id', ['controller' => 'Users', 'action' => 'view'], ['pass' => ['id'], '_name' => 'users-view']);
        $routes->connect('/users/edit/:id', ['controller' => 'Users', 'action' => 'edit'], ['pass' => ['id'], '_name' => 'users-edit']);
        $routes->connect('/users/delete/:id', ['controller' => 'Users', 'action' => 'delete'], ['pass' => ['id'], '_name' => 'users-delete']);
        $routes->connect('/users/change-language/:lang', [
            'controller' => 'Users',
            'action' => 'changeLanguage'
        ], ['pass' => ['lang'], '_name' => 'users-changelanguage']);
        
        // Ruta genérica para acciones de Users
        $routes->connect('/users/:action', ['controller' => 'Users'], ['_name' => 'users-action']);
        $routes->connect('/users', ['controller' => 'Users', 'action' => 'index'], ['_name' => 'users-index']);
    });
};