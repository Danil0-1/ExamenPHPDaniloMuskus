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
        } catch (ValidationException $e) {
            throw new InvalidArgumentException('Campos invalidos');
        }

        return $data; // datos ya validados
    }
}
