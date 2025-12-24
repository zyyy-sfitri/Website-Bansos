<?php

namespace App\Controllers;

use App\Models\adminuserModel;
use App\Models\UploadModel;


class bansos extends BaseController
{
    protected $data;

    public function __construct()
    {
        $this->data = new adminuserModel();
    }

    public function profil()
    {
        $id_user = session('id_user');
        if (!$id_user) {
            return redirect()->to('/login');
        }

        $user = $this->data->getadminuser($id_user);

        return view('user/profile', ['user' => $user]);
    }


      public function index($id = null)
    {
        return view('status_page');
    }

    public function dashboard()
    {
        $id_user = session('id_user');

        if (!$id_user) {
            return redirect()->to('/login');
        }

        $user = $this->data->getadminuser($id_user);

        return view('user/profile', ['user' => $user]);
    }
    
       public function status()
{
    $id_user = session('id_user');

    if (!$id_user) {
        return redirect()->to('/login');
    }

    // Ambil data user
    $user = $this->data->getadminuser($id_user);

    $uploadModel = new \App\Models\UploadModel();

    // Cek apakah user sudah upload
    $dataPengajuan = $uploadModel->where('id_user', $id_user)->first();

    $sudah_upload = $dataPengajuan ? true : false;

    // Kirim ke view
    return view('user/status', [
        'user' => $user,
        'sudah_upload' => $sudah_upload,
        'data_pengajuan' => $dataPengajuan 
    ]);
}



public function upload()
{
    $id_user = session('id_user');

    if (!$id_user) {
        return redirect()->to('/login');
    }

    // 1. Ambil data profil user 
    $user = $this->data->getadminuser($id_user);

    // 2. TAMBAHAN BARU: Cek apakah user sudah pernah upload?
    $uploadModel = new \App\Models\UploadModel(); 
    
    // Cek database berdasarkan id_user
    $dataPengajuan = $uploadModel->where('id_user', $id_user)->first();

    // Tentukan status: True jika data ditemukan, False jika kosong
    $isUploaded = $dataPengajuan ? true : false;

    // 3. Kirim variable 'sudah_upload' ke View
    return view('user/upload', [
        'user' => $user,
        'sudah_upload' => $isUploaded  
    ]);
}


   public function uploadSubmit()
{
    $model = new UploadModel();
    
    // 1. Cek Login
    $id_user = session()->get('id_user'); 
    if (!$id_user) {
        return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
    }

    // 2. LOGIKA UTAMA: Cek apakah user sudah pernah upload?
    $existingData = $model->where('id_user', $id_user)->first();

    if ($existingData) {
        session()->setFlashdata('error', 'Anda sudah pernah mengirim dokumen! Mohon tunggu proses verifikasi.');
        return redirect()->to(base_url('/user/upload')); 
    }

    // 3. Persiapkan Data
    $dataInsert = [
        'id_user' => $id_user,
        'status'  => 'Pending',
        'tanggal_pengajuan' => date('Y-m-d H:i:s') 
    ];

    // Daftar field sesuai dengan name="" di HTML tadi
    $fields = ['ktp', 'kk', 'sktm', 'bukti_penghasilan', 'foto_rumah_depan'];

    // 4. Proses Upload File Satu per Satu
    foreach ($fields as $field) {
        $file = $this->request->getFile($field);

        if ($file && $file->isValid() && !$file->hasMoved()) {
            
            $fileName = $file->getRandomName();
            
            $file->move('uploads/user_docs', $fileName);
            
            $dataInsert[$field] = $fileName;
        } else {

        }
    }

    // 5. Simpan ke Database (HANYA INSERT, TIDAK ADA UPDATE)
    if (count($dataInsert) > 2) { 
        $model->insert($dataInsert);
        session()->setFlashdata('pesan', 'Dokumen berhasil dikirim! Terima kasih.');
    } else {
        session()->setFlashdata('error', 'Gagal mengunggah dokumen. Pastikan file dipilih.');
    }

    return redirect()->to(base_url('/user/upload')); 
}

