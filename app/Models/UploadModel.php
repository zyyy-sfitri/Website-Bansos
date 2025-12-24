<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class UploadModel extends Model
    {
        protected $table            = 'upload';
        protected $primaryKey       = 'id_upload';

        protected $allowedFields    = [
            'id_user', 
            'foto_profile', 
            'ktp', 
            'kk', 
            'sktm', 
            'bukti_penghasilan', 
            'foto_rumah_depan'
        ];
    }