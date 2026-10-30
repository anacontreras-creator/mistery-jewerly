<?php
namespace App\Controllers;
class PruebaBD extends BaseController
{
    public function index()
    {
        try {
            $db = \Config\Database::connect();
            $db->query('SELECT 1');

            return 'CONEXION CORRECTA CON MYSQL';
        } catch (\Throwable $e) {
            return 'ERROR DE CONEXION: ' . $e->getMessage();
        }
    }
}
