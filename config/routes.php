<?php

use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::plugin(
    'Allinoneaccessibility',
    ['path' => '/allinoneaccessibility'],
    function (RouteBuilder $routes) {
        $routes->prefix('admin', function (RouteBuilder $routes) {
            $routes->connect('/settings', ['controller' => 'Settings', 'action' => 'index']);
        });
    }
);
