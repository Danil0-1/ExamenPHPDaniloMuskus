<?php

namespace App\UseCases;

use App\Domain\Repositories\RelacionComercialRepositoryInterface;

class DeleteRelacionComercial{

    public function __construct(private RelacionComercialRepositoryInterface $repo){}

    public function execute(int $id): bool {
        return $this->repo->delete($id);
    }
}