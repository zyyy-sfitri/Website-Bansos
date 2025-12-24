<?php

namespace App\Controllers;

use App\Models\KabupatenModel;

class Wilayah extends BaseController
{
    public function kabupaten($provinsi_id)
    {
        $kabModel = new KabupatenModel();
        $data = $kabModel->getByProvinsi($provinsi_id);

        return $this->response->setJSON($data);
    }

    

    
}
