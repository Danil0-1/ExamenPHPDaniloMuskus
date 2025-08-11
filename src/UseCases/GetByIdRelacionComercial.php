<?php

namespace App\UseCases;

use App\Domain\Models\RelacionComercial;
use App\Domain\Repositories\RelacionComercialRepositoryInterface;

class GetByIdRelacionComercial{

    public function __construct(private RelacionComercialRepositoryInterface $repo){}

    public function execute(int $id): ?RelacionComercial {
        return $this->repo->getById($id);
    }
}