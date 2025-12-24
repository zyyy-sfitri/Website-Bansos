<?php

namespace App\Models;

use CodeIgniter\Model;

class KabupatenModel extends Model
{
    protected $table            = 'kabupaten';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['provinsi_id', 'nama'];

    public function getByProvinsi($provinsi_id)
    {
        return $this->where('provinsi_id', $provinsi_id)->findAll();
    }
}
