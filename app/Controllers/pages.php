<?php

namespace App\Controllers;

class pages extends BaseController
{
    public function index(): void 
    {
        $beritaModel = new \App\Models\berita();
        $berita = $beritaModel->getberita();

        echo view('layout/header');
        echo view('layout/home', ['berita' => $berita]);
        echo view('layout/footer');
    }

    public function dokum(): void 
    {
        $dokumModel = new \App\Models\dokum();
        $dokum = $dokumModel->getdokumentasi();

        echo view('layout/header');
        echo view('layout/dokum', ['dokumc' => $dokum]);
        echo view('layout/footer');
    }
}
