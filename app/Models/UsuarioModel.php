<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table            = 'usuarios';
    protected $primaryKey       = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['user','email','pass']; 



    public function passHash($passHash)
    {
        return password_hash($passHash, PASSWORD_DEFAULT);
    }
    public function passVerificar($passPlano, $passHash)
    {
        return password_verify($passPlano, $passHash);
    }

}
