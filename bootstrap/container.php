<?php

// Contenedor
use DI\Container;

//Factory Interface
use Psr\Http\Message\ResponseFactoryInterface;

// Usuario
use App\Domain\Repositories\UserRepositoryInterface;
use App\Infrastructure\Repositories\EloquentUserRepository;

// Relacion Comercial

use App\Domain\Repositories\RelacionComercialRepositoryInterface;
use App\Infrastructure\Repositories\EloquentRelacionComercialRepository;

// Plantas

use App\Domain\Repositories\PlantasRepositoryInterface;
use App\Infrastructure\Repositories\EloquentPlantasRepository;

// Manejo de errores
use App\Handler\CustomErrorHandler;
use Slim\Handlers\ErrorHandler;
use Slim\Interfaces\ErrorHandlerInterface;

$container = new Container();

// 1. User
$container->set(UserRepositoryInterface::class,function(){
    return new EloquentUserRepository();
});

// 2. RelacionComercial

$container->set(RelacionComercialRepositoryInterface::class,function(){
    return new EloquentRelacionComercialRepository();
});

// 3. Plantas

$container->set(PlantasRepositoryInterface::class,function(){
    return new EloquentPlantasRepository();
});

// Manejo de Errores
$container->set(ErrorHandlerInterface::class, function () use ($container){
    return new CustomErrorHandler(
        $container->get(ResponseFactoryInterface::class)
    );
});

return $container;