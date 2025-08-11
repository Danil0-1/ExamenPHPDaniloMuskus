<?php


namespace App\UseCases;

use App\Domain\Models\RelacionComercial;
use App\Domain\Repositories\RelacionComercialRepositoryInterface;

class CreateRelacionComercial{

    public function __construct(private RelacionComercialRepositoryInterface $repo){}
    public function execute(array $data): ?RelacionComercial{
        return $this->repo->create($data);
    }
}