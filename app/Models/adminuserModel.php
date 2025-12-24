<?php

namespace App\Models;

use CodeIgniter\Model;

class adminuserModel extends Model
{
    protected $table = 'datauser';
    protected $primaryKey = 'id_user';
    
    protected $allowedFields = [
        'nama', 'nik', 'email', 'no_hp', 'provinsi', 'kota', 'kecamatan',
        'kelurahan', 'alamat', 'kode_pos', 'password', 'role', 'profil', 
        'status', 'tanggal', 'status_proses'
    ];

    

    public function getadminuser($id_user = false)
    {
        if ($id_user == false) {
            return $this->findAll();
        }

        return $this->where(['id_user' => $id_user])->first();
    }

    public function findadminuser($cari)
    {   
        return $this->table($this->table)->like('nama', $cari); 
    }

    
}