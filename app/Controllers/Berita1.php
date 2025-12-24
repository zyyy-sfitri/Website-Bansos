<?php
namespace App\Controllers;

use App\Models\berita;

class Berita1 extends BaseController
{
    protected $berita;

    public function __construct()
    {
        $this->berita = new berita();
    }

    public function index(): string
    {
        $data = [
            'title' => 'Berita & Informasi',
            'berita' => $this->berita->getberita()
        ];

        return view('berita/index', $data);
    }

public function detail($id)
{
    $dataBerita = $this->berita->getBerita($id); 

    if (!$dataBerita) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Berita tidak ditemukan');
    }

    $data = [
        'title' => $dataBerita['judul'],
        'berita' => $dataBerita
    ];

    return view('berita/detail', $data); 
}


};
?>