<?php
namespace App\Controllers;

use App\Models\berita;


class admindokum extends BaseController
{
    protected $berita;

    public function __construct()
    {
        $this->berita = new berita();
    }

    public function index() : string 
    {
        $data =[
            'title' => 'Daftar admindokum',
            'admindokum' => $this->berita->getberita()
        ];
        return view('admindokum/berita', $data);
    }

    public function detail($id_berita)
    {
        $data =[
            'title' => 'Detail admindokum',
            'admindokum' => $this->berita->getberita($id_berita)
        ];

        return view('admindokum/detail', $data);
    }

    public function tambah(){
        $data = [
            'title' => 'from Tambah Data adminberita',
            'validation' => \Config\Services::validation()
        ];

        return view('admindokum/tambah', $data);
    }

    public function simpan()
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} adminberita harus diisi',
                ]
            ],
            'gambar'=>[
                'rules'=>'uploaded[gambar]|max_size[gambar,10000]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors'=>[
                    'uploaded' => 'Gambar Wajib diisi',
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'File Wajib gambar',
                    'mime_in' => 'Tipe file gambar tidak sesuai'
                ]
            ]
        ])) {
            return redirect()->to('/admindokum/tambah')->withInput();
        }

        $filegambar = $this->request->getFile('gambar');
        $filegambar->move('img');
        $nmgambar = $filegambar->getName();
        
        $this->berita->save([
            'judul' => $this->request->getVar('judul'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'wilayah'   => $this->request->getVar('wilayah'),
            'tanggal'   => $this->request->getVar('tanggal'),
            'gambar'    => $nmgambar,
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('/admindokum/berita');
    }

    public function hapus($id_berita){
        $this->berita->delete($id_berita);

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('/admindokum/berita');
    }
}