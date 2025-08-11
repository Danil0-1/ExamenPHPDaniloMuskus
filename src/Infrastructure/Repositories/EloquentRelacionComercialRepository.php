<?php
// 7.
namespace App\Infrastructure\Repositories;

use Illuminate\Support\Collection;
use App\Domain\Models\RelacionComercial;
use App\Domain\Repositories\RelacionComercialRepositoryInterface;

class EloquentRelacionComercialRepository implements RelacionComercialRepositoryInterface{
    public function getAll() : array {
        // SELECT * FROM Variedades;
        return RelacionComercial::all()->toArray();
    }

    public function getById(int $id): ?RelacionComercial {
        return RelacionComercial::where('id', $id)->first();
    }
    

    public function create(array $data): RelacionComercial {
        
        if (isset($data['id'])) {
            $exists = RelacionComercial::where('id', $data['id'])->first();
            if ($exists) {
                return $exists;
            }
        }        
        return RelacionComercial::create($data);
    }
    
    public function update(int $id, array $data): bool{
        $caracter = $this->getById($id);
        return $caracter ? $caracter->update($data) : false;
    }
    

    public function delete(int $id): bool{
        // SELECT * FROM Variedades WHERE id = $id;
        $caracter = RelacionComercial::find($id);
        // DELETE FROM Variedades WHERE id = $id;
        return $caracter ? $caracter->delete() : false;   
    }

}