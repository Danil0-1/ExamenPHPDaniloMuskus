<?php
namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class RelacionComercial extends Model{
    protected $table = 'relacion_comercial';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'tipo',
        'fecha_registro',
        'activo',
    ];
}