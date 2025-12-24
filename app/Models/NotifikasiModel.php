<?php

namespace App\Models;

use CodeIgniter\Model;

class NotifikasiModel extends Model
{
    protected $table = 'notifikasi';
    protected $allowedFields = ['tipe', 'pesan', 'target_role', 'status', 'created_at'];
    protected $useTimestamps = false;
}

?>
