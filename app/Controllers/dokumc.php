<?php
namespace App\Controllers;

use App\Models\dokum;


class dokumc extends BaseController
{
    protected $dokumentasi;

    public function __construct()
    {
        $this->dokumentasi = new dokum();
    }

    public function ccc() : string 
    {
        $data =[
            'title' => 'Daftar admindokum',
            'dokumc' => $this->dokumentasi->getdokumentasi()
        ];
        return view('dokum/dokumc', $data);
    }

    public function detail($id_dokumentasi)
    {
        $data =[
            'title' => 'Detail admindokum',
            'dokumc' => $this->dokumentasi->getdokumentasi($id_dokumentasi)
        ];

        return view('dokum/detail', $data);
    }

    public function tambah(){
        $data = [
            'title' => 'from Tambah Data admindokumentasi',
            'validation' => \Config\Services::validation()
        ];

        return view('dokum/tambah_dokum', $data);
    }

    public function simpan()
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} admindokumentasi harus diisi',
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
            return redirect()->to('/dokumc/tambah')->withInput();
        }

        $filegambar = $this->request->getFile('gambar');
        $filegambar->move('img');
        $nmgambar = $filegambar->getName();
        
        // simpan ke database
        $this->dokumentasi->save([
            'judul' => $this->request->getVar('judul'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'wilayah' => $this->request->getVar('wilayah'),
            'gambar' => $nmgambar,
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('/dokumc');
    }

    public function hapus($id_dokumentasi){
        $this->dokumentasi->delete($id_dokumentasi);

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('/dokumc');
    }


   
    
}