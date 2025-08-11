<?php

namespace App\UseCases;

use App\Domain\Repositories\RelacionComercialRepositoryInterface;

class GetAllRelacionComercial{
    public function __construct(private RelacionComercialRepositoryInterface $repo){}
    public function execute(): array{
        return $this->repo->getAll();
    }
}