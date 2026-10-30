<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id_productos';

   protected $allowedFields = [
    'nombre',
    'descripcion',
    'stock',
    'precio',
    'id_categoria',
    'imagen'
];
    protected $useTimestamps = false;
}


