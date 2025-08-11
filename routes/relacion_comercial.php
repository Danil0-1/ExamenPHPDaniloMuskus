<?php

use App\Controllers\RelacionComercialController;
use App\Middleware\AuthMiddleware;
use App\Middleware\RoleMiddleware;
use Slim\App;

return function (App $app) {
    $app->group('/relacion_comercial', function ($group) {
        $group->get('', [RelacionComercialController::class, 'index']);
        $group->get('/{id}', [RelacionComercialController::class, 'show']);
        $group->post('', [RelacionComercialController::class, 'store']);
        $group->put('/{id}', [RelacionComercialController::class, 'update']);
        $group->delete('/{id}', [RelacionComercialController::class, 'destroy']);
    });
};
