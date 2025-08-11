<?php

namespace App\UseCases;

use App\DTOs\RelacionComercialDTO;
use App\Domain\Repositories\RelacionComercialRepositoryInterface;

class UpdateRelacionComercial{

    public function __construct(private RelacionComercialRepositoryInterface $repo){}

    public function execute(int $id, array $data): bool {
        return $this->repo->update($id,$data);
    }
}