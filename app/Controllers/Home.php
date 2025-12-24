<?php

namespace App\Controllers;

use App\Models\berita;

class Home extends BaseController
{
    public function index()
    {
        $berita = new berita();

        $data['berita'] = $berita->orderBy('id_berita', 'DESC')->findAll();

        echo view('layout/header');
        echo view('layout/home', $data);
        echo view('layout/footer');
    }
}
