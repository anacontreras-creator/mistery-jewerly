<?php

namespace App\Models;

use CodeIgniter\Model;

// 1. CREACIÓN DEL MODELO DE USUARIO
class UserModel extends Model
{
    // 1.1 Nombre de la tabla de la base de datos
    protected $table = 'usuarios';

    // 1.2 Clave primaria de la tabla
    protected $primaryKey = 'id_usuario';

    // 1.3 Columnas permitidas para insertar y modificar
    protected $allowedFields = [
        'nombre',
        'apellido',
        'email',
        'contrasenas'
    ];

    // 1.4 Tipo de retorno de las consultas
    protected $returnType = 'array';
}