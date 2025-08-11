<?php

use App\Controllers\PlantasController;
use App\Middleware\AuthMiddleware;
use App\Middleware\RoleMiddleware;
use Slim\App;

return function (App $app) {
    $app->group('/plantas', function ($group) {
        $group->get('', [PlantasController::class, 'index']);
        $group->get('/{id}', [PlantasController::class, 'show']);
        $group->post('', [PlantasController::class, 'store']);
        $group->put('/{id}', [PlantasController::class, 'update']);
        $group->delete('/{id}', [PlantasController::class, 'destroy']);
    });
};
