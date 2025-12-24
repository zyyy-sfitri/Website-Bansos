<?php
namespace App\Controllers;
use App\Models\adminuserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function loginProcess()
    {
        $emailOrNik = $this->request->getPost('email'); 
        $password   = $this->request->getPost('password');

        $userModel = new adminuserModel();
        $user = $userModel
            ->where('email', $emailOrNik)
            ->orWhere('nik', $emailOrNik)
            ->first();

        if (!$user || !password_verify($password, $user['password'])) {
            return redirect()->back()->with('error', 'Email/NIK atau password salah!');
        }

        // Simpan session
        session()->set([
            'logged_in' => true,
            'id_user'   => $user['id_user'],
            'nama'      => $user['nama'],
            'email'     => $user['email'],
            'nik'       => $user['nik'],
            'role'      => $user['role']
        ]);

        // Redirect sesuai role
        if ($user['role'] === 'admin') {
            return redirect()->to('/adminuser/pengajuan');
        } else {
            return redirect()->to('/user/status/' . $user['id_user']);
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    public function register()
    {
        $provModel = new \App\Models\ProvinsiModel();
        $data['provinsi'] = $provModel->findAll();
        return view('auth/register', $data);
    }

    public function saveRegister()
    {
        $userModel = new adminuserModel();
        $passwordHash = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

        $data = [
            'nama'          => $this->request->getPost('nama'),
            'nik'           => $this->request->getPost('nik'),
            'email'         => $this->request->getPost('email'),
            'no_hp'         => $this->request->getPost('no_hp'),
            'provinsi'      => $this->request->getPost('provinsi'),
            'kota'          => $this->request->getPost('kota'),
            'kecamatan'     => $this->request->getPost('kecamatan'),
            'kelurahan'     => $this->request->getPost('kelurahan'),
            'alamat'        => $this->request->getPost('alamat'),
            'kode_pos'      => $this->request->getPost('kode_pos'),
            'password'      => $passwordHash,
            'status'        => 'pending',
            'status_proses' => 'pengajuan_masuk',
            'tanggal'       => date('Y-m-d'),
            'role'          => 'user'
        ];

        $userModel->insert($data);
        return redirect()->to('/login')->with('success', 'Pendaftaran berhasil! Silakan login.');
    }
}
