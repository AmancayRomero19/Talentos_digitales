<?php
namespace App\Models;

use CodeIgniter\Model;

class Consulta_model extends Model
{
    protected $table = 'consulta'; // Nombre de la tabla
    protected $primaryKey = 'N° de consulta'; // Identificador de la tabla
    protected $allowedFields = ['nombre', 'email', 'motivo', 'descripcion']; // Todos los campos de la tabla

    
}
