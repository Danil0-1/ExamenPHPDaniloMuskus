<?php

namespace App\Domain\Repositories;

use App\Domain\Models\RelacionComercial;

interface RelacionComercialRepositoryInterface
{
    public function getAll(): array;
    public function getById(int $id): ?RelacionComercial;
    public function create(array $data): RelacionComercial;
    public function update(int $id, array $data): bool;
    public function delete(int $id): bool;
}