     public function ganti()
    {
        $id_user = session('id_user');

        if (!$id_user) {
            return redirect()->to('/login');
        }

        $user = $this->data->getadminuser($id_user);
        return view('user/ganti', ['user' => $user]);
    } 

     public function updateProfile()
    {
        $id_user = session('id_user');
        if (!$id_user) {
            return redirect()->to('/login');
        }

        $post = $this->request->getPost();

        // Siapkan data yang boleh diupdate
        $updateData = [
            'id_user' => $id_user,
            'nama' => $this->request->getPost('nama'),
            'nik' => $this->request->getPost('nik'),
            'email' => $this->request->getPost('email'),
            'no_hp' => $this->request->getPost('no_hp'),
            'alamat' => $this->request->getPost('alamat'),
            'kode_pos' => $this->request->getPost('kode_pos'),
            'foto' => $this->request->getPost('foto')
        ];

        
        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            
            if (!is_dir(FCPATH . 'uploads/profiles')) {
                mkdir(FCPATH . 'uploads/profiles', 0755, true);
            }

            $newName = $foto->getRandomName();
            $moveResult = $foto->move(FCPATH . 'uploads/profiles', $newName);
            
            if ($moveResult) {
                
                $updateData['profil'] = $newName;
            } else {
                
                session()->setFlashdata('error', 'Gagal upload foto: ' . $foto->getErrorString());
                return redirect()->back()->withInput();
            }
        }

        // Simpan perubahan
        $this->data->save($updateData);

        session()->setFlashdata('success', 'Data profil berhasil diperbarui');
        return redirect()->to('/user/profile');
    }

    public function admin()
    {
        $data['users'] = $this->data->findAll();
        return view('admin/dashboard_admin', $data);
    }

    public function pengajuan(): string
    {
        $data = [
            'title' => 'Daftar user',
            'user' => $this->data->getdata()
        ];
        return view('adminuser/pengajuan', $data);
    }

    public function detail($id_user)
    {
        $userModel = new \App\Models\adminuserModel(); 
        $uploadModel = new \App\Models\UploadModel();

        // 1. Ambil data profil orangnya
        $dataUser = $userModel->find($id_user);

        // 2. Ambil data file upload orang tersebut
        $dataFile = $uploadModel->where('id_user', $id_user)->first();

        $data = [
            'title' => 'Detail Dokumen Pemohon',
            'user'  => $dataUser,
            'files' => $dataFile 
        ];

        return view('adminuser/detail', $data);
    }
    // public function detail($id_user)
    // {
    //     $data = [
    //         'title' => 'Detail user',
    //         'user' => $this->data->getdata($id_user)
    //     ];
    //     return view('admin/detail', $data);
    // }

    // public function hapus($id_user)
    // {
    //     $this->data->delete($id_user);
    //     session()->setFlashdata('pesan', 'Data berhasil dihapus');
    //     return redirect()->to('/admin');
    // }

    // public function ubahuser($id_user)
    // {
    //     $data = [
    //         'title' => 'Ubah Data User',
    //         'validation' => \Config\Services::validation(),
    //         'user' => $this->data->getdata($id_user)
    //     ];
    //     return view('user/ganti', $data);
    // }

    // public function update($id_user)
    // {
    //     if (!$this->validate([
    //         'Nama' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} harus diisi',
    //             ]
    //         ]
    //     ])) {
    //         return redirect()->to('/user/ubah/' . $this->request->getVar('id_user'))->withInput();
    //     }

    //     $this->data->save([
    //         'id_user' => $id_user,
    //         'Nama' => $this->request->getVar('Nama'),
    //         'NIK' => $this->request->getVar('NIK'),
    //         'status' => $this->request->getVar('status'),
    //         'tanggal' => $this->request->getVar('tanggal'),
    //     ]);

    //     session()->setFlashdata('pesan', 'Data berhasil diubah');
    //     return redirect()->to('/admin');
    // }
}
