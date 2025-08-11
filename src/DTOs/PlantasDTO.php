<?php

namespace App\DTOs;

use Respect\Validation\Validator as v;
use Respect\Validation\Exceptions\ValidationException;
use InvalidArgumentException;
use DateTime;

class PlantasDTO
{
    public static function fromArray(array $data): array
    {
        try {
            v::key('tipo', v::in(['CLIENTE', 'PROVEEDOR', 'SOCIO']))
	        ->key('fecha_registro', v::date('Y-m-d'))
            ->assert($data);
        } catch (ValidationException $e) {
            throw new InvalidArgumentException('Campos invalidos | tipo = CLIENTE o PROVEEDOR o SOCIO ');
        }

	    $data['fecha_registro'] = (new DateTime($data['fecha_registro']))->format('Y-m-d');


        return $data; // datos ya validados
    }
}