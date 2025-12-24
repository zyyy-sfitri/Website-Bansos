<?php

    namespace App\Models;
    
    use CodeIgniter\Model;
    
    class dokum extends Model
    {
        protected $table = 'dokumentasi';
        protected $primaryKey = 'id_dokumentasi';
        protected $allowedFields= ['judul', 'gambar', 'wilayah', 'deskripsi'];
        
        public function getdokumentasi($iddokum = false)
        {
            if ($iddokum == false){
                return $this ->findAll();
            }

            return $this->where(['id_dokumentasi' => $iddokum])->first();
        }
    }
