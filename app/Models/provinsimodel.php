<?php

namespace App\Models;

use CodeIgniter\Model;

class provinsimodel extends Model
{
    protected $table = 'provinsi'; 
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['nama_provinsi'];
}
?